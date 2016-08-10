<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class V_album extends Eloquent {

	protected $fillable= ['meta','title','vedio_url','country_id','continent','team_id','nation_id','championship_id'];

}
