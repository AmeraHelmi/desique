<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Player;
use App\Models\Branch;
use App\Models\Championship;
use App\Models\Championship_sponsor;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class ChampionshipController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
 			$this->middleware('auth');
 	}

	public function index(Championship $championship , Request $request)
	{
		 	$championships = $championship
			 												->join('countries as country', 'country.id', '=', 'championships.country_id')
															->select(array(
				 																'championships.id as championshipID',
			   																'championships.name as name',
				 																'country.name as countryname',
				 																'championships.no_matches as no_matches',
				 																'championships.addition_info as addition_info',
				 																'championships.type as type'
				 		 														))
		 													->orderBy('country.name')->get();

			 $tableData = Datatables::of($championships)
				 											->addColumn('actions', function ($data)
					 										{
																return view('partials.actionBtns')->with('controller','championship')->with('id', $data->championshipID)->render();
															});

			 if($request->ajax())
				 return DatatablePresenter::make($tableData, 'index');
				 $countries=Country::lists('name','id');
				 return view('championship.index')
			 					->with('countries',$countries)
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
 			$championship = new Championship;
 			$championship->name          =$request->name;
 			$championship->country_id    =$request->country_id;
			$championship->no_matches    =$request->no_matches;
			$championship->type          =$request->type;
			$championship->addition_info =$request->addition_info;
 			$championship->save();
			if($request->ajax())
			{
				return response(array('msg' => 'Adding Successfull'), 200)
									->header('Content-Type', 'application/json');
			}
			else
			{
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit(Request $request , $id)
 	{
 				$championship 	= Championship::find($id);
				session(['championid' => $championship->id]);
 				if($request->ajax())
				{
 						return response(array('msg' => 'Adding Successfull', 'data'=> $championship->toJson() ), 200)
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
		$championship 	= Championship::find(session('championid'));
		$championship->name          =$request->name;
		$championship->country_id    =$request->country_id;
		$championship->no_matches    =$request->no_matches;
		$championship->type          =$request->type;
		$championship->addition_info =$request->addition_info;
		$championship->save();
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
 			$championship	= Championship::find($id);
 			$championship->delete();
 			if($request->ajax())
			{
 					return response(array('msg' => 'Removing Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}
}
