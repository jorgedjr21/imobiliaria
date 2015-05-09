<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $table = 'prop_image';
    protected $guarded = [];
	//

    public function property(){
        $this->belongsTo('App\Property');
    }

}
