<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $connection = 'mysql';

    public $timestamps = false;

    public function scopeCode(Builder $query, string $code)
    {
        return $query->where('code', '=', $code);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('activate_date', '=', null);
    }

    public function activate()
    {
        $this->activate_date = Carbon::now();
    }
}
