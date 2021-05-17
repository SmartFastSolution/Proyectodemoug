<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoControl extends Model
{
       public function atenciones()
     {
         return $this->hasMany('App\Atencion', 'tipo_control_id');
     }
}
