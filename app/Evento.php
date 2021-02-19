<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'iglesia_id','start','end','descripcion','title','color','textColor',
    ];

    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class);
    }
}
