<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users = User::all();

        return Auth::user()->roles()->first()->name == 'admin'
            ?
            view('admin.dashboard', ['users' => $users])
            :
            view('user.dashboard');
    }

}
