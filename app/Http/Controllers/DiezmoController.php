<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiezmoCreateFormRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Diezmo;
use Yajra\DataTables\DataTables;

class DiezmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(DiezmoCreateFormRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $iglesia= $user->Pertenece->last();
        if($user->Diezmo()->create([
          "monto" => $request->monto,
          "fecha" => $request->fecha,
          "referencia" => $request->referencia,
          "iglesia_id" => $iglesia->id,  
        ])){
            
            if($request->ajax()){
                
                $msg= [
                    'title' => '¡Registro Exitoso!',
                    'icon' => 'success',
                ];
                return response()->Json($msg);
            }
        }
        //dd($);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $diezmos= Auth::user()->Diezmo()->get();
           
        if($request->ajax()){
            
            return DataTables::of($diezmos)
                ->addColumn('action', 'diezmos.action')
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diezmo= Diezmo::find($id);
        return response()->Json($diezmo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiezmoCreateFormRequest $request, $id)
    {
        Diezmo::findOrFail($id)->update([
            "monto"=>$request->monto,
            "fecha" => $request->fecha,
            "referencia" => $request->referencia,
        ]);

        if($request->ajax()){
            $msg= [
                "title"=>"¡Actualizacion Exitosa!",
                "icon" => "success",
            ];
            
            return response()->Json($msg);
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
        Diezmo::findOrFail($id)->delete();

        if($request->ajax()){
            $msg= [
                "title"=>"¡Eliminado con Exito!",
                "icon" => "success",
            ];
            
            return response()->Json($msg);
        }
    }
}
