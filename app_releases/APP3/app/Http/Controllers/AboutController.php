<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\About;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class AboutController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function __construct()
{
		$this->middleware('auth');
}

public function index(About $about , Request $request)
{
		$abouts = $about
								->select(array('id',
								 							'mission',
															'vision'))
								->orderBy('id','desc')->get();

		$tableData = Datatables::of($abouts)
								->addColumn('actions', function ($data)
								{
									return view('about/partials.actionBtns')
									->with('controller','about')
									->with('id', $data->id)
									->render();
								});
		if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
	  return view('about.index')
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
				$about=About::find(1);
				if(!$about){
			  $about = new About;
			  $about->mission                =$request->mission;
				$about->vision               =$request->vision;
				$about->address    =$request->address;
				$about->tel    =$request->tel;
				$about->email    =$request->email;
				$about->save();



				if($request->ajax()){
					return response(array('msg' => 'Adding Successfull'), 200)
										->header('Content-Type', 'application/json');
					}
				else{
					return response(false, 200)
										->header('Content-Type', 'application/json');
				}

}
else {
	if($request->ajax()){
		return response(array('msg' => 'Adding Successfull'), 200)
							->header('Content-Type', 'application/json');
		}
	else{
		return response(false, 200)
							->header('Content-Type', 'application/json');
	}
}

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(About $about , Request $request , $id)
	{

		$about       = About::find($id);

		session(['aboutid'   => $about->id]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $about->toJson() ), 200)
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
 $about 	= About::find(session('aboutid'));

 $about->mission                =$request->mission;
 $about->vision               =$request->vision;
 $about->address    =$request->address;
 $about->tel    =$request->tel;
 $about->email    =$request->email;
 $about->save();

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
		$about	= About::find($id);
		$about->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
