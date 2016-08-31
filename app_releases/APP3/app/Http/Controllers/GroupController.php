<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Input;
use Auth;
use App\Models\Group;
use App\Models\Championship;

class GroupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Group $group , Request $request)
	{
		$groups = $group
			->join('championships as championship', 'championship.id', '=', 'groups.championship_id')
			->select(array('groups.id as groupID', 'groups.name as group_name','championship.name as championship_name','groups.addition_info as addition_info','groups.no_matches as no_matches'))
			->orderBy('championship.name')->get();

		$tableData = Datatables::of($groups)
			->addColumn('actions', function ($data)
			{return view('partials.actionBtns')->with('controller','group')->with('id', $data->groupID)->render(); })
				 ;

		if($request->ajax())
			return DatatablePresenter::make($tableData, 'index');
			$championships=Championship::lists('name','id');
		 	return view('group.index')
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

 		$group = new Group;
		$group->championship_id    =$request->championship_id;
		$group->name               =$request->name;
		$group->addition_info      =$request->addition_info;
		$group->no_matches         =$request->no_matches;
 		$group->save();
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
 		$group= Group::find($id);
 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $group->toJson() ), 200)
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
	   	$group= Group::find($id);
		$group->championship_id    =$request->championship_id;
		$group->name               =$request->name;
		$group->addition_info      =$request->addition_info;
		$group->no_matches         =$request->no_matches;
	 	$group->save();
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
 		$group= Group::find($id);
 		$group->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 			->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}

}
