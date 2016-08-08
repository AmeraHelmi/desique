<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Player;
use App\Models\Commentor;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;


class CommentorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	 public function index(Commentor $commentor , Request $request)
	 {
		 $commentors = $commentor
			 ->join('countries as country', 'country.id', '=', 'commentors.country_id')
			 ->join('cities as city','city.id','=','commentors.city_id')
			 ->select(array(
				 'commentors.id as commentorID',
			   'commentors.name as name',
				 'country.name as countryname',
				 'commentors.count as count',
				 'commentors.flag as flag',
				 'commentors.nationality as nationality',

			   'city.name as cityname'
		 ))
		 ->orderBy('country.name')->get();

			 $tableData = Datatables::of($commentors)
			 ->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				 ->addColumn('actions', function ($data)
					 {return view('partials.actionBtns')->with('controller','commentor')->with('id', $data->commentorID)->render(); })
				 ;

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				 $countries=Country::lists('name','id');
				 $cities=City ::lists('name','id');
		 return view('commentor.index')
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
		if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);

 		$commentor = new Commentor;
 			$commentor->name          =$request->name;
 			$commentor->country_id    =$request->country_id;
			$commentor->count         =$request->count;
			$commentor->city_id       =$request->city_id;
			$commentor->nationality       =$request->nationality;
			$commentor->flag          =$filename;


 			$commentor->save();

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
 		$commentor 	= Commentor::find($id);

		session(['commentorid'    => $commentor->id]);
		session(['commentorcity_id'    => $commentor->city_id]);
		session(['commentorimage' => $commentor->flag]);

 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $commentor->toJson() ), 200)
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
		$commentor 	= Commentor::find(session('commentorid'));
		if(!empty($_FILES)){
			if(Input::hasFile('flag')){
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);

	 if($request->city_id == 0){
	  $commentor->city_id       =session('commentorcity_id');
       	}
       	else{
       $commentor->city_id       =$request->city_id;
       	}

		$commentor->name           =$request->name;
		$commentor->country_id     =$request->country_id;
		$commentor->count          =$request->count;
		$commentor->nationality          =$request->nationality;
		$commentor->flag           =$filename;
	}
}
  else{
  		 if($request->city_id == 0){
	  $commentor->city_id       =session('commentorcity_id');
       	}
       	else{
       $commentor->city_id       =$request->city_id;
       	}
		$commentor->name           =$request->name;
		$commentor->country_id     =$request->country_id;
		$commentor->nationality     =$request->nationality;
		$commentor->count          =$request->count;
		$commentor->flag           =session('commentorimage');
	}

		$commentor->save();

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
 		$commentor	= Commentor::find($id);
 		$commentor->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}


}
