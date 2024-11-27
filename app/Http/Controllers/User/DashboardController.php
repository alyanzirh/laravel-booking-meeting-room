<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('app.admin.dashboard');
        }
        return view('user.dashboard');
    }
}
