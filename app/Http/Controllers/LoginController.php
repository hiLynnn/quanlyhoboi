<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function AuthLogin(){
        $adminId=Auth::id();
        if($adminId){
            return Redirect::to('admin');
        }
        else{
            return Redirect::to('admin/login')->send();
        }
    }
    public function index()
    {
        return view('admin.index');
    }
}
