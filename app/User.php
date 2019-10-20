<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public const RACES = [
        'negro' => 'Негроид'
    ];

    public const NATIONS = [
        'american' => 'Американец'
    ];

    protected $attributes = [
        'cash' => 0,
        'coins' => 0,
        'bank' => 0,
        'online' => 0,
        'level' => 1,
        'phone' => null,
        'sex' => 'm',
        'age' => 22,
        'race' => 'negro',
        'nation' => 'american',
        'job_id' => null,
        'med' => false,
        'addiction' => false,
        'partner_id' => null,
        'crimes' => 0
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function partner()
    {
        return $this->belongsTo(self::class, 'partner_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function fraction()
    {
        return $this->belongsTo(Fraction::class);
    }

    public function fractionRank()
    {
        return $this->belongsTo(FractionRank::class);
    }

    public function scopeOnline(Builder $builder)
    {
        return $builder->where('online', '>=', time() - 300);
    }

    public function name()
    {
        return str_replace('_', ' ', $this->username);
    }

    public function race()
    {
        return self::RACES[$this->race] ?? '???';
    }

    public function nation()
    {
        return self::NATIONS[$this->nation] ?? '???';
    }

    public function phone()
    {
        $len = strlen($this->phone);

        if ($len != 6) {
            return $this->phone;
        }

        return substr($this->phone, 0, 3) . '-' . substr($this->phone, 3, $len);
    }

    public function isOnline()
    {
        return time() - $this->online < 300;
    }

    public function hasCash(int $need)
    {
        return $this->cash >= $need;
    }
}
