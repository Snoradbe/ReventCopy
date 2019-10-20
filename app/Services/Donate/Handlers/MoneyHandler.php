<?php


namespace App\Services\Donate\Handlers;


use App\Donate;
use App\User;

class MoneyHandler implements Handler
{
    public function handle(Donate $donate, User $user)
    {
        $amount = (int) $donate->data;
        $user->bank += $amount;
    }
}
