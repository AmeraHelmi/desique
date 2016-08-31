<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Input;
use Auth;
use App\Models\Expection;
use App\Models\Championship;

class ExpectionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Expection $expection , Request $request)
	{
		$expections = $expection
			->select(array('expections.id as EID',
			 							'expections.question_text as question_text',
										'expections.date as date'))
			->orderBy('expections.id')->get();

		$tableData = Datatables::of($expections)
			->addColumn('actions', function ($data)
			{return view('partials.actionBtns')->with('controller','expection')->with('id', $data->EID)->render(); })
				 ;

		if($request->ajax())
			return DatatablePresenter::make($tableData, 'index');
			$championships=Championship::lists('name','id');
		 	return view('expection.index')
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

 		$expection                   = new Expection;
		$expection->question_text    =$request->question_text;
		$expection->ans1             =$request->ans1;
		$expection->ans2             =$request->ans2;
		$expection->ans3             =$request->ans3;
		$expection->ans4             =$request->ans4;
		$expection->date             =date("Y/m/d");
 		$expection->save();
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
 		$expection= Expection::find($id);
 		if($request->ajax()){
 			return response(array('msg' => 'Adding Successfull', 'data'=> $expection->toJson() ), 200)
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
	   	$expection= Expection::find($id);
			$expection->question_text    =$request->question_text;
			$expection->ans1             =$request->ans1;
			$expection->ans2             =$request->ans2;
			$expection->ans3             =$request->ans3;
			$expection->ans4             =$request->ans4;

			$expection->save();
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
 		$expection= Expection::find($id);
 		$expection->delete();
 		if($request->ajax()){
 			return response(array('msg' => 'Removing Successfull'), 200)
 			->header('Content-Type', 'application/json');
 			}
 		return redirect()->back();
 	}

}
