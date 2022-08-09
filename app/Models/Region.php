<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
     //La tabla a conectar a este modelo
     protected $table="regions";

     //La clave primaria de esa tabla 
     protected $primaryKey = "region_id";
 
     // Omitir campos de auditoria
     public $timestamps =false;
    use HasFactory;

    //Relacion entre regiones y continente
    public function continente(){

        //belongsTo: Parametros
        //1. el modelo a relacionar
        //2. la fk del modelo a relacionar en el modeloo actual
        return $this->belongsTo(Continent::class,
                                      'continent_id');
    }

    //Relacion entre Region 1 - M paises
    public function paises(){

        return $this->hasMany(Country::class,
                                'region_id');
    }
}
