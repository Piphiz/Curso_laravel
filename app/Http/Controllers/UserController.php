<?php

namespace App\Http\Controllers;

use App\Mail\TesteUnidev;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }
}
