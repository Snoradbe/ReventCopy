<?php

namespace App\Http\Controllers;

use App\Ban;
use App\ChangeName;
use App\Fraction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('server');

        View::composer('client.stats.parts.menu', function (\Illuminate\View\View $view) {
            $view->with('fractions', Fraction::all());
        });
    }

    public function online()
    {
        return view('client.stats.online', [
            'users' => User::with(['job', 'fraction'])->online()->orderBy('level', 'DESC')->get()
        ]);
    }

    public function fraction($fractionId)
    {
        $fraction = Fraction::findOrFail($fractionId);

        return view('client.stats.fraction', [
            'fraction' => $fraction,
            'members' => User::where('fraction_id', '=', $fraction->id)->with(['fractionRank' => function ($query) {
                return $query->latest('rank');
            }])->paginate(30)
        ]);
    }

    public function leaders()
    {
        return view('client.stats.leaders', [
            'fractions' => Fraction::with('leaders')->oldest('id')->get()
        ]);
    }

    public function banList()
    {
        return view('client.stats.ban_list', [
            'bans' => Ban::with(['user', 'admin'])->latest('id')->paginate(30)
        ]);
    }

    public function changeNames()
    {
        return view('client.stats.change_names', [
            'names' => ChangeName::with('admin')->latest('id')->paginate(50)
        ]);
    }
}
