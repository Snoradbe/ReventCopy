<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\SelectedServer as Service;
use Illuminate\Support\Facades\View;

class SelectedServer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param int $by
     * @return mixed
     */
    public function handle($request, Closure $next, $by = Service::BY_ROUTE)
    {
        /* @var Service $service */
        $service = app()->make(Service::class);
        $service->init($by);
        if (!$service->hasServer()) {
            abort(404);
        }

        $request->route()->forgetParameter('server');
        //DB::setDefaultConnection('server_' . $service->getServer()->id);
        config()->set('database.default', 'server_' . $service->getServer()->id);

        View::share('server', Service::get()->getServer());

        return $next($request);
    }
}
