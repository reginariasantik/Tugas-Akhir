<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{
   //
   protected $table = "user";

   public function ticket() {
       return $this->hasMany("App\TiketModel", "agent");
   }
}
