<?php
/**
 * Created by PhpStorm.
 * User: Nastia
 * Date: 16.01.2017
 * Time: 22:44
 */

namespace App\Http\Middleware;
use Closure;
use Auth;

class Moderator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (($user = Auth::user()) && $user->moderator) {
            return $next($request);
        }
        return redirect('/');
    }
}