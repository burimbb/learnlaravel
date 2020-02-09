<?php

namespace App\Http\Middleware;

use Closure;

class AdministratorUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $maxId)
    {
        if($request->user() && $request->user()->id <= $maxId){
            return $next($request);
        }

        dd("You havent permmision to go!!");
    }
}
