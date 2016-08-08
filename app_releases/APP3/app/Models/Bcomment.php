<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Bcomment extends Eloquent {

	protected $fillable= ['blog_id','user_id','comment','time','date'];

}
