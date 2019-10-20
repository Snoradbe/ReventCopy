<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateHandler extends Model
{
    protected $connection = 'mysql';

    protected $fillable = [
        'handler'
    ];

    public $timestamps = false;
}
