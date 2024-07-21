<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $allowed): Response
    {
        $roles = [];

        if (!auth()->check())
            return redirect('/');

        $user = User::find(auth()->user()->id);

        foreach ($user->roles as $role):
            $roles[] = $role->toArray()['name'];
        endforeach;

        if(!in_array($allowed, $roles))
            abort(403, "Acceso no autorizado");

        return $next($request);
    }
}
