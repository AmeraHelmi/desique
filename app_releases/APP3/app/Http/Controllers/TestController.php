<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use App\Models\Match;
use App\Models\Team_player;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Carbon\Carbon;


class TestController  extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 {
	 $this->middleware('auth');
 }
	 public function index(Match $match , Request $request)
	{
	 $match = $match
	   ->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
		 ->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
		 ->select(array('T1.name as T1name','T2.name as T2name'
		 ,'matches.id as match_id',
		 'matches.team1_goals as team1_goals',
		 'matches.team2_goals as team2_goals',
		 'matches.match_date as match_date',
		 'T1.flag as T1flag',
		 'T2.flag as T2flag',
		 'T1.id as T1ID',
		 'T2.id as T2ID'
		))
		->orderBy('match_id','desc')->get();

	 return view('test.index')
		->with('match',$match);
		}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function display()
	{
		$match= new Match;
		$match = $match
			->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
			->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
			->select(array('T1.name as T1name','T2.name as T2name'
			,'matches.id as match_id',
			'matches.team1_goals as team1_goals',
			'matches.team2_goals as team2_goals',
			'matches.match_date as match_date',
			'T1.flag as T1flag',
			'T2.flag as T2flag',
			'T1.id as T1ID',
			'T2.id as T2ID'
		 ))
		 ->orderBy('match_id','desc')->get();

$matchnow= new Match;
		 $matchNow = $matchnow
 			->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
 			->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
 			->select(array('T1.name as T1name','T2.name as T2name'
 			,'matches.id as match_id',
 			'matches.team1_goals as team1_goals',
 			'matches.team2_goals as team2_goals',
 			'matches.match_date as match_date',
 			'T1.flag as T1flag',
 			'T2.flag as T2flag',
 			'T1.id as T1ID',
 			'T2.id as T2ID'
 		 ))
 		 ->where('match_date',date('Y-m-d'))->get();


	return view('template.index')
	->with('match',$match)
	->with('matchNow',$matchNow);

	}


public function displayplayers(Team_player $team_players , $id)
{
			$team_id = Team_player::find($id);

			$team_players = $team_players
			->join('players as P','P.id','=','team_players.player_id')
			->select(array('P.name as Pname','P.flag as Pflag','P.id as PID'))
			->where('team_id',$id)->get();
			return view('template.players')
			->with('team_players',$team_players);
}
public function displayplayersdetail(Player $playersdetail ,$id){
		$Player_id = Player::find($id);

		$playersdetail=$playersdetail
		->join('player_histories as Phistory','Phistory.player_id','=','players.id')
		->join('teams as T1','T1.id','=','Phistory.from_team_id')
		->join('teams as T2','T2.id','=','Phistory.to_team_id')
		->select(array(
			'players.name as Pname',
			'players.flag as Pflag',
			'players.nickname as Pnickname',
			'players.birth_date as Pbdate',
			'players.weight as Pw',
			'players.height as Ph',
			'players.speed as Pspeed',
			'Phistory.from_team_id as Fteam',
	  	'Phistory.to_team_id as toteam',
			'Phistory.from_date',
	  	'Phistory.to_date',
			'Phistory.contract_type',
	  	'Phistory.season_type',
			'Phistory.contract_total',
			'T1.name as T1name',
			'T2.name as T2name'
		))
		->where('players.id',$id)->get();
		return view('template.playersdetail')
		->with('playersdetail',$playersdetail);
}
public function displayplan(Match $match,$id){
	$match_id=Match::find($id);

///////////////teams name///////////////////////////////
	$teamsname=$match
	->join('teams as T1','T1.id','=','matches.team1_id')
	->join('teams as T2','T2.id','=','matches.team2_id')
	->select(array(
	  'T1.name as T1name',
	  'T2.name as T2name'
	))
	->where('matches.id',$id)->get();
//////////////////////////////////////////////////////////
	$playersteam1=$match
	->join('teams as T1','T1.id','=','matches.team1_id')
	->join('team_players as TP1','TP1.team_id','=','T1.id')
	->join('players as player1','player1.id','=','TP1.player_id')
	->select(array(
		'player1.name as P1name',
		'Player1.flag as P1flag'
		))
	->where('matches.id',$id)->get();

	$playersteam2=$match
	->join('teams as T2','T2.id','=','matches.team2_id')
	->join('team_players as TP2','TP2.team_id','=','T2.id')
	->join('players as player2','player2.id','=','TP2.player_id')
	->select(array(
	  'player2.name as P2name',
	  'Player2.flag as P2flag'
	  ))
	->where('matches.id',$id)->get();

	return view('template.plan')
	->with('teamsname',$teamsname)
	->with('playersteam1',$playersteam1)
	->with('playersteam2',$playersteam2);
}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	 public function store(Request $request)
 	{

 	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Team_player $team_players , Request $request , $id)
	{
		$team_id = Team_player::find($id);

		$team_players = $team_players
		->join('players as P','P.id','=','team_players.player_id')
		->select(array('P.name as Pname','P.flag as Pflag','P.id as PID'))
		->where('team_id',$id)->get();

		return view('test.show')
		->with('team_players',$team_players);
	}

	public function playerDetail(Player $player , Team_player $team_players , Request $request , $id)
	{
		$player = Player::find($id);

		$player = $player->where('id',$id)->get();

		return view('test.showdetail')
		->with('player',$player);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit(Request $request , $id)
  {

  }
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function update(Request $request , $id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function destroy($id)
  {


}
}
