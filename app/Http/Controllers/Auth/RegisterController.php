<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (empty($data['imagen'])){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255','alpha','min:5'],
                'last_name' => ['required', 'string', 'max:255','alpha','min:5'],
                'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ]);

        }
        else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255','alpha','min:5'],
                'last_name' => ['required', 'string', 'max:255','alpha','min:5'],
                'email' => ['required', 'string', 'email:filter', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'imagen' => ['required','mimes:jpeg,png,jpg'],

            ]);

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(empty($data['imagen'])) {

            $user= User::create([
                    'name' => $data['name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'imagen' => "default.png",
                ])->assignRoles('user');
                
        }
        else{
            if (request()->File('imagen')){
                $file = request()->File('imagen');
                $collection = Str::of($data['email'])->explode('@');
                $filename = $collection[0].$collection[1].'.'.$file->extension();
                $ruta= public_path('/imgProfile/'.$filename) ;
                Image::make($file->getRealPath())
                    ->resize(600,400, function ($constraint){
                        $constraint->aspectRatio();
                    })
                    ->save($ruta,72);

                $data['imagen']=$filename;

                $user= User::create([
                        'name' => $data['name'],
                        'last_name' => $data['last_name'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password']),
                        'imagen' => $data['imagen'],
                    ])->assignRoles('user');
            }
        }
      return $user;   
    }
}
