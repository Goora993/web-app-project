<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function delete($id)
    {
        if (Auth::user()->roles()->first()->name == 'admin') {
            $user = User::findOrFail($id);
            $user->delete();
        } else {
            abort(403);
        }
    }
}
