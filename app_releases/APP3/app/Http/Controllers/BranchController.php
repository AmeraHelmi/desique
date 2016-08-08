<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Player;
use App\Models\Branch;
use App\Models\Team;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;


class BranchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	 public function index(Branch $branch , Request $request)
	 {
		 $branches = $branch
			 ->join('countries as country', 'country.id', '=', 'branches.country_id')
			 ->join('cities as city','city.id','=','branches.city_id')
			 ->join('teams as team','team.id','=','branches.team_id')
			 ->select(array(
				 'branches.id as BranchID',
			     'branches.name as name',
				 'country.name as countryname',
				 'branches.flag as flag',
				 'team.name as teamname',
			     'city.name as cityname'
		 ))
		 ->orderBy('country.name')->get();

			 $tableData = Datatables::of($branches)
			 	 ->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				 ->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','branch')->with('id', $data->BranchID)->render(); })
				 ;

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				 $countries=Country::lists('name','id');
				 $cities=City ::lists('name','id');
				 $teams=Team ::lists('name','id');
		 return view('branch.index')
			 ->with('countries',$countries)
			 ->with('cities',$cities)
			 ->with('teams',$teams)
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
 		 if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);

 		$branch = new Branch;
 			$branch->name          =$request->name;
 			$branch->country_id    =$request->country_id;
			$branch->flag          =$filename;
			$branch->city_id       =$request->city_id;
			$branch->team_id       =$request->team_id;

 			$branch->save();

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
 		$branch 	= Branch::find($id);

 		session(['branchid'    => $branch->id]);
 		session(['branchcity_id'    => $branch->city_id]);
		session(['branchimage' => $branch->flag]);

 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $branch->toJson() ), 200)
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
		$branch 	= Branch::find(session('branchid'));

		if(!empty($_FILES)){
     	if(Input::hasFile('flag')){
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);

	 if($request->city_id == 0){
	  $branch->city_id       =session('branchcity_id');
       	}
       	else{
       $branch->city_id       =$request->city_id;
       	}
		$branch->name          =$request->name;
		$branch->country_id    =$request->country_id;
		$branch->flag          =$filename;
		$branch->team_id       =$request->team_id;
	}
}
   else{
   		 if($request->city_id == 0){
	  $branch->city_id       =session('branchcity_id');
       	}
       	else{
       $branch->city_id       =$request->city_id;
       	}
   		$branch->name          =$request->name;
		$branch->country_id    =$request->country_id;
		$branch->flag          =session('branchimage');
		$branch->team_id       =$request->team_id;
   }

		$branch->save();

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
 		$branch	= Branch::find($id);
 		$branch->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}


}
