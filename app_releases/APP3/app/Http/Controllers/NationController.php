<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Player;
use App\Models\Stadium;
use App\Models\Manager;
use App\Models\Nation;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class NationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 {
	 $this->middleware('auth');
 }
	 public function index(Nation $nation , Request $request)
	 {
		 $nations = $nation
			 ->join('countries as country', 'country.id', '=', 'nations.country_id')

			 ->select(array(
				 'nations.id as nationID',
			   'nations.nickname as nickname',
				 'country.name as countryname',
				 'nations.continent as continent',
				 'nations.slogan as slogan',
				 'nations.flag as logo',

		 ))
		 ->orderBy('country.name')->get();

			 $tableData = Datatables::of($nations)
			 ->editColumn('logo', '<div class="image"><img src="images/uploads/{{ $logo }}"  width="50px" height="50px">')
				 ->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','nation')->with('id', $data->nationID)->render(); })
				 ;

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				 $countries=Country::lists('name','id');
				 $stadiums=Stadium::lists('name','id');

		 return view('nation.index')
		   ->with('countries',$countries)
			 ->with('stadiums',$stadiums)
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

 		$nation = new Nation;
 			$nation->nickname     =$request->nickname;
 			$nation->country_id   =$request->country_id;
			$nation->continent    ="اوربا";
			$nation->slogan       =$request->slogan;
			$nation->stadium_id   =$request->stadium_id;
			$nation->start_date   =$request->start_date;
			$nation->flag         =$filename;


			$nation->save();

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
 		$nation 	= Nation::find($id);

		session(['nationid'    => $nation->id]);
		session(['nationimage' => $nation->flag]);

 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $nation->toJson() ), 200)
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
		$nation 	= Nation::find(session('nationid'));

		if(!empty($_FILES)){
     	if(Input::hasFile('flag')){
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);

		$nation->nickname     =$request->nickname;
		$nation->country_id   =$request->country_id;
		$nation->slogan       =$request->slogan;
		$nation->stadium_id   =$request->stadium_id;
		$nation->start_date   =$request->start_date;
		$nation->flag         =$filename;

	}
}
else{
	$nation->nickname     =$request->nickname;
	$nation->country_id   =$request->country_id;
	$nation->slogan       =$request->slogan;
	$nation->stadium_id   =$request->stadium_id;
	$nation->start_date   =$request->start_date;
		$nation->flag         =session('nationimage');
}


		$nation->save();

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
 	$nation	= Nation::find($id);
 		$nation->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}


}
