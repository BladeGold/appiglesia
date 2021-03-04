<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iglesia;
use App\User;
use Illuminate\Support\Facades\Auth;

class IglesiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesias = Iglesia::get();

        return view('iglesias.index', compact('iglesias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pastores= User::WhereDoesntHave('Pertenece')->whereHas('roles', function($query){
                $query->where('name','Pastor');
            })->get();

            
        return view('iglesias.create', compact('pastores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iglesia = Iglesia::create($request->all());
        if($request->get('pastor') == !NULL){
            $iglesia->asignarIglesia($request->get('pastor'));

        }
        alert()->success('', '¡Iglesia creada con éxito!');
        return redirect()->route('iglesias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {  #Obtiene el id del usuario en sesision
        $id= Iglesia::WhereHas('Miembros', function($query){ 
                $query->Where('user_id', Auth::user()->id);
            })->pluck('id')->last();
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iglesia = Iglesia::find($id);

        $pastor=User::whereHas('Pertenece', function($query) use($id) {
            $query->where('iglesia_id', $id);
            })->whereHas('roles', function($query){
                $query->where('name','Pastor');
        })->get()->last();

        $pastores= User::WhereDoesntHave('Pertenece')->whereHas('roles', function($query){
            $query->where('name','Pastor');
        })->get();
        
        if($pastor != NULL){
            $asig= $pastor->id;
            return view('iglesias.edit', compact('iglesia','pastor', 'asig','pastores'));
        }
        else{
            return view('iglesias.edit', compact('iglesia','pastor', 'pastores'));
        }
             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $esto= $this->edit($id);

        $id_pastor= $esto->asig;
        
        

        $iglesia = Iglesia::find($id);
        $iglesia->update($request->all());
        
      
        if($id_pastor != $request->get('pastor')){
            
            $iglesia->asignarIglesia($request->get('pastor'));
            $iglesia->eliminarMiembro($id_pastor);
        }
        
        alert()->success('', '¡Actualización Exitosa!');
        return redirect()->route('iglesias.edit', $iglesia->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {  
        $iglesia=Iglesia::findOrFail($id);
        $iglesia->delete();
        if($request->ajax()){
            
            return response()->json($iglesia);
            
        }

        return redirect()->route('iglesias.index');
    }

    
}
