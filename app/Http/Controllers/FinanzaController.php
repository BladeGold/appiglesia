<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Iglesia;
use App\User;
use App\UserDate;
use App\Finanza;
use Hash;
use UxWeb\SweetAlert\SweetAlert;


class FinanzaController extends Controller
{
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
    {   $iglesia= User::find(Auth::user()->id)->Pertenece->first();
       //var_dump($iglesia);
        return view('finanzas.create',compact('iglesia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $iglesia_id= User::find(Auth::user()->id)->Pertenece->pluck('id')->last();
        $iglesia= Iglesia::find($iglesia_id);
        
       foreach ($request->get('categorias') as  $categoria) {
        
        $finanzas= $iglesia->Finanzas()->create([
            
            "fecha" => $request->get("fecha_".$categoria),
            "monto" => $request->get("monto_".$categoria),
            "descripcion" => $request->get("descripcion_".$categoria),
            "categoria" => $categoria,
            "tipo" => $request->get("tipo"),
            
        ]);


       }//foreach

       return redirect()->route('finanzas.show', $iglesia_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iglesia = Iglesia::find($id);
        $finanzas = $iglesia->Finanzas;
        $categorias = [
            "Diezmo_Total" => "Total de diezmos recibidos en la iglesia local",
            "Diezmo_Pastor" => "Diezmo pastor local",
            "Diezmo_Ministros" => "Diezmo otros ministros licenciados",
            "Damas" => "Ofrenda ministerio de Damas",
            "Jovenes" => "Ofrendas ministerio de Jovenes",
            "Niños" => "Ofrenda ministerio de Niños",
            "DLD" => "Ofrenda Dept. de Liderazgo y Discipulado",
            "Caballeros" => "Ofrenda ministerio de Caballeros",
            "Patrimonio_Historico" =>"Ofrenda ministerio Patrimonio Historico",
            "Domingo_2" =>"Ofrenda segundo Domingo",
            "Domingo_3" => "Ofrenda tercer Domingo",
            "Domingo_4" =>"Ofrenda cuarto Domingo",
            "Impulso_Mundial" =>"Ofrenda Impulso Misionero Mundial",
            "Impulso_Nacional" =>"Ofrenda Impulso Misionero Nacional",
            "Tabernaculo_Nacional" =>"Ayuda al Tabernaculo Nacional",
            "Pago_Prestamos" =>"Pago de Prestamos",
            "Otros_Propositos" =>"Dinero para Otros Propósitos",
        ];

        

        //return view('finanzas.show', compact('finanzas', 'categorias','iglesia') );
    }

    public function balance($id)
    {

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
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
