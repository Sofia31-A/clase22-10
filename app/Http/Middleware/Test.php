<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Book;

class Test
{
    public function handle(Request $request, Closure $next)
    {

        $max_price = Book::orderByDesc('price')->first();
        if($max_price->price>100){
            return $next($request);
        }else{
            return abort(403, "El middleware no permite continuar");
        }
        // $valor = 2;
        // if($valor == 1){
        //     return $next($request);
        // }
        // else{
        //     return abort(403, "El middleware no permite continuar");
        // }

        //dd($max_price); muestra el valor y detiene la ejecucion
    }
}
