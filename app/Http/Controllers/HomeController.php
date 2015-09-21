<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
# Models
use App\User;

class HomeController extends Controller
{
    //
    public function index(){
   // dd(\Request::input('name'));

        return view('index',$this->data);
    }



}
