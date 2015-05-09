<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

	//
    protected $guarded = [];

    public function advertisement(){
        $this->belongsTo('App\Advertisement');
    }

    public function address(){
        $this->hasOne('App\Address');
    }

    public function images(){
        $this->hasMany('App\Image');
    }

}
