<?php
/**
 * Created by PhpStorm.
 * User: Floris
 * Date: 12/03/2018
 * Time: 11:59 AM
 */

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;


class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isAdministrator()) {
            return $next($request);
        }

        // IF USER IS NOT ADMIN GIVE 404 ERROR OR REDIRECT
        abort(404);
        // return redirect()->route('home');
    }
}