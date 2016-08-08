<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Country;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class CountryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 	{
 		$this->middleware('auth');
 	}
	public function index(Country $country , Request $request)
	{
		$countries = $country
			->select(array('id', 'name', 'flag'))
			->orderBy('id','desc')->get();

			$tableData = Datatables::of($countries)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				->addColumn('actions', function ($data)
					{return view('partials.actionBtns')->with('controller','country')->with('id', $data->id)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
		return view('country.index')
			->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
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

			$country = new Country;
			if($request->name)
			{
			  $country->name    =$request->name;
			  $country->flag    =$filename;
			  $country->save();

				if($request->ajax()){
					return response(array('msg' => 'Adding Successfull'), 200)
										->header('Content-Type', 'application/json');
					}
				}
    }
		else{
			return response(false, 200)
								->header('Content-Type', 'application/json');
		}

	}

	public function checkname(Country $country,Request $request, $country_name = null)
	{

		if($country_name == $request->name)
			return;

			$countryname = $country
			->where('name',$request->name)
			->lists('name', 'id');
		if($countryname)
			return response(null, 406);
		return;
	}

	public function checkcountrypic(Country $country,Request $request, $country_pic = null)
	{

		if($country_pic == $request->flag)
			return;

			$countrypic = $country
			->where('flag',$request->flag)
			->lists('name', 'id');
		if($countrypic)
			return response(null, 406);
		return;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Country $country , Request $request , $id)
	{

		$country       = $country->find($id);

		session(['countryid'   => $country->id]);
		session(['countryflag' => $country->flag]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $country->toJson() ), 200)
								->header('Content-Type', 'application/json');

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
 $country 	= Country::find(session('countryid'));

	if(!empty($_FILES)){
		if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);
			 $country->name    =$request->name;
			 $country->flag    =$filename;
       	}
   }
	else{
			$country->name    =$request->name;
			$country->flag    =session('countryflag');
	}
	$country->save();
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
		$country 	= Country::find($id);
		$country->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
