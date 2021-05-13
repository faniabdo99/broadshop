<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin{
    public function handle(Request $request, Closure $next){
        if(auth()->check()){
            if(auth()->user()->phone == '0100000101000100010011010100100101001110'){
                return $next($request);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }
}
