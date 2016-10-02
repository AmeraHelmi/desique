<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Service extends Eloquent {

	protected $fillable= ['name','flag','url','description'];

}
