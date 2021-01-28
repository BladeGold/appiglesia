<?php

namespace App\Http\Middleware;

use Closure;

use App\Balance;
use App\User;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;

class ValidateFinanza
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
        if(Auth::user()->hasRole('pastor')){
            $iglesia = User::find(Auth::id())->Pertenece->last();

            $BalanceIni = Balance::WhereHas('iglesia', function($query) use($iglesia){
                $query->where('iglesia_id', $iglesia->id);
            })->where('inicial','=','1')->get()->last();

            if(empty($BalanceIni)){
                
                alert()->warning('Aun no ha registrado las finanzas iniciales','Atención')->persistent("Cerrar");
                return redirect()->route('balances.inicial');
            }

            else{
                return $next($request);
            }

            
        }

        else{
            return $next($request);
        }
        
    }
}
