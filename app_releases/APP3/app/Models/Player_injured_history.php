<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Player_injured_history extends Eloquent {

	protected $fillable= [
		'injured_name','match_id','from_date','to_date','nature_of_medicine','comment','injured_place','medicine_place','addition_info'];
}
