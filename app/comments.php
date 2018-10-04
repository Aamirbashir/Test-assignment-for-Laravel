<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //
   protected $table='comments';
   protected $fillable=['user_id','film_id','comment'];

   public function films()
   {
   	return $this->belongsTo('App\Films','film_id');
   }
}
