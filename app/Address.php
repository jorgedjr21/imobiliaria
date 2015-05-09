<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	//
    protected $primaryKey = 'address_id';
    protected $guarded = [];

    public function property(){
        $this->belongsTo('App\Property');
    }

}
