<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    //
    protected $table='films';
    protected $fillable=['name','description','release_date','ratings','country','ticket_price','genrs','photo'];

    public function comments()
    {
    	return $this->hasMany('App\comments','film_id');
    }
}
