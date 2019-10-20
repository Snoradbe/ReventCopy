<?php


namespace App\Services\Games\Chests;


use App\ChestGame;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ChestsService
{
    public const BASE_PRICE = 30,
                RATE = 3;

    public const ENABLED = 1;

    private $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function getNextSum(int $step): int
    {
        $rate = pow(self::RATE, $step);

        return self::BASE_PRICE * $rate;
    }

    public function handleLoaded()
    {
        return new JsonResponse([
            'response' => [
                'current_points' => $this->user->cash,
                'current_price' => self::BASE_PRICE,
                'game_rules' => view('client.games.chests_rules')->render(),
                'game_enabled' => self::ENABLED,
                'is_online' => $this->user->isOnline(),
            ]
        ]);
    }

    public function handleStart()
    {
        if (!$this->user->hasCash(self::BASE_PRICE)) {
            return new JsonResponse([
                'response' => [
                    'result' => 'error',
                    'message' => 'Недостаточно денег на балансе'
                ]
            ], 500);
        }

        $this->user->cash -= self::BASE_PRICE;
        $this->user->update();

        ChestGame::processedGames($this->user)->delete();

        $chestGame = new ChestGame();
        $chestGame->user_id = $this->user->id;
        $chestGame->result = self::BASE_PRICE;
        $chestGame->save();

        return new JsonResponse([
            'response' => [
                'game_enabled' => self::ENABLED,
                'price_of_game' => self::BASE_PRICE,
                'possible_price' => $this->getNextSum($chestGame->step),
                'current_price' => self::BASE_PRICE
            ]
        ]);
    }

    public function handleOpenChest(int $chest)
    {
        $game = ChestGame::lastGame($this->user)->firstOrFail();

        $rand = rand(1, ChestGame::COUNT_CHESTS);
        $success = $rand == $chest;

        if (!$success) {
            $game->status = ChestGame::LOSE_STATUS;
        } else {
            $game->result = $this->getNextSum($game->step);
            ++$game->step;
        }

        $game->update();

        return new JsonResponse([
            'response' => [
                'result' => $success ? 'success' : 'error',
                'price' => [
                    'current_price' => $game->result,
                    'possible_price' => $this->getNextSum($game->step),
                ],
                'game_enabled' => self::ENABLED
            ]
        ]);
    }

    public function handleEndGame()
    {
        $game = ChestGame::lastGame($this->user)->firstOrFail();

        $game->status = ChestGame::WIN_STATUS;
        $this->user->cash += $game->result;

        $game->update();
        $this->user->update();

        return new JsonResponse([
            'response' => [
                'result' => 'success',
                'message' => ''
            ]
        ]);
    }
}