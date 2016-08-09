<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Pcomment extends Eloquent {

	protected $fillable= ['post_id','user_id','comment','time','date'];

}
