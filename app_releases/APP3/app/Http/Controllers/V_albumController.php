<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\V_album;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class V_albumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
            $this->middleware('auth');
	 }
	public function index(V_album $album , Request $request)
	{
            $v_albums = $album
			->select(array('id', 'title','meta','vedio_url'))
                        ->orderBy('title')->get();
            $tableData = Datatables::of($v_albums)
						->editColumn('vedio_url', ' <iframe width="50" height="50"
																								src="{{ $vedio_url }}" frameborder="0" allowfullscreen></iframe> ')
                        ->addColumn('actions', function ($data)


            {
                return view('partials.actionBtns')->with('controller','v_album')->with('id', $data->id)->render();

            });

            if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		return view('v_album.index')
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

            $v_album = new V_album;
            $v_album->title    =$request->title;
						$v_album->meta    =$request->meta;
            $v_album->vedio_url    =$request->vedio_url;
            $v_album->save();
            if($request->ajax())
                {
                    return response(array('msg' => 'adding Successfull'), 200)
                            ->header('Content-Type', 'application/json');
		}

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
	public function edit(Request $request , $id)
	{
            $v_album = V_album::find($id);
            if($request->ajax())
                {
                    return response(array('msg' => 'Adding Successfull', 'data'=> $v_album->toJson() ), 200)
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

		$v_album 	= V_album::find($id);
		$v_album->title 	= $request->title ;
		$v_album->meta 	= $request->meta ;
		$v_album->vedio_url 	= $request->vedio_url ;



		$v_album->save();
		return response(array('msg' => 'Adding Successfull'), 200)
							->header('Content-Type', 'application/json');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$v_album 	= V_album::find($id);
		$v_album->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
