<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Verificar si el usuario esta autenticado
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = Auth::user();
        $rolesArray = explode('|', $roles);
        //!$user no hay usuario
        if (!$user || !in_array($user->role->name, explode('|', $roles))) {
            // Si el usuario no tiene el rol adecuado, redirigir o mostrar un error
            return abort(403, 'Acceso no autorizado.');
        }
        return $next($request);

    }
}
