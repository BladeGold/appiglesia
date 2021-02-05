<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDate;
use App\User;
use App\Iglesia;
use DB;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Traits\IglesiaTrait;
use Carbon\CarbonImmutable;

class DashboardController extends Controller
{
    use IglesiaTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            $this->middleware('ValidateDate');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        
       
        
        if(auth()->user()->hasRole('admin')){
            
            $users_count=User::count();
            $iglesias_count= Iglesia::count();
            $miembros_registrados= DB::table('iglesia_user')->count();

           

                

            return view('dashboard.admin', compact('users_count','iglesias_count','miembros_registrados'));
        }
        else{
            if(auth()->user()->hasRole('pastor')){
                $iglesia= $this->getUserIglesia();
                $date= CarbonImmutable::now();
                $mes= $date->subMonth(1);
                $activos=  $iglesia->Finanzas()->where('tipo','=','activo')->count();                
                $activosmes= $iglesia->Finanzas()->Where('tipo','=','activo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
                $activosanterior= $iglesia->Finanzas()->Where('tipo','=','activo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
                $pasivos= $iglesia->Finanzas()->Where('tipo','=','pasivo')->count();
                $pasivosmes= $iglesia->Finanzas()->Where('tipo','=','pasivo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
                $pasivosanterior= $iglesia->Finanzas()->Where('tipo','=','pasivo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
                $mesActual= $date->isoFormat('MMMM');
                $mesAnterior= $date->subMonth(1)->isoFormat('MMMM');
            }elseif(auth()->user()->hasRole('tesorera')){
                $iglesia= $this->getUserIglesia();
                $date= CarbonImmutable::now();
                $mes= $date->subMonth(1);
                $activos=  $iglesia->Finanzas()->where('tipo','=','activo')->count();                
                $activosmes= $iglesia->Finanzas()->Where('tipo','=','activo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
                $activosanterior= $iglesia->Finanzas()->Where('tipo','=','activo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
                $pasivos= $iglesia->Finanzas()->Where('tipo','=','pasivo')->count();
                $pasivosmes= $iglesia->Finanzas()->Where('tipo','=','pasivo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
                $pasivosanterior= $iglesia->Finanzas()->Where('tipo','=','pasivo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
                $mesActual= $date->isoFormat('MMMM');
                $mesAnterior= $date->subMonth(1)->isoFormat('MMMM');
            }
            
            $iglesia=Auth::user()->Pertenece->last();
        
            $pastor=User::whereHas('Pertenece', function($query) use($iglesia) {
                $query->where('iglesia_id', $iglesia->id);
            })->whereHas('roles', function($query){
                    $query->where('name','Pastor');
                 })->get()->last();
                
                 $miembros_count=Iglesia::findOrFail($iglesia->id)->Miembros->count();
             

            return view('dashboard.general', compact('pastor','iglesia','miembros_count','activos','pasivos','activosmes','pasivosmes','activosanterior',
            'pasivosanterior','mesActual','mesAnterior'));
        }
    }
}
