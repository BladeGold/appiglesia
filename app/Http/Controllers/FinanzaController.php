<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Iglesia;

use App\Http\Traits\IglesiaTrait;

use App\Finanza;
use Hash;
use Carbon\Carbon;
use UxWeb\SweetAlert\SweetAlert;


class FinanzaController extends Controller
{
    use IglesiaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $categorias = [
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
        "Fondo_Local" =>"Fondo de la Iglesia Local",
        "Diezmo_Restante" => "Diezmo restante de la Iglesia Local"
    ];
    public function __construct()
    {
        $this->middleware('ValidateFinanza')->except('inicial','store');
        
    }

    public function index()
    {
        
    }

    public function inicial()
    {
        $iglesia= $this->getUserIglesia();
        
      return  view('finanzas.inicial', compact('iglesia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $iglesia= $this->getUserIglesia();
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
        $iglesia= $this->getUserIglesia();     
        foreach ($request->get('categorias') as  $categoria) {
            
            
            if(empty($request->get('descripcion_'.$categoria))==false){
                
                $finanzas= $iglesia->Finanzas()->create([
            
                    "fecha" => $request->get("fecha_".$categoria),
                    "monto" => $request->get("monto_".$categoria),
                    "descripcion" => $request->get("descripcion_".$categoria),
                    "categoria" => $categoria,
                    "tipo" => $request->get("tipo"),
                    
                ]);
            }

            else{
                
                $finanzas= $iglesia->Finanzas()->create([
            
                    "fecha" => $request->get("fecha_".$categoria),
                    "monto" => $request->get("monto_".$categoria),
                    
                    "categoria" => $categoria,
                    "tipo" => $request->get("tipo"),
                    
                ]);
            }
            
        


       }//foreach 

       return redirect()->route('finanzas.show', $iglesia->id );
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
        $categorias = $this->categorias;

        

        return view('finanzas.show', compact('finanzas', 'categorias','iglesia') );
    }

    public function balance()
    {   $iglesia = $this->getUserIglesia();
        $date = Carbon::now()->subMonth(1);
        $mes = $date->format('m');
        
        
        $pasivos = $iglesia->Finanzas()->where('tipo','=','pasivo')->whereMonth('fecha','=',$mes)->get();
        $activos = $iglesia->Finanzas()->where('tipo','=','activo')->whereMonth('fecha','=',$mes)->get();
        $inicial = $iglesia->Finanzas()->where('tipo', '=', 'inicial')->get();
       
        foreach ($pasivos as $value) {
            echo $value->id;

        };
       

        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iglesia= $this->getUserIglesia();
        $finanzas = Finanza::find($id);
        $categorias = $this->categorias;
        

        
        
       return view("finanzas.edit", compact('iglesia','finanzas','categorias'));
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
        $iglesia= $this->getUserIglesia();
        $categoria= $request->categoria;
        $finanzas = Finanza::where('id','=', $id);
        if(empty($request->get('descripcion_'.$categoria))==false){
                
            $finanzas->update([
        
                "fecha" => $request->get("fecha_".$categoria),
                "monto" => $request->get("monto_".$categoria),
                "descripcion" => $request->get("descripcion_".$categoria),
               
                
            ]);
        }

        else{
            
            $finanzas->update([
        
                "fecha" => $request->get("fecha_".$categoria),
                "monto" => $request->get("monto_".$categoria),
                
            
            ]);
        } 

        return redirect()->route('finanzas.show', $iglesia->id);


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
