<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonateCategory extends Model
{
    protected $connection = 'mysql';

    protected $fillable = [
        'name', 'buyable'
    ];

    public $timestamps = false;

    public function donates()
    {
        return $this->hasMany(Donate::class, 'category_id');
    }
}
