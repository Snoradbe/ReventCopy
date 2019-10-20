<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeName extends Model
{
    public $timestamps = false;

    protected $dates = [
        'created_at'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function (Model $model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
