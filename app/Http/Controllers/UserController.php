<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserCreateFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Iglesia;
use App\User;
use App\UserDate;
use Hash;
use UxWeb\SweetAlert\SweetAlert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
            $this->middleware('ValidateDate')->except('create','store');
    }


    public function index()
    {                    
            $users=User::all();
            

           

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $esMiembro=User::findOrFail(Auth::user()->id)->esMiembro()->last();
       $iglesias= Iglesia::all();
       
       return view('users.registerdate',compact('esMiembro','iglesias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateFormRequest $request)
    {
        $date= UserDate::create($request->all());
        User::find(Auth::user()->id)->asignarIglesia($request->get('iglesia'));
        alert()->success('', '¡Datos registrados con exito!');
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user_date = UserDate::findOrFail(Auth::user()->id);
        $rol= auth()->user()->roles->flatten()->pluck('name')->last();
        
        
        return view('users.show', compact('user','user_date','rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user_date = UserDate::findOrFail(Auth::user()->id);

        

        return view('users.edit',compact('user','user_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateFormRequest $request, $id)
    {
        User::findOrFail(Auth::user()->id)->update($request->all());
        UserDate::findOrFail(Auth::user()->id)->update($request->all());
        
        alert()->success('', '¡Actualización Exitosa!');
        
        return redirect()->route('users.show', Auth::user()->id);
    }

    public function cambiarPassword(ChangePasswordRequest $request, $id){

        
        if(Hash::check($request->get('password-actual'), Auth::user()->password)){
            
            $user=User::find($id);
            
            $user->password=(bcrypt($request->get('password')));
            $user->update();
            alert()->success('', '¡Cambio de contraseña realizado con éxito!');
            return redirect()->route('users.show', $id);
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
        $user=User::findOrFail($id);
        $user->delete();
        if($request->ajax()){
            
            return response()->json($user);
            
        }

        return redirect()->route('users.index');
    }

    
}
