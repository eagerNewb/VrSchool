<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Role;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    // public function getRolesBaby() {
    //    $this->arrayRoles= Role::where('name','!=','admin');
    //    dd($this->arrayRoles);
    //    var_dump($this->arrayRoles);
    //    View::share ( 'arrRoles', $this->arrayRoles);
    //    // View::share ( 'variable2', $variable2 );
    // }  
}
