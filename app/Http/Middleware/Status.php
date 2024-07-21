<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $allowed): Response
    {
        $statuses = [];

        if (!auth()->check())
            return redirect('/');

        $user = User::find(auth()->user()->id);

        foreach ($user->statuses as $status):
            $statuses[] = $status->toArray()['name'];
        endforeach;

        if(!in_array($allowed, $statuses))
            abort(403, "Usuario no habilitado");

        return $next($request);
    }
}
