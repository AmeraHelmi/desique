<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Manager extends Eloquent {

	protected $fillable= [
		'name','country_id','role','job','salary','selection_type','comment','city_id','pic_path'
];

}
