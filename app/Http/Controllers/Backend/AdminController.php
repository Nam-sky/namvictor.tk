<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class Admincontroller extends Controller
{
    public function index(){
        return view('back-end.login');
    }
    public function dashboard(){
        return view('back-end.dashboard');
    }
}
