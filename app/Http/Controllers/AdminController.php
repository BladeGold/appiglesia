<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserDate;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Iglesia;
use DB;

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
                /* $result = [];
                $ruta= public_path('reportes\Paseo');
                   
                if($dirs = \File::directories(public_path('reportes/'))){
                    foreach($dirs as $dir){
                       
                        if($dir == $ruta){
                           //actually string: /home/mylinuxiser/myproject/public"
                            $files = \File::files($dir);
                            foreach($files as $reporte){
                             //actually object SplFileInfo
                            //object(Symfony\Component\Finder\SplFileInfo)#628 (4) {
                            //["relativePath":"Symfony\Component\Finder\SplFileInfo":private]=>
                            //string(0) ""
                            //["relativePathname":"Symfony\Component\Finder\SplFileInfo":private]=>
                            //string(14) "text1_logo.png"
                            //["pathName":"SplFileInfo":private]=>
                            //string(82) "/home/mylinuxiser/myproject/public/img/text1_logo.png"
                            //["fileName":"SplFileInfo":private]=>
                            //string(14) "text1_logo.png"
                            //}
                    
                            if(\str_ends_with($reporte, ['.pdf'])){
                                $result[] = $reporte->getRelativePathname(); //prefix your public folder here if you want
                            }
                            }
                        }else{
                            dd('aca1');
                        }
                    
                    
                    }
                }
               */
              

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

    public function backup_database(){

        $DbName             = env('DB_DATABASE');
        $get_all_table_query = "SHOW TABLES ";
        $result = DB::select(DB::raw($get_all_table_query));
    
        $prep = "Tables_in_$DbName";
        foreach ($result as $res){
            $tables[] =  $res->$prep;
        }
    
    
    
        $connect = DB::connection()->getPdo();
    
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();
    
    
        $output = '';
        foreach($tables as $table)
        {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();
    
            foreach($show_table_result as $show_table_row)
            {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();
    
            for($count=0; $count<$total_row; $count++)
            {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }
}
