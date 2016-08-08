<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Player;
use App\Models\Commentor;
use App\Models\Referee;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use App\Models\Group;
use App\Models\Championship;
use App\Models\Psession;
use App\Models\Team;
use App\Models\Match;
use App\Models\Offside;
use App\Models\Penlty;
use App\Models\Error;
use App\Models\Corner;

class CornerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	 public function index(Corner $corner , Request $request)
	{
	 $corners = $corner
	   ->join('teams as team', 'team.id', '=', 'corners.team_id')
		 ->join('players as player', 'player.id', '=', 'corners.player_id')
		 ->join('matches as match', 'match.id', '=', 'corners.match_id')
		 ->join('referees as referee', 'referee.id', '=', 'corners.referee_id')
		 ->select(array('corners.id as cornerID','team.name as team_name','player.name as player_name',
		 'match.id as match_id','referee.name as referee_name','corners.time as time'))
		->orderBy('cornerID')->get();

		 $tableData = Datatables::of($corners)
			 ->addColumn('actions', function ($data)
				 {return view('partials.actionBtns')->with('controller','corner')->with('id', $data->cornerID)->render(); })
			 ;

		 if($request->ajax())
			 return DatatablePresenter::make($tableData, 'index');
			 $teams=Team::lists('name','id');
			 $players=Player::lists('name','id');
			 $matchs=Match::get();
			 $referees=Referee::lists('name','id');
			 $match= new Match;
			 $matches  = $match
					 ->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
					 ->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
					 ->select(array('team1.name as team1_name','team2.name as team2_name','matches.id as matchid'))
					 ->get();
	 return view('corner.index')
		->with('teams',$teams)->with('players',$players)
		->with('matches',$matches)->with('referees',$referees)
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
	 public function store(Request $request)
	 {
	  $corner = new Corner;
		$corner->team_id           =$request->team_id;
	  $corner->player_id          =$request->player_id;
		$corner->match_id          =$request->match_id;
	  $corner->referee_id         =$request->referee_id;
	  $corner->time               =$request->time;
	  $corner->save();

	  return response(array('msg' => 'Adding Successfull'), 200)
	 					 ->header('Content-Type', 'application/json');
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
		$corner= Corner::find($id);
		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=> $corner->toJson() ), 200)
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
	 $corner= Corner::find($id);
	 $corner->team_id           =$request->team_id;
	 $corner->player_id          =$request->player_id;
	 $corner->match_id          =$request->match_id;
	 $corner->referee_id         =$request->referee_id;
	 $corner->time               =$request->time;
 	 $corner->save();
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
	 $corner= Corner::find($id);
 	 $corner->delete();
 	 if($request->ajax()){
 		 return response(array('msg' => 'Removing Successfull'), 200)
 							 ->header('Content-Type', 'application/json');
 		 }
 	 return redirect()->back();
  }

}
