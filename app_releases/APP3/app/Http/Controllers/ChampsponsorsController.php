<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Championship_sponsor;
use App\Models\Sponsor;
use App\Models\Championship;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;

class ChampsponsorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		 $this->middleware('auth');
	 }
	public function index(Championship_sponsor $championship_sponsor , Request $request)
	{
			$champs = $championship_sponsor
		  							->join('sponsors as s', 's.id', '=', 'championship_sponsors.sponsor_id')
		  							->join('championships as c', 'c.id', '=', 'championship_sponsors.championship_id')
		  							->select(array('s.name as sponsorname',
										 							'c.name as champname',
																	'championship_sponsors.id as ID'))
		  							->orderBy('ID','desc')->get();

			$tableData = Datatables::of($champs)
										->addColumn('actions', function ($data)
										{
											return view('partials.actionBtns')->with('controller','champsponsors')->with('id', $data->ID)->render();
										});
			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
        $sponsors      = Sponsor::lists('name','id');
        $championships = Championship::lists('name','id');
				return view('champion_sponsers.index')
		    			->with('sponsors',$sponsors)
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
		$count = count($request->sponsor_id);


				for($i = 0 ; $i < $count ; $i++){
					$championship_sponsor = new Championship_sponsor;
					$championship_sponsor->sponsor_id          =$request->sponsor_id[$i];
					$championship_sponsor->championship_id     =$request->championship_id;
					$championship_sponsor->save();
				}

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
		$championship_sponsor 	= Championship_sponsor::find($id);
		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=> $championship_sponsor->toJson() ), 200)
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
		$count = count($request->sponsor_id);
				for($i = 0 ; $i < $count ; $i++){
					$championship_sponsor 	= Championship_sponsor::find($id);
					$championship_sponsor->sponsor_id          =$request->sponsor_id[$i];
					$championship_sponsor->championship_id     =$request->championship_id;
					$championship_sponsor->save();
				}
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
		$championship_sponsor 	= Championship_sponsor::find($id);
		$championship_sponsor->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
