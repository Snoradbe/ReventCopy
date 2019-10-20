<?php

namespace App\Http\Controllers;

use App\Services\HasSelectedServer;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('server');
    }

    public function index($userId)
    {
        $user = User::with('partner')->findOrFail($userId);
        return view('client.profile', compact('user'));
    }
}
