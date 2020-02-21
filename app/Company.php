<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['ruc','razon_social','direccion'];

    public function managers(){
        return $this->hasOne(Manager::class);
    }

}
