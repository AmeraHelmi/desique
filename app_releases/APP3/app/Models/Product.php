<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent {

	//
	protected $fillable= ['name','url','flag','description','price'];
}
