<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Advert;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class AdvertController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 	{
 		$this->middleware('auth');
 	}
	public function index(Advert $advert , Request $request)
	{
		$adverts = $advert
			->select(array('id', 'name', 'flag'))
			->orderBy('id','desc')->get();

			$tableData = Datatables::of($adverts)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				->addColumn('actions', function ($data)
					{return view('partials.actionBtns')->with('controller','advert')->with('id', $data->id)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
		return view('advert.index')
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

			$advert = new Advert;
			if($request->name)
			{
			  $advert->name    =$request->name;
			  $advert->flag    =$filename;
			  $advert->save();

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
	public function edit(Advert $advert , Request $request , $id)
	{

		$advert       = $advert->find($id);

		session(['advertid'   => $advert->id]);
		session(['advertflag' => $advert->flag]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $advert->toJson() ), 200)
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
 $advert 	= Advert::find(session('advertid'));

	if(!empty($_FILES)){
		if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);
			 $advert->name    =$request->name;
			 $advert->flag    =$filename;
       	}
   }
	else{
			$advert->name    =$request->name;
			$advert->flag    =session('countryflag');
	}
	$advert->save();
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
		$advert 	= Advert::find($id);
		$advert->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
