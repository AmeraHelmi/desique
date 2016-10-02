<?php namespace App\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Member extends Eloquent {

	//
	protected $fillable= ['name','email','job','flag'];
}
