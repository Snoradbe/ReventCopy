<?php

namespace App\Http\Controllers\Games;

use App\ChestGame;
use App\Services\Games\Chests\ChestsService;
use App\Services\SelectedServer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('server:' . SelectedServer::BY_AUTH);
    }

    public function index()
    {
        return view('client.games.chests');
    }

    public function load(Request $request, ChestsService $service)
    {
        $this->validate($request, [
            'm' => 'required|string|in:loaded,start,openChest,endGame'
        ]);

        $action = $request->post('m');

        switch ($action)
        {
            case 'loaded':
                return $service->handleLoaded();

            case 'start':
                return $service->handleStart();

            case 'openChest':
                $this->validate($request, ['chestId' => 'required|integer|min:1|max:' . ChestGame::COUNT_CHESTS]);
                return $service->handleOpenChest((int) $request->post('chestId'));

            case 'endGame':
                return $service->handleEndGame();
        }
    }
}
