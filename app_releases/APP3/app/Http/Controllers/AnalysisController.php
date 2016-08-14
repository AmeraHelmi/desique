<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Match;
use App\Models\Player_match;
use App\Models\Team_player;
use App\Models\Team;
use App\Models\Discussion;
use App\Models\Player;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;

class AnalysisController  extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function __construct()
 {
	 $this->middleware('auth');
 }
public function index(Discussion $Discussion , Request $request)
{
	$Discussion = $Discussion
									->join('matches as M', 'M.id', '=', 'discussions.match_id')
									->join('teams as T1', 'T1.id', '=', 'M.team1_id')
									->join('teams as T2', 'T2.id', '=', 'M.team2_id')
									->select(array(
												'discussions.analysis as analysis',
			  								'discussions.id as analysis_id',
												'discussions.Author as Author',
      									'discussions.analysis_date as analysis_date',
												'T1.name as T1name',
												'T2.name as T2name'
									))
									->orderBy('analysis_id','desc')->get();
	 $tableData = Datatables::of($Discussion)
			  					->editColumn('T1name', '{{ $T1name }} - {{ $T2name }}')
									->addColumn('actions', function ($data)
									{
										return view('partials.actionBtns')->with('controller','Analysis')->with('id', $data->analysis_id)->render();
									});

	if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		$match= new Match;
		$matches  = $match
			 		 ->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
			 		 ->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
			 		 ->select(array('team1.name as team1_name',
					 								'team2.name as team2_name',
													'matches.id as matchid'))
			 		 ->get();
		return view('analysis.index')
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
	public function store(Request $request)
	{
			$Discussion = new Discussion;
			$Discussion->match_id          = $request->match_id;
			$Discussion->analysis          = $request->analysis;
			$Discussion->Author            = Auth::user()->name;
			$Discussion->analysis_date     = $request->analysis_date;
			$Discussion->save();
			if($request->ajax())
			{
				return response(array('msg' => 'Adding Successfull'), 200)
								->header('Content-Type', 'application/json');
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
			$Discussion 	= Discussion::find($id);
			if($request->ajax())
			{
					return response(array('msg' => 'Adding Successfull', 'data'=>$Discussion->toJson() ), 200)
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
		$Discussion 	= Discussion::find($id);
		$Discussion->match_id          = $request->match_id;
		$Discussion->analysis          = $request->analysis;
		$Discussion->Author            = Auth::user()->name;
		$Discussion->analysis_date     = $request->analysis_date;
		$Discussion->save();
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
		$Discussion 	= Discussion::find($id);
		Discussion->delete();
		if($request->ajax())
		{
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
		}
		return redirect()->back();
	}
}
