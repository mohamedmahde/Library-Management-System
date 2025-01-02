<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user_type = Auth::user()->usertype;
            if ($user_type == 'admin') {
                return view('admin.index');
            } elseif ($user_type == 'user') {
                return view('home.index');
            }
        } else {

            redirect()->back();
        }
    }
}
