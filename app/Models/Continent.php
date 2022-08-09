<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //La tabla a conectar a este modelo
    protected $table="continents";

    //La clave primaria de esa tabla 
    protected $primaryKey = "continent_id";

    // Omitir campos de auditoria
    public $timestamps =false;
    use HasFactory;

    //Relación entre continente y region
    public function regiones(){

        //hasMany Parametros
        //1. El modelo a relacionar
        //2. La FK del modelo actual en el modelo a relacionar
        return $this->hasMany(Region::class,
                                'continent_id');

    }

    //Relacion entre continente y sus paises:
    //Donde el abuelo es: Continente, el padre es: Region y el nieto es: paises
    
    public function paises(){

        //hasManyThrough : Parametros
        //1. Modelo nieto
        //2. Modelo Padre
        //3. FK del abuelo en el papá
        return $this->hasManyThrough(Country::class,
                                     Region::class,
                                    'continent_id',
                                    'region_id');
    }
}
