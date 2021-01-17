<?php

namespace App\Http\Middleware;

use Closure;

class RestauranteLogin
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
        if(session()->get('restaurante')){
            if(!session()->get('restaurante')->admin){
                $restaurante = session()->get('restaurante')->find(session()->get('restaurante')->_id);
                if(isset($restaurante->fotos) && count($restaurante->fotos) > 0){
                    foreach($restaurante->fotos as $foto){
                        if(isset($foto['profile']) == true){
                            $restaurante->fotinha = $foto['arquivo'];
                        }
                    }
                }
                session()->put('restaurante', $restaurante);


            }else{
                if(session()->get('restaurante')->admin && session()->get('rest')){
                    session()->put('rest',session()->get('rest')->find(session()->get('rest')->_id));
                }
            }
            return $next($request);
        }else{
            return redirect('login')->withErrors(['error' => 'Você deve estar logado para acessar esta área.']);
        }
    }
}
