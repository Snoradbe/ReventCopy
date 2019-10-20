<?php


namespace App\Services\Donate\Handlers;


use App\Donate;
use App\User;

interface Handler
{
    public function handle(Donate $donate, User $user);
}