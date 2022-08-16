<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //La tabla a conectar a este modelo
    protected $table="countries";

    //La clave primaria de esa tabla 
    protected $primaryKey = "country_id";

    // Omitir campos de auditoria
    public $timestamps =false;
    use HasFactory;

    //Relacion entre Paises e idiomas
    public function idiomas(){

        //BelongsToMany : Parametros
        //1. El modelo a relacionar
        //2. la tabla debil
        //3. la FK del modelo actual en la tabla debil
        //4. FK del modelo a relacionar en la tabla debil
        return $this->belongsToMany(Idioma::class,
                                        'country_languages',
                                        'country_id',
                                        'language_id'
                                        )->withPivot('official');
    }

    public function region(){
        return $this->belongsTo(Region::class,
                                    'region_id');
    }

}
