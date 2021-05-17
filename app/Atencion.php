<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
       public function requerimiento()
     {
         return $this->belongsTo('App\Requerimiento');
     }
       public function documentos(){
        return $this->morphMany('App\Document', 'documentable');
    }
      public function operador()
     {
         return $this->belongsTo('App\User', 'operador_id');
     }
          public function tipo()
     {
         return $this->belongsTo('App\TipoControl', 'tipo_control_id');
     }
        public function sector()
     {
         return $this->belongsTo('App\Sector');
     }
}
