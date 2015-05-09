<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model {

	//
    protected $primaryKey = 'property_id';
    protected $guarded = [];

    public function property(){
        $this->hasOne('App\Property');
    }

    public function user(){
        $this->belongsTo('App\User');
    }



}
