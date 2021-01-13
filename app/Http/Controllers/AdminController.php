<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDate;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Iglesia;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($modulo)
    {
        echo $modulo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($modulo)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $modulo)
    {
        echo $modulo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($modulo, $id)
    {
        switch ($modulo) {
            case 'iglesias':
                
                #Obtiene el id del usuario en sesision
                    
                #Obtiene los datos de la iglesia a que pertenece dicho usuario
                $iglesia = Iglesia::find($id);
        
                #Obtiene el Usuario Pastor dentro de la iglesia.
                $pastor=User::whereHas('Pertenece', function($query) use($id) {
                        $query->where('iglesia_id', $id);
                    })->whereHas('roles', function($query){
                        $query->where('name','Pastor');
                    })->get()->last();

                $miembros=Iglesia::findOrFail($id)->Miembros;
    

            return view('iglesias.show', compact('iglesia','pastor','miembros'));
            break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($modulo, $id)
    {   
        switch ($modulo) 
        {
            case 'users':
                $user=User::find($id);
                $user_date=UserDate::find($id);
                $rol= $user->roles->flatten()->pluck('name')->last();
                $roles=Role::all();
        
                return view('admin.'.$modulo.'.edit', compact('user','rol','roles','user_date'));
                break;
            
            case '':
                
                
                break;
        }

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $modulo, $id)
    {
        switch ($modulo) 
        {
            case 'users':
                $user= User::find($id);
                $user->update($request->all());
                if($request->get('cedula')){
                    $user_date= UserDate::find($id)->update($request->all());
                }
                $rol= Role::findOrFail($request->get('rol'));
                
                $user->syncRoles($rol->slug);
                alert()->success('', '¡Actualización Exitosa!');
            return redirect()->route('users.index');
            
            case '':
                
                
                break;
        }
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($modulo, $id)
    {
        echo $modulo."  ".$id;
    }
}
