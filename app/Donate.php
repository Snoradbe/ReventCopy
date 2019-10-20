<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $connection = 'mysql';

    protected $attributes = [
        'data' => null
    ];

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 'handler_id'
    ];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(DonateCategory::class, 'category_id');
    }

    public function handler()
    {
        return $this->belongsTo(DonateHandler::class, 'handler_id');
    }
}
