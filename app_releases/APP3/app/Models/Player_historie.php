<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Player_historie extends Eloquent {

	protected $fillable= [
	'player_id','from_team_id',
	'to_team_id','start_date',
	'to_date','contract_type',
	'contract_total','season_type'];

	//

}
