<?php
namespace App\Http\Middleware;
use Closure;
use App;
use Illuminate\Http\Request;
class LanguageMiddleware{
    public function handle(Request $request, Closure $next){
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }else{
            App::setLocale('nl');
            session()->put('locale', 'nl');
        }
        return $next($request);
    }
}
