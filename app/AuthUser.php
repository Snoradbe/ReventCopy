<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

class AuthUser extends User implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, Notifiable;

    protected $table = 'users';

    protected $connection = 'server_1';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $serverId = request()->post('server_id');
        if (!is_null($serverId)) {
            session()->put('server_id', (int) $serverId);
        } else {
            $serverId = session()->get('server_id');
        }

        if (is_null($serverId)) {
            abort(500);
        }

        $this->connection = 'server_' . (int) $serverId;
    }
}
