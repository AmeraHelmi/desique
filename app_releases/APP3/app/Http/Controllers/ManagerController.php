<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Manager;
use App\Models\City;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;


class ManagerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Manager $manager , Request $request)
	{
		$managers = $manager
			->join('countries as country', 'country.id', '=', 'managers.country_id')
			->join('cities as city','city.id','=','managers.city_id')
			->select(array(
				'managers.id as managment_teamID',
			    'managers.name as name',
				'country.name as countryname',
				'managers.role as role',
				'managers.job as job',
				'managers.salary as salary',
			    'managers.selection_type as selection_type',
				'managers.addition_info as addition_info',
				'managers.flag as flag',
			    'managers.from_date as from_date',
			    'managers.to_date as to_date',
			    'city.name as cityname'))
		 	->orderBy('country.name')->get();

		$tableData = Datatables::of($managers)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
			->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','manager')->with('id', $data->managment_teamID)->render(); });

		if($request->ajax())
			return DatatablePresenter::make($tableData, 'index');
			$countries=Country::lists('name','id');
			$cities=City ::lists('name','id');

		 	return view('manager.index')
			->with('countries',$countries)->with('cities',$cities)
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
		if(Input::hasFile('flag'))
		{
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);

 		$manager = new Manager;
 		$manager->name          	=$request->name;
 		$manager->country_id    	=$request->country_id;
		$manager->role          	=$request->role;
		$manager->job           	=$request->job;
		$manager->addition_info 	=$request->addition_info;
		$manager->from_date     	=$request->from_date;
		$manager->to_date       	=$request->to_date;
		$manager->salary        	=$request->salary;
		$manager->selection_type	=$request->type;
		$manager->flag          	=$filename;
		$manager->city_id       	=$request->city_id;
 		$manager->save();

		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull'), 200)
									->header('Content-Type', 'application/json');
							}
		}
	else{
		return response(false, 200)
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

//get all city
	public function selectCity(Request $request)
	{
		$country_id = $request->country_id;
		echo $country_id;
		$city = City::where('country_id',$country_id)->get();
		foreach($city as $row){
		echo'<option value='.$row->id.'> '.$row->name.' </option>';
				}


	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request , $id)
 	{
 		$manager 	= Manager::find($id);
		session(['managerid'     => $manager->id]);
		session(['managerimage'  => $manager->flag]);
 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $manager->toJson() ), 200)
 			->header('Content-Type', 'application/json');
 			}
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$manager 	= Manager::find(session('managerid'));
		if(!empty($_FILES)){
		if(Input::hasFile('flag'))
		{
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);
		$manager->name          	=$request->name;
		$manager->country_id    	=$request->country_id;
		$manager->role          	=$request->role;
		$manager->job           	=$request->job;
		$manager->addition_info 	=$request->addition_info;
		$manager->from_date     	=$request->from_date;
		$manager->to_date       	=$request->to_date;
		$manager->salary        	=$request->salary;
		$manager->selection_type	=$request->selection_type;
		$manager->flag          	=$filename;
		}
							}		
 		else{
	 	$manager->name          	=$request->name;
	 	$manager->country_id    	=$request->country_id;
	 	$manager->role          	=$request->role;
	 	$manager->job           	=$request->job;
	 	$manager->addition_info 	=$request->addition_info;
		$manager->from_date     	=$request->from_date;
		$manager->to_date       	=$request->to_date;
	 	$manager->salary        	=$request->salary;
	 	$manager->selection_type	=$request->selection_type;
	 	$manager->comment       	=$request->comment;
	 	$manager->flag          	=session('managerimage');
 			}
		$manager->save();

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
 		$manager= Manager::find($id);
 		$manager->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 			->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}


}
