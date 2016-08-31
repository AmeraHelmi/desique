<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ball;
use App\Models\Group;
use App\Models\Team;
use App\Models\Managment_championship;
use App\Models\Coach;
use App\Models\Manager;
use App\Models\Match;
use App\Models\Championship;
use App\Models\Team_history_coach;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;


class Managment_championshipController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	 public function index(Managment_championship $m_champion , Request $request)
	 {
		 $managment_championships = $m_champion
			 ->join('managers as manager','manager.id','=','managment_championships.manager_id')
			 ->join('teams as team','team.id','=','managment_championships.team_id')

			 ->select(array(
				 'managment_championships.id as tmanagerID',
				 'team.name as team_name',
				 'manager.name as manager_name',
				 'managment_championships.from_date as from_date',
				 'managment_championships.to_date as to_date',
				 'managment_championships.contract as contract',
				 'managment_championships.addition_info as addition_info'
			 ))

			 ->orderBy('tmanagerID','desc')->get();

			 $tableData = Datatables::of($managment_championships)

				 ->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','managment_championship')->with('id', $data->tmanagerID)->render(); })
				 ;

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				//  $championships=Championship::lists('name','id');

				$managers= Manager::lists('name','id');
				$teams=Team::where('is_team','like','نادى%')->lists('name','id');

		 return view('managment_championship.index')
		   ->with('managers',$managers)
			 ->with('teams',$teams)
			 ->with('tableData', DatatablePresenter::make($tableData, 'index'));
	 }

			/**
			 * Display a listing of the resource.
			 *
			 * @return Response
			 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Managment_championship $m_champion , Request $request)
	{
		$managment_championships = $m_champion
			->join('managers as manager','manager.id','=','managment_championships.manager_id')
			->join('championships as championship','championship.id','=','managment_championships.championship_id')

			->select(array(
				'managment_championships.id as m_championID',
			   	'manager.name as manager_name',
				'championship.name as championship_name',
				'managment_championships.win_date as win_date'
			 	))

			->orderBy('managment_championships.id','desc')->get();

		$tableData = Datatables::of($managment_championships)

			->addColumn('actions', function ($data)
				{
				return view('partials.actionBtns')->with('controller','managment_championship')->with('id', $data->m_championID)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				//  $championships=Championship::lists('name','id');

				$managers= Manager::lists('name','id');
			   	$championships =Championship::lists('name','id');
			 	return view('managment_championship.index')
			   	->with('managers',$managers)
				->with('championships',$championships)

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
		$m_champion = new Managment_championship;
		$m_champion->manager_id       =$request->manager_id;
		$m_champion->team_id         =$request->team_id;
		$m_champion->from_date        =$request->from_date;
		$m_champion->to_date          =$request->to_date;
		$m_champion->contract         =$request->contract;
		$m_champion->addition_info    =$request->addition_info;
		
		$m_champion->save();


			if($request->ajax()){
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
 		$m_champion = Managment_championship::find($id);
 		if($request->ajax()){
 		return response(array('msg' => 'Adding Successfull', 'data'=> $m_champion->toJson() ), 200)
 		->header('Content-Type', 'application/json');
 			}
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function update(Request $request,$id)
	{
		$m_champion 	= Managment_championship::find($id);
		$m_champion->manager_id       =$request->manager_id;
		$m_champion->team_id         =$request->team_id;
		$m_champion->from_date        =$request->from_date;
		$m_champion->to_date          =$request->to_date;
		$m_champion->contract         =$request->contract;
		$m_champion->addition_info    =$request->addition_info;
		$m_champion->save();

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
 		$m_champion	= Managment_championship::find($id);
 		$m_champion->delete();
 		if($request->ajax()){
 		return response(array('msg' => 'Removing Successfull'), 200)
 		->header('Content-Type', 'application/json');
 							}
 		return redirect()->back();
 	}


}
