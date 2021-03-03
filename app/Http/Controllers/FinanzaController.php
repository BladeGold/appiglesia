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
use PDF;


class FinanzaController extends Controller
{
    use IglesiaTrait;
    

    
    public function __construct()
    {
        $this->middleware('ValidateFinanza')->except('inicial','store');
        
    }

    public function index()
    {   $date= CarbonImmutable::now();
        $mes= $date->subMonth(1);
        $activos= Finanza::Where('tipo','=','activo')->count();
        $activosmes= Finanza::Where('tipo','=','activo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
        $activosanterior= Finanza::Where('tipo','=','activo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
        $pasivos= Finanza::Where('tipo','=','pasivo')->count();
        $pasivosmes= Finanza::Where('tipo','=','pasivo')->whereBetween('fecha',[$date->startOfMonth(),$date])->count();
        $pasivosanterior= Finanza::Where('tipo','=','pasivo')->whereBetween('fecha',[$mes->startOfMonth(),$mes->endOfMonth()])->count();
        $mesActual= $date->isoFormat('MMMM');
        $mesAnterior= $date->subMonth(1)->isoFormat('MMMM');
        
       
        return view('finanzas.index', compact('activos','pasivos','activosmes','pasivosmes','activosanterior',
        'pasivosanterior','mesActual','mesAnterior'));
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
                        "fecha" => Carbon::now(),
                        
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
       if($request->get('tipo')=='inicial'){
        return redirect()->route('balances.show', $iglesia->id );
       }else{
       return redirect()->route('finanzas.show', $iglesia->id );
    }
    }

    
    public function show($id)
    {   $date = CarbonImmutable::now();
        $iglesia = $this->getUserIglesia();
        $finanzas = $iglesia->Finanzas;
        $categorias = $this->categorias;
       
        $balances = $iglesia->Balances()->latest()->take(8)->get();

     

        return view('finanzas.show', compact('finanzas', 'categorias','iglesia','balances') );
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

    
    public function destroy(Request $request, $id)
    {
         $finanza=Finanza::find($id);
         Finanza::Where('fecha','=',$finanza->fecha)->delete();

         if($request->ajax()){
             return response()->Json($finanza);
         }
    }

    public function reporte(){
        //$date = CarbonImmutable::now();
        $date = CarbonImmutable::create(2021,03,25);
        $fecha = $date->subMonth(1);
        $categorias = $this->categorias;
        
        
        $iglesia = $this->getUserIglesia();
        $ruta=public_path('reportes/').$iglesia->name;
        $finanzas = $iglesia->Finanzas()->where('tipo','=','activo')->whereBetween('fecha',[$fecha->startOfMonth(), $fecha->endOfMonth()])->get(['categoria','monto']);
      
        $pdf= PDF::loadView('pdf.reporte', compact('categorias','iglesia','finanzas','fecha'))
                ->setOptions([
                    'defaultFont' => 'sans-serif',
                    'images' => true,
                    'chroot' => 'C:/laragon/www/appiglesia/public',
                ]); 
        $nombreArchivo= "reporte_".$iglesia->name."_mes-".$fecha->isoFormat('MMMM').".pdf";
        $datos=$pdf->stream();
        
            if(file_exists($ruta)){
                 if(file_exists($ruta."/".$nombreArchivo)){
                     
                 }
            }
            else{
                mkdir($ruta);
               
            }
           
            
           file_put_contents($ruta."/".$nombreArchivo,$datos);
        
           return $pdf->stream($nombreArchivo);
        
      //return view('pdf.reporte', compact('categorias','iglesia','finanzas'));
    }

    public function ver_reporte(){
         //$date = CarbonImmutable::now();
         $date = CarbonImmutable::create(2021,03,25);
         $fecha = $date->subMonth(1);
        $iglesia = $this->getUserIglesia();
         $ruta=public_path('reportes/').$iglesia->name;
         $nombreArchivo= "reporte_".$iglesia->name."_mes-".$fecha->isoFormat('MMMM').".pdf";
        header("Content-type: application/pdf");
      
        readfile($ruta."/".$nombreArchivo);

    }
}
