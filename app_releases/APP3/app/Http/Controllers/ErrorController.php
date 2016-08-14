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

class ErrorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	 public function index(Error $error , Request $request)
	{
	 $errors = $error
							 ->join('players as player', 'player.id', '=', 'errors.player_id')
							 ->join('teams as team', 'team.id', '=', 'errors.team_id')
							 ->join('referees as referee', 'referee.id', '=', 'errors.referee_id')
							 ->select(array('errors.id as errorID',
							 								'player.name as player_id',
							 								'team.name as team_name',
															'referee.name as referee_id',
															'errors.comment as comment',
															'errors.time as time'))
							->orderBy('errorID')->get();

		 $tableData = Datatables::of($errors)
			         ->addColumn('actions', function ($data)
				       {
								 return view('partials.actionBtns')->with('controller','error')->with('id', $data->errorID)->render();
							 });

		 if($request->ajax())
			 return DatatablePresenter::make($tableData, 'index');
			 $players=Player::lists('name','id');
			 $teams=Team::lists('name','id');
			 $referees=Referee::lists('name','id');
	 	 	 return view('error.index')
		          ->with('players',$players)->with('teams',$teams)->with('referees',$referees)
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
			 	$error = new Error;
			 	$error->player_id          =$request->player_id;
			 	$error->team_id           =$request->team_id;
			 	$error->referee_id         =$request->referee_id;
			 	$error->time               =$request->time;
				$error->comment            =$request->comment;
			 	$error->save();

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
		$error= Error::find($id);
		if($request->ajax())
		{
			return response(array('msg' => 'Adding Successfull', 'data'=> $error->toJson() ), 200)
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
			 $error= Error::find($id);
			 $error->player_id          =$request->player_id;
		 	 $error->team_id           =$request->team_id;
		 	 $error->referee_id         =$request->referee_id;
		 	 $error->time               =$request->time;
		 	 $error->comment            =$request->comment;
		 	 $error->save();
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
		 $error= Error::find($id);
	 	 $error->delete();
	 	 if($request->ajax()){
	 		 return response(array('msg' => 'Removing Successfull'), 200)
	 							 ->header('Content-Type', 'application/json');
	 		 }
	 	 return redirect()->back();
  }

}
