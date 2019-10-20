<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    public const LEADER_RANK = 18;

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function leaders()
    {
        return $this->hasMany(User::class)->whereHas('fractionRank', function ($query) {
            return $query->where('rank', '=', self::LEADER_RANK);
        });
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }
}
