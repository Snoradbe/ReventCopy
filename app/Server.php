<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $connection = 'mysql';

    protected $attributes = [
        'online' => 0,
        'slots' => 0
    ];

    protected $fillable = [
        'name', 'ip', 'port'
    ];
}
