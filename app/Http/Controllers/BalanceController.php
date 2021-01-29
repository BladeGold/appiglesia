<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\IglesiaTrait;
use Carbon\CarbonImmutable;
use App\Balance;

class BalanceController extends Controller
{
    use IglesiaTrait;
    public function index($fecha)
    {   
        $balance = Balance::where('fecha','=',$fecha);
        print_r($balance);
        dd($fecha);
       
    }

   
    public function create()
    {
        //
    }
   
    public function inicial()
    {
        $iglesia= $this->getUserIglesia();
        
      return  view('balances.inicial', compact('iglesia'));
    }

   
    public function store(Request $request)
    {   $i=2;
        $keys = "Domingo_".$i;
        $categorias= $this->categorias;
        $iglesia = $this->getUserIglesia();
        $date = CarbonImmutable::now();
        $datee = CarbonImmutable::create(2021,02,28);
                
                    
                
        $ultimoBalance = CarbonImmutable::create($iglesia->Balances()->latest()->get('fecha')->first()->fecha); 
        $retrasoBalance = $date->diffInMonths($ultimoBalance);
        $dateBalance = $date->subMonth($retrasoBalance);
                  
        
        if(is_null($iglesia->Finanzas()->where('tipo','=','activo')->get()->last())){
            $msg=[
                'text' => "No Posee finanzas de tipo activo (ingresos) registradas",
                    'title' => "¡Atención!",
                    'icon' => "warning"
            ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }

        }elseif(is_null($iglesia->Finanzas()->where('tipo','=','pasivo')->get()->last())){
            $msg=[
                'text' => "No Posee finanzas de tipo pasivo (egresos) registradas",
                    'title' => "¡Atención!",
                    'icon' => "warning"
            ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }

        }elseif(is_null($iglesia->Finanzas->last())){
            $msg=[
                'text' => "No Posee finanzas registradas",
                    'title' => "¡Atención!",
                    'icon' => "warning"
            ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }
            
        }else{
         
        $ultimoActivo = $iglesia->Finanzas()->where('tipo','=','activo')->latest()->get('fecha')->first()->fecha;
        $retrasoActivo = $date->diffInMonths($ultimoActivo);
        $dateActivo = $date->subMonth($retrasoActivo);
                    
                    
        $ultimoPasivo = $iglesia->Finanzas()->where('tipo','=','pasivo')->latest()->get('fecha')->first()->fecha;
        $retrasoPasivo = $date->diffInMonths($ultimoPasivo);
        $datePasivo = $date->subMonth($retrasoPasivo);

        if( ($retrasoActivo > 1) && ($retrasoPasivo > 1) ){            
            $msg=[
                'text' => "Posee un retraso con sus finanzas ¡Por Favor Actualizarlas!",
                    'title' => "¡Atención!",
                    'icon' => "warning"
            ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }
                
            }elseif( ($retrasoActivo > 1)  ){     
                $msg=[
                    'text' => "Posee un retraso  con sus Activos (ingresos) ¡Por Favor Actualice sus Finanzas!",
                    'title' => "¡Atención!",
                    'icon' => "warning"
                ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }
                
            }elseif( ($retrasoPasivo > 1)  ){           
                $msg=[
                    'text' => "Posee un retraso de mes con sus Pasivos (egresos) ¡Por Favor Actualice sus Finanzas!",
                    'title' => "¡Atención!",
                    'icon' => "warning"
                ];
                if($request->ajax()){
                
                    return response()->Json($msg,404);
                    
                }

            }

        switch ($request->tipo) {
            case 'mensual':
            
                    if( $retrasoBalance >= 1 ){

                        if($activos=$iglesia->Finanzas()->where('tipo','=','activo')->whereBetween('fecha',[$dateActivo->startOfMonth(), $dateActivo->endOfMonth()])->pluck('monto','categoria')->toArray());
                            else{
                                $msg=[
                                    'text' => "No posee  Activos (egresos) registrado para este mes",
                                    'title' => "¡Atención!",
                                    'icon' => "info"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg,404);
                                    
                                }
                            }
                            if($pasivos=$iglesia->Finanzas()->where('tipo','=','pasivo')->whereBetween('fecha',[$datePasivo->startOfMonth(),
                            $datePasivo->endOfMonth()])->pluck('monto','categoria')->toArray());
                            else{
                                $msg=[
                                    'text' => "No posee  Activos (egresos) registrado para este mes",
                                    'title' => "¡Atención!",
                                    'icon' => "info"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg,404);
                                    
                                }
                            }    
                            $balanceInicial=$iglesia->Balances()->where('inicial','=','1')->pluck('monto','categoria')->toArray();    
                            ($balances=$iglesia->Balances->where('inicial','=',NULL)->whereBetween('fecha',[$ultimoBalance->startOfMonth(),$ultimoBalance->endOfMonth()])
                            ->pluck('monto','categoria')->toArray());
                            
                            
                            foreach ($categorias as $key => $value) {
                                if($key==='Diezmo_Total' && array_key_exists($key,$activos)){
                                    $activos[$key]=$activos[$key]*0.85;                                
                                }
                                if(array_key_exists($key,array_intersect_key($balances, $activos))){  
                                    $activos[$key]= $activos[$key] * 0.50;
                                }
                                elseif(array_key_exists($key,array_intersect_key($balanceInicial, $activos))){  
                                    $activos[$key]= $activos[$key] * 0.50; 
                                
                                }
                                if($key==='Impulso_Mundial' && array_key_exists($key,$activos)){
                                    $activos[$key]=$activos[$key]*0.25;
                                }
                                    
                                
                                if(empty($balances)){
                                    
                                    if($key === "Fondo_Local" && array_key_exists($key,$balanceInicial)){
                                        for ($i; $i <=4 ; $i++) { 
                                            if(array_key_exists($keys,$activos)){                                        
                                                $balanceInicial[$key]= $balanceInicial[$key] + $activos[$keys];
                                                
                                            }
                                        }                                    
                                    }
                                    if($key === "Diezmo_Restante" && array_key_exists($key,$balanceInicial) && array_key_exists('Diezmo_Total', $activos)){
                                        $balanceInicial[$key]=$balanceInicial[$key]+$activos['Diezmo_Total'];
                                    }
                                    if(array_key_exists($key,array_intersect_key($balanceInicial,$activos))){
                                        $balanceInicial[$key]=$balanceInicial[$key]+$activos[$key];
                                    }
                                    
                                    if(array_key_exists($key, $pasivos) ){
                                        
                                        if(array_key_exists($key, array_intersect_key($pasivos, $balanceInicial))){
                                            $total[$key] = $balanceInicial[$key] - $pasivos[$key];
                                        
                                           if (!$iglesia->Balances()->create([
                                                'monto'=>$total[$key],
                                                'categoria' =>$key,
                                                'fecha' => $ultimoBalance->endOfMonth(),                                        
                                            ])); 
                                        } 
                                    }
                                    /*
                                    ##### fin balance inicial ###########
                                    */
                                    
                                }else{
                                    
                                    if($key === "Fondo_Local" && array_key_exists($key,$balances)){
                                        for ($i; $i <=4 ; $i++) { 
                                            if(array_key_exists($keys,$activos)){                                        
                                                $balances[$key]= $balances[$key] + $activos[$keys];
                                                
                                            }
                                        }                                    
                                    } 
                                    if($key === "Diezmo_Restante" && array_key_exists($key,$balances) && array_key_exists('Diezmo_Total', $activos)){
                                        $balances[$key]=$balances[$key]+$activos['Diezmo_Total'];
                                    }
                                    if(array_key_exists($key,array_intersect_key($balances,$activos))){
                                        $balances[$key]=$balances[$key]+$activos[$key];
                                    }
                                    if(array_key_exists($key, $pasivos) ){
                                        
                                        if(array_key_exists($key, array_intersect_key($pasivos, $balances))){
                                            $total[$key] = $balances[$key] - $pasivos[$key];
                                        
                                           if (!$iglesia->Balances()->create([
                                                'monto'=>$total[$key],
                                                'categoria' =>$key,
                                                'fecha' => $ultimoBalance->endOfMonth(),                                        
                                            ])); 
                                        } 
                                    }                              
                                }
                                

                            }
                                $msg=[
                                    'text' => "Se a generado el balacance para la fecha ".$ultimoBalance->endOfMonth()->format('Y-m-d') ,
                                    'title' => "¡Exitoso!",
                                    'icon' => "success"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg);
                                    
                                }
                    }else{
                    
                        $msg=[
                            'text' => "Sus Balances estan actualizados",
                            'title' => "¡No es necesario!",
                            'icon' => "info"
                        ];
                        if($request->ajax()){
                        
                            return response()->json($msg);
                            
                        }
                    }
            
            break; 
            /* Fin del Case
            */
            
            case 'ahora':
          
                        if($ultimoBalance->format('Y-m-d') !== $date->format('Y-m-d')){
                            
                            if($activos=$iglesia->Finanzas()->where('tipo','=','activo')->whereBetween('fecha',[$dateActivo->startOfMonth(), $date])->pluck('monto','categoria')->toArray());
                            else{
                                $msg=[
                                    'text' => "No posee  Activos (egresos) registrado para este mes",
                                    'title' => "¡Atención!",
                                    'icon' => "info"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg,404);
                                    
                                }
                            }
                            if($pasivos=$iglesia->Finanzas()->where('tipo','=','pasivo')->whereBetween('fecha',[$datePasivo->startOfMonth(),
                            $date])->pluck('monto','categoria')->toArray());
                            else{
                                $msg=[
                                    'text' => "No posee  Activos (egresos) registrado para este mes",
                                    'title' => "¡Atención!",
                                    'icon' => "info"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg,404);
                                    
                                }
                            }    
                            $balanceInicial=$iglesia->Balances()->where('inicial','=','1')->pluck('monto','categoria')->toArray();    
                            ($balances=$iglesia->Balances->where('inicial','=',NULL)->whereBetween('fecha',[$ultimoBalance->startOfMonth(),$date])
                            ->pluck('monto','categoria')->toArray());
                            
                            
                            foreach ($categorias as $key => $value) {
                                if($key==='Diezmo_Total' && array_key_exists($key,$activos)){
                                    $activos[$key]=$activos[$key]*0.85;                                
                                }
                                if(array_key_exists($key,array_intersect_key($balances, $activos))){  
                                    $activos[$key]= $activos[$key] * 0.50;
                                }
                                elseif(array_key_exists($key,array_intersect_key($balanceInicial, $activos))){  
                                    $activos[$key]= $activos[$key] * 0.50; 
                                
                                }
                                if($key==='Impulso_Mundial' && array_key_exists($key,$activos)){
                                    $activos[$key]=$activos[$key]*0.25;
                                }
                                    
                                
                                if(empty($balances)){
                                    
                                    if($key === "Fondo_Local" && array_key_exists($key,$balanceInicial)){
                                        for ($i; $i <=4 ; $i++) { 
                                            if(array_key_exists($keys,$activos)){                                        
                                                $balanceInicial[$key]= $balanceInicial[$key] + $activos[$keys];
                                                
                                            }
                                        }                                    
                                    }
                                    if($key === "Diezmo_Restante" && array_key_exists($key,$balanceInicial) && array_key_exists('Diezmo_Total', $activos)){
                                        $balanceInicial[$key]=$balanceInicial[$key]+$activos['Diezmo_Total'];
                                    }
                                    if(array_key_exists($key,array_intersect_key($balanceInicial,$activos))){
                                        $balanceInicial[$key]=$balanceInicial[$key]+$activos[$key];
                                    }
                                    
                                    if(array_key_exists($key, $pasivos) ){
                                        
                                        if(array_key_exists($key, array_intersect_key($pasivos, $balanceInicial))){
                                            $total[$key] = $balanceInicial[$key] - $pasivos[$key];
                                        
                                           if (!$iglesia->Balances()->create([
                                                'monto'=>$total[$key],
                                                'categoria' =>$key,
                                                'fecha' => $date,                                        
                                            ])); 
                                        } 
                                    }
                                    /*
                                    ##### fin balance inicial ###########
                                    */
                                    
                                }else{
                                    
                                    if($key === "Fondo_Local" && array_key_exists($key,$balances)){
                                        for ($i; $i <=4 ; $i++) { 
                                            if(array_key_exists($keys,$activos)){                                        
                                                $balances[$key]= $balances[$key] + $activos[$keys];
                                                
                                            }
                                        }                                    
                                    } 
                                    if($key === "Diezmo_Restante" && array_key_exists($key,$balances) && array_key_exists('Diezmo_Total', $activos)){
                                        $balances[$key]=$balances[$key]+$activos['Diezmo_Total'];
                                    }
                                    if(array_key_exists($key,array_intersect_key($balances,$activos))){
                                        $balances[$key]=$balances[$key]+$activos[$key];
                                    }
                                    if(array_key_exists($key, $pasivos) ){
                                        
                                        if(array_key_exists($key, array_intersect_key($pasivos, $balances))){
                                            $total[$key] = $balances[$key] - $pasivos[$key];
                                        
                                           if (!$iglesia->Balances()->create([
                                                'monto'=>$total[$key],
                                                'categoria' =>$key,
                                                'fecha' => $date,                                        
                                            ])); 
                                        } 
                                    }                              
                                }
                                

                            }
                                $msg=[
                                    'text' => "Se a generado el balacance para la fecha ".$date->format('Y-m-d') ,
                                    'title' => "¡Exitoso!",
                                    'icon' => "success"
                                ];
                                if($request->ajax()){
                                
                                    return response()->Json($msg);
                                    
                                }
                            
                        }else{
                            $msg=[
                                'text' => "Sus Balances estan actualizados",
                                'title' => "¡No es necesario!",
                                'icon' => "info"
                            ];
                            if($request->ajax()){
                            
                                return response()->json($msg);
                                
                            }
                        }
                break;
            }
        }
    }

    
    public function show($id)
    {
        $date = CarbonImmutable::now();
        $iglesia = $this->getUserIglesia();
    
        $categorias = $this->categorias;
        $ultimoBalance = $iglesia->Balances()->latest()->get('created_at')->first()->created_at;
        $retrasoBalance = $date->diffInMonths($ultimoBalance);
        $dateBalance = $date->subMonths($retrasoBalance);
        $balances = $iglesia->Balances()->latest()->take(8)->get();

     

        return view('balances.show', compact( 'categorias','iglesia','balances') );
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy(Request $request, $id)
    {   
        $balance = Balance::find($id);
    Balance::Where('fecha','=',$balance->fecha)->delete();
    
    if($request->ajax()){
                                
        return response()->Json($balance);
        
    }
       
        
       
    }
}
