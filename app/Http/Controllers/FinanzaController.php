<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Iglesia;

use App\Http\Traits\IglesiaTrait;

use App\Finanza;
use Hash;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use UxWeb\SweetAlert\SweetAlert;


class FinanzaController extends Controller
{
    use IglesiaTrait;
    

    
    public function __construct()
    {
        $this->middleware('ValidateFinanza')->except('inicial','store');
        
    }

    public function index()
    {
        
    }

    

    
    public function create()
    {   $iglesia= $this->getUserIglesia();
       //var_dump($iglesia);
        return view('finanzas.create',compact('iglesia'));
    }

   
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
                if($request->get('tipo')=='inicial')
                {
                    $balanceini= $iglesia->Balances()->create([
                
                        
                        "monto" => $request->get("monto_".$categoria),
                        "categoria" => $categoria,
                        "inicial" => '01',
                        
                    ]);

                    
                }
                else
                {
                    $finanzas= $iglesia->Finanzas()->create([
                
                        "fecha" => $request->get("fecha_".$categoria),
                        "monto" => $request->get("monto_".$categoria),
                        
                        "categoria" => $categoria,
                        "tipo" => $request->get("tipo"),
                        
                    ]);
                 }
            }
            
        


       }//foreach 

       return redirect()->route('finanzas.show', $iglesia->id );
    }

    
    public function show($id)
    {   $date = CarbonImmutable::now();
        $iglesia = $this->getUserIglesia();
        $finanzas = $iglesia->Finanzas;
        $categorias = $this->categorias;
        $ultimoBalance = $iglesia->Balances()->latest()->get('created_at')->first()->created_at;
        $retrasoBalance = $date->diffInMonths($ultimoBalance);
        $dateBalance = $date->subMonths($retrasoBalance);
        $balances = $iglesia->Balances()->latest()->take(8)->get();

     

        return view('finanzas.show', compact('finanzas', 'categorias','iglesia','balances') );
    }

    public function balance(Request $request)
    {   

        
       
    }



    public function edit($id)
    {
        $iglesia= $this->getUserIglesia();
        $finanzas = Finanza::find($id);
        $categorias = $this->categorias;
        

        
        
       return view("finanzas.edit", compact('iglesia','finanzas','categorias'));
    }

    
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

    
    public function destroy($id)
    {
        //
    }
}
