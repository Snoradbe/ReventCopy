<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $servers = Server::all();

        $online = 0;
        foreach ($servers as $server)
        {
            if ($server->online >= 0) {
                $online += $server->online;
            }
        }

        return view('client.index', compact('servers', 'online'));
    }

    public function howToStart()
    {
        return view('client.how_to_start');
    }
}
