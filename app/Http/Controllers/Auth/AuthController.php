<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use Hash;
use DB;

  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withSuccess('Opos! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            $subscribers = DB::table('subscriber')->select('subscriber.subscriber_msisdn', 'subscriber.pin', 'voice_mail_account.account_status')->leftJoin('voice_mail_account', function($join){
                $join->on('subscriber.id', '=', 'voice_mail_account.subscriber_id');
            })->orderBy('subscriber.id', 'DESC')->paginate(10);
            return view('dashboard')->with(compact('subscribers'));
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function createSubscriber()
    {
        return view('add-subscriber');
    }


    /**
     * Save New Subscriber
     */

    public function saveSubscriber(Request $request){

        DB::transaction(function () use($request) {
            $saveSubcribers = DB::table('subscriber')->insert([
                'subscriber_msisdn' => $request->get('msisdn'),
                'pin' => $request->get('pin'),
                'timestamp' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
            $findLast = DB::table('subscriber')->orderBy('id', 'DESC')->get();

            if($findLast && $saveSubcribers){
                $saveSubcribers = DB::table('voice_mail_account')->insert([
                    'subscriber_id' => $findLast[0]->id,
                    'account_status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')

                ]);
                 
            }
        });
        return redirect('dashboard');

        
    }

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }




}