<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diezmo extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'monto', 'fecha','iglesia_id', 'referencia',
    ];

    public function iglesia()
    {
        return $this->belongsTo(Iglesia::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
