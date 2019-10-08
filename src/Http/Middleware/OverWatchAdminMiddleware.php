<?php

namespace Tallmancode\OverWatch\Http\Middleware;

use Closure;
use Tallmancode\OverWatch\Facades\ OverWatch;

class OverWatchAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!app('OverWatchAuth')->guest()) {
            $user = app('OverWatchAuth')->user();
            app()->setLocale($user->locale ?? app()->getLocale());

            return  $next($request) ;
        }

        $urlLogin = route('overwatch.login');

        return redirect()->guest($urlLogin);
    }
}
