<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Commentor  extends Eloquent {

	//
	protected $fillable= [
		'name','country_id','count','flag','city_id','nationality'
];

}
