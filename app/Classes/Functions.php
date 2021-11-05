<?php
namespace App\Classes;

use App\Modules\EmployeeManage\Models\AppUser;
use Core\EmployeeManage\Models\Employee;
use App\Models\InquiryTransaction;
use App\Models\User;
use App\Modules\AdminDispatchManage\Models\DispatchManage;

class Functions
{

    //unixTimePhptoJava
    public static function unixTimePhpToJava($time)
    {
        $conTime = $time * 1000;
        return $conTime;
    }

    public static function unixTimeJavaToPhp($time)
    {
        $conTime = $time / 1000;
        return $conTime;
    }

    
}