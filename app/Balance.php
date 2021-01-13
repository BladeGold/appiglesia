<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'monto','fecha', 
    ];


    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class);
    }
}
