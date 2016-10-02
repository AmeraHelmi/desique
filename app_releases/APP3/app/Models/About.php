<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class About extends Eloquent {

	//
	protected $fillable= ['mission','vision','address','tel','email'];
}
