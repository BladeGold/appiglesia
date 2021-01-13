<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDate;
use App\User;
use App\Iglesia;
use DB;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;

class DashboardController extends Controller
{
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
            
            $iglesia=Auth::user()->Pertenece->last();
        
            $pastor=User::whereHas('Pertenece', function($query) use($iglesia) {
                $query->where('iglesia_id', $iglesia->id);
            })->whereHas('roles', function($query){
                    $query->where('name','Pastor');
                 })->get()->last();
                
                 $miembros_count=Iglesia::findOrFail($iglesia->id)->Miembros->count();
             

            return view('dashboard.general', compact('pastor','iglesia','miembros_count'));
        }
    }
}
