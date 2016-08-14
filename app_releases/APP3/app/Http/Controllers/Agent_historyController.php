<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Agent_history;
use App\Models\Player;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;

class Agent_historyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		 $this->middleware('auth');
	}

	public function index(Agent_history $agent_history , Request $request)
	{
	 		$agent_histories = $agent_history
		 								->join('agents as agent', 'agent.id', '=', 'agent_histories.agent_id')
		 								->join('players as player', 'player.id', '=', 'agent_histories.player_id')
		 								->select(array('agent_histories.id as agent_historyID',
																	'agent.name as agent_name',
																  'player.name as player_name',
		 														  'agent_histories.from_date as from_date',
																	'agent_histories.to_date as to_date'))
										->orderBy('agent_historyID')->get();

		 	$tableData = Datatables::of($agent_histories)
			 							->addColumn('actions', function ($data)
				 						{
											return view('partials.actionBtns')->with('controller','agent_history')->with('id', $data->agent_historyID)->render();
										});

		 if($request->ajax())
			 return DatatablePresenter::make($tableData, 'index');
			 $agents=Agent::lists('name','id');
			 $players=Player::lists('name','id');
	 	 		return view('agent_history.index')
								->with('agents',$agents)->with('players',$players)
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
 	 		$agent_history = new Agent_history;
 	 		$agent_history->agent_id          =$request->agent_id;
 	 		$agent_history->player_id         =$request->player_id;
 	 		$agent_history->from_date         =$request->from_date;
 	 		$agent_history->to_date           =$request->to_date;
 	 		$agent_history->save();
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
 	 		$agent_history= Agent_history::find($id);
 	 		if($request->ajax())
			{
 		 				return response(array('msg' => 'Adding Successfull', 'data'=> $agent_history->toJson() ), 200)
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
			$agent_history= Agent_history::find($id);
			$agent_history->agent_id          =$request->agent_id;
	  	$agent_history->player_id         =$request->player_id;
	  	$agent_history->from_date         =$request->from_date;
	  	$agent_history->to_date           =$request->to_date;
	  	$agent_history->save();
  		if($request->ajax())
			{
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
  	$agent_history= Agent_history::find($id);
	  $agent_history->delete();
 	  if($request->ajax())
		{
 		 			return response(array('msg' => 'Removing Successfull'), 200)
 							 ->header('Content-Type', 'application/json');
 		}
 	 return redirect()->back();
  }
}
