<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('main');
    }
}
