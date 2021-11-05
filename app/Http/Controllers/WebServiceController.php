<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Log;
use Exception;
use App\Classes\Functions;

class WebServiceController extends Controller
{
    /**
     * Logic Instatnce
     */

    /**
     * Get All SubsCribers
     * @param 
     * @return void
     */

    public function __construct()
    {
        ini_set('memory_limit', '-1');
    }
   
    public function getSubsCribers(Request $request){

        if (!isset($_REQUEST['timestamp'])) {
            return 'invalid request request parameters is in valid ';
        }
       
        $timestamp              = $request->get('timestamp');
        $timestamp              = Functions::unixTimeJavaToPhp($timestamp);
        $response               = array();
        $response["timestamp"]  = Functions::unixTimePhpToJava(time());


        $result = DB::table('subscriber')
        ->where(DB::raw('UNIX_TIMESTAMP(timestamp)'), '>=', $timestamp)
        ->get();

        $response["result"]     = 1;
        $response["companies"]  = $result;
        $response["count"]      = sizeof($result);
        return response()->json($response);
        
    }



   

}
