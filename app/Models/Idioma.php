<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
     //La tabla a conectar a este modelo
     protected $table="languages";

     //La clave primaria de esa tabla 
     protected $primaryKey = "language_id";
 
     // Omitir campos de auditoria
     public $timestamps =false;
    use HasFactory;

    //Relacion entre idioma y paises
    public function paises(){

        return $this->belongsToMany(Country::class,
                                        'country_languages',
                                        'language_id',
                                        'country_id');
    }


}
