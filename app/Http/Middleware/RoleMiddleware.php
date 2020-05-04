<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next ,$role)
    {
        if (Auth::check()) {
            if (Auth::user()->role==null) {
                abort('403', "You do not have this permission.");
                //forbidden to access admin link
            }
            $userrole = Auth::user()->role;
            $data = explode("|", $role);
            foreach ($data as $key) {
                if ($key==$userrole) {
                    return $next($request);
                }
            }
            abort('403');

        }

        return redirect()->route('login');
    }
}
