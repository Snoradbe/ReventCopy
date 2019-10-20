<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ChestGame extends Model
{
    public const PROCESS_STATUS = 0,
                WIN_STATUS = 1,
                LOSE_STATUS = 2;

    public const STATUSES = [
        self::PROCESS_STATUS => 'В процессе',
        self::WIN_STATUS => 'Выиграл',
        self::LOSE_STATUS => 'Проиграл'
    ];

    public const COUNT_CHESTS = 3;

    protected $attributes = [
        'step' => 1,
        'status' => 0
    ];

    public $timestamps = false;

    protected $dates = [
        'created_at'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Model $model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProcessedGames(Builder $query, User $user)
    {
        return $query->where('user_id', '=', $user->id)
            ->where('status', '=', self::PROCESS_STATUS);
    }

    public function scopeLastGame(Builder $query, User $user)
    {
        return $this->processedGames($user)
            ->take(1)
            ->latest('id');
    }
}
