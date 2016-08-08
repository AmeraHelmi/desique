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

class PenltyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 {
	 $this->middleware('auth');
 }
	 public function index(Penlty $penlty , Request $request)
	{
	 $penlties = $penlty
		 ->join('players as player', 'player.id', '=', 'penlties.player_id')
		 ->join('matches as match', 'match.id', '=', 'penlties.match_id')
		 ->join('referees as referee', 'referee.id', '=', 'penlties.referee_id')
		 ->select(array('penlties.id as penltyID','player.name as player_id',
		 'match.id as match_id', 'referee.name as referee_id','penlties.corner_side as corner_side', 'penlties.time as time'))
		->orderBy('penltyID')->get();

		 $tableData = Datatables::of($penlties)
			 ->addColumn('actions', function ($data)
				 {return view('partials.actionBtns')->with('controller','penlty')->with('id', $data->penltyID)->render(); })
			 ;

		 if($request->ajax())
			 return DatatablePresenter::make($tableData, 'index');
			 $players=Player::lists('name','id');
			 $matchs=Match::get();
			 $referees=Referee::lists('name','id');
			 $match= new Match;
			 $matches  = $match
					 ->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
					 ->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
					 ->select(array('team1.name as team1_name','team2.name as team2_name','matches.id as matchid'))
					 ->get();
	 return view('penlty.index')
		->with('players',$players)->with('matches',$matches)->with('referees',$referees)
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
	 	$penlty = new Penlty;
	 	$penlty->player_id          =$request->player_id;
	 	$penlty->match_id           =$request->match_id;
	 	$penlty->referee_id         =$request->referee_id;
		$penlty->corner_side        =$request->corner_side;
	 	$penlty->time               =$request->time;
	 	$penlty->save();

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
		$penlty= Penlty::find($id);
		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=> $penlty->toJson() ), 200)
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
	 $penlty= Penlty::find($id);
	 $penlty->player_id          =$request->player_id;
	 $penlty->match_id           =$request->match_id;
	 $penlty->referee_id         =$request->referee_id;
	 $penlty->corner_side        =$request->corner_side;
	 $penlty->time               =$request->time;
	 $penlty->save();
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
		$penlty= Penlty::find($id);
		$penlty->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}


}
