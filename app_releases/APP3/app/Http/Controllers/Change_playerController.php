<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Match;
use App\Models\Reserve_player;
use App\Models\Change_player;
use App\Models\Team;
use App\Models\Player;
use App\Models\Player_match;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;

class Change_playerController  extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	public function index(Change_player $change_player , Request $request)
	{
		$change_players = $change_player
	  	->join('teams as T', 'T.id', '=', 'change_players.team_id')
			->join('matches as M', 'M.id', '=', 'change_players.match_id')
		  ->join('players as Pm', 'Pm.id', '=', 'change_players.player1_id')
			->join('players as RP', 'RP.id', '=', 'change_players.player2_id')
			->select(array('T.name as Tname', 'Pm.name as P1name', 'RP.name as P2name','change_players.id as CPID'))
			->orderBy('CPID','desc')->get();

			$tableData = Datatables::of($change_players)
				->addColumn('actions', function ($data)
					{return view('change_player/partial.actionBtns')->with('controller','change_player')->with('id', $data->CPID)->render(); })
                    ;

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				$teams   =Team::lists('name','id');
				$match= new Match;
				$matches  = $match
			 		 ->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
			 		 ->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
			 		 ->select(array('team1.name as team1_name','team2.name as team2_name','matches.id as matchid'))
			 		 ->get();
		return view('change_player.index')
		  ->with('teams',$teams)
			->with('matches',$matches)
		  ->with('tableData', DatatablePresenter::make($tableData, 'index'));
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	 public function getteams(Request $request)
	 {
		 $match_id = $request->match_id;
		 $teams = Match::where('id',$match_id)->get();

		 foreach($teams as $row){
			 $team1_name=Team::where('id',$row->team1_id)->get(['name','id']);
			 $team2_name=Team::where('id',$row->team2_id)->get(['name','id']);
			 foreach ($team1_name as $t1name) {
			 	echo'<option value='.$t1name->id.'> '. $t1name->name.' </option>';
			 }
			 foreach ($team2_name as $t2name) {
			 	echo'<option value='.$t2name->id.'> '. $t2name->name.' </option>';
			 }
		 }

	 }

	 public function getplayers1(Request $request)
	 {
		 $team_id = $request->team_id;
		 $team_player = Player_match::where('team_id',$team_id)->get();

		 foreach($team_player as $row){

			 $player_name=Player::where('id',$row->player_id)->get(['name']);
				 foreach($player_name as $row2){
					 	echo'<option value='.$row->player_id.'> '.$row2->name.' </option>';

				 }
		 }


}
public function getplayers2(Request $request)
{
$team_id = $request->team_id;

$team_rplayer = Reserve_player::where('team_id',$team_id)->get();
foreach($team_rplayer as $row){

	$player_name=Player::where('id',$row->player_id)->get(['name']);
		foreach($player_name as $row2){
			echo'<option value='.$row->player_id.'> '.$row2->name.' </option>';

		}
}

	 }

	public function store(Request $request)
	{

	$change_player = new Change_player;
			$change_player->team_id    = $request->team_id;
			$change_player->player1_id    = $request->player1_id;
			$change_player->player2_id    = $request->player2_id;
			$change_player->match_id    = $request->match_id;
			$change_player->ch_time    =time();

			$change_player->save();


		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull'), 200)
								->header('Content-Type', 'application/json');
								return redirect()->back();

			}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request , $id)
	{
		$change_player 	= Change_player::find($id);
		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=>$change_player->toJson() ), 200)
								->header('Content-Type', 'application/json');
			}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function update(Request $request , $id)
 	{

	$change_player =Change_player::find($id);
	$change_player->team_id    = $request->team_id;
	$change_player->player1_id    = $request->player1_id;
	$change_player->player2_id    = $request->player2_id;
	$change_player->match_id    = $request->match_id;

	$change_player->save();


 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	$change_player 	= Change_player::find($id);

		$change_player->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');

			}
		return redirect()->back();
	}

}
