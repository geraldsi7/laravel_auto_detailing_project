<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
       public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->order->where('status', 'in-cart')->sum('qty') < 1) {
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
