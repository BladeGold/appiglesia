<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finanza extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'categoria', 'monto','fecha', 'descripcion','tipo'
    ];

    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class);
    }
}
