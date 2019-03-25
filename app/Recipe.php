<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //Table name
    protected $table='recipes';
    
    //Primary key
    public $primarykey='id';

    //Timestamps
    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
