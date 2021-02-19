<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\IglesiaTrait;
use App\Http\Requests\EventosFormRequest;
use App\Evento;

class EventoController extends Controller
{   use IglesiaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventosFormRequest $request)
    {   $iglesia = $this->getUserIglesia();
        
       if(auth()->user()->hasRole('admin')){
            Evento::create([
                'start' => $request->fecha." ".$request->hora,
                'end' => $request->fechaend." ".$request->horaend,
                'descripcion' => $request->descripcion,
                'title' => $request->titulo,
                'color' => "#07ed8a",
                'textColor' => $request->textColor,
            ]);

            if($request->ajax()){
                $msg =[
                    'title' => 'Evento Agregado con Exito',
                    'icon' => 'success',
                ];
                return response()->json($msg);
            }
            
        }if((auth()->user()->hasRole('pastor')) || auth()->user()->hasRole('secretaria')){
            $iglesia->Evento()->create([
                'start' => $request->fecha." ".$request->hora,
                'end' => $request->fechaend." ".$request->horaend,
                'descripcion' => $request->descripcion,
                'title' => $request->titulo,
                'color' => "#d9bc02",
                'textColor' => $request->textColor,
            ]);

            if($request->ajax()){
                $msg =[
                    'title' => 'Evento Agregado con Exito',
                    'icon' => 'success',
                ];
                return response()->json($msg);
        }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   $iglesia= $this->getUserIglesia();
        $data['eventoRegional']= Evento::where('iglesia_id','=',NULL)->get();
        $data['eventoLocal']= Evento::where('iglesia_id','=',$iglesia->id)->get();

        return response()->json($data['eventoLocal']);
    }
    public function evento()
    {   
        $data['eventoRegional']= Evento::where('iglesia_id','=',NULL)->get();
        

        return response()->json($data['eventoRegional']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       $evento = Evento::where('id','=',$id);
        if(auth()->user()->hasRole('admin')){
            $evento->update([
                'start' => $request->fecha." ".$request->hora,
                'end' => $request->fechaend." ".$request->horaend,
                'descripcion' => $request->descripcion,
                'title' => $request->titulo,
                'color' => "#07ed8a",
                'textColor' => $request->textColor,
            ]);

            if($request->ajax()){
                $msg =[
                    'title' => 'Evento Actualizado con Exito',
                    'icon' => 'success',
                ];
                return response()->json($msg);
            }
            
        }if((auth()->user()->hasRole('pastor')) || auth()->user()->hasRole('secretaria')){
            $evento->update([
                'start' => $request->fecha." ".$request->hora,
                'end' => $request->fechaend." ".$request->horaend,
                'descripcion' => $request->descripcion,
                'title' => $request->titulo,
                'color' => "#d9bc02",
                'textColor' => $request->textColor,
            ]);

            if($request->ajax()){
                $msg =[
                    'title' => 'Evento Actualizado con Exito',
                    'icon' => 'success',
                ];
                return response()->json($msg);
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $evento= Evento::findOrFail($id);
        $evento->delete();
        
        
            $msg =[
                'title' => 'Evento Eliminado con Exito',
                'icon' => 'success',
            ];
            return response()->json($msg);
    
    }
}
