<?php
namespace App\Http\Traits;

use App\Iglesia;
use Illuminate\Support\Facades\Auth;

trait IglesiaTrait{

    
    public function getUserIglesia(){
        return Iglesia::find(Auth::user()->Pertenece->pluck('id')->last());
    }

}

?>