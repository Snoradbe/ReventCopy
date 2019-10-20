<?php

namespace App\Http\Controllers;

use App\Donate;
use App\DonateCategory;
use App\Promo;
use App\Services\Donate\Handlers\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $categories = DonateCategory::with('donates')->get();
        $activeCategory = $categories->first();

        return view('client.donate.index', compact('categories', 'activeCategory'));
    }

    public function confirm(Donate $donate)
    {
        return view('client.donate.confirm', compact('donate'));
    }

    public function buy(Donate $donate)
    {
        $user = Auth::user();
        if ($user->cash < $donate->price) {
            return back()->withErrors('Недостаточно средств на балансе.');
        }

        $user->cash -= $donate->price;

        /* @var Handler $handler */
        $handler = app()->make($donate->handler->handler);
        $handler->handle($donate, $user);

        $user->update();

        return back()->with('success_message', 'Вы успешно купили ' . $donate->name);
    }

    public function promo()
    {
        return view('client.donate.promo');
    }

    public function activate(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string'
        ]);

        $promo = Promo::active()->code($request->post('code'))->take(1)->first();
        if (is_null($promo)) {
            return back()->withErrors('Код не найден, либо активирован');
        }

        $user = Auth::user();
        $user->cash += $promo->reward;
        $user->update();

        $promo->activate();
        $promo->update();

        return back()->with('success_message', 'Код был активирован.');
    }

    public function addfunds()
    {
        return view('client.donate.addfunds');
    }
}
