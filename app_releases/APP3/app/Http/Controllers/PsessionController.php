<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Psession;
use App\Models\Team;
use App\Models\Match;
use App\Models\Commentor;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use App\Models\Group;
use App\Models\Championship;



class PsessionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 {
	 $this->middleware('auth');
 }
	 public function index(Psession $psession , Request $request)
	 {
		 $psessions = $psession
			 ->join('teams as team', 'team.id', '=', 'psessions.team_id')
			 ->join('matches as match', 'match.id', '=', 'psessions.match_id')
			 ->select(array('psessions.id as psessionID', 'team.id as team_id', 'match.id as match_id', 'psessions.time as time', 'psessions.percent as percent'))
			->orderBy('psessionID','desc')->get();

			 $tableData = Datatables::of($psessions)
				 ->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','psession')->with('id', $data->psessionID)->render(); })
				 ;

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				 $teams=Team::lists('name','id');
				 $match= new Match;
				 $matches  = $match
						->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
						->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
						->select(array('team1.name as team1_name','team2.name as team2_name','matches.id as matchid'))
						->get();
		 return view('psession.index')
		   ->with('teams',$teams)->with('matches',$matches)
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
		  $psession = new Psession;
			$psession->team_id            =$request->team_id;
			$psession->match_id           =$request->match_id;
			$psession->time               =$request->time;
			$psession->percent            =$request->percent;
			$psession->save();

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
		$psession= Psession::find($id);
		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=> $psession->toJson() ), 200)
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
		$psession= Psession::find($id);
		$psession->team_id            =$request->team_id;
		$psession->match_id           =$request->match_id;
		$psession->time               =$request->time;
		$psession->percent            =$request->percent;
		$psession->save();
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
		$psession= Psession::find($id);
		$psession->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
