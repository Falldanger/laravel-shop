<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->isAdmin()) {
            session()->flash('warning', 'У Вас нет прав администратора');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
