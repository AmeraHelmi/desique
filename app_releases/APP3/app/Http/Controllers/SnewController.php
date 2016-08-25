<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Snew;
use App\Models\Category;
use App\Models\Championship_sponsor;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class SnewController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
   	 public function __construct()
	 {
 		$this->middleware('auth');
 	 }

	public function index(Snew $snew , Request $request)
	{
		$snews = $snew
			->select(array('id', 'title', 'flag','date','additional_info'))
			->orderBy('id','desc')->get();

			$tableData = Datatables::of($snews)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				->addColumn('actions', function ($data)
					{return view('partials.actionBtns')->with('controller','snew')->with('id', $data->id)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
		return view('snew.index')
			->with('tableData', DatatablePresenter::make($tableData, 'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */


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

			$snew = new Snew;
			  $snew->title              =$request->title;
			  $snew->flag               =$filename;
				$snew->date              =$request->date;
				$snew->additional_info    =$request->additional_info;

			  $snew->save();

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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Snew $snew , Request $request , $id)
	{

		$snew       = Snew::find($id);

		session(['snewid'   => $snew->id]);
		session(['snewflag' => $snew->flag]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $snew->toJson() ), 200)
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
 $snew 	= Snew::find(session('snewid'));

	if(!empty($_FILES)){
		if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);
			 $snew->title              =$request->title;
			 $snew->flag               =$filename;
			 $snew->date               =$request->date;
			 $snew->additional_info    =$request->additional_info;
       	}
   }
	else{
		$snew->title              =$request->title;
		$snew->date               =$request->date;
		$snew->additional_info    =$request->additional_info;
		$snew->flag               =session('snewflag');
	}
	$snew->save();
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
		$snew 	= Snew::find($id);
		$snew->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
