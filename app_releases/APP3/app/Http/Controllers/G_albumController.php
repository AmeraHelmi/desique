<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\G_album;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class G_albumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
            $this->middleware('auth');
	 }
	public function index(G_album $album , Request $request)
	{
            $g_albums = $album
			->select(array('id', 'title','meta'))
                        ->orderBy('title')->get();
            $tableData = Datatables::of($g_albums)
                        ->addColumn('actions', function ($data)
            {
                return view('partials.actionBtns')->with('controller','g_album')->with('id', $data->id)->render();

            });

            if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		return view('g_album.index')
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

            $g_album = new G_album;
            $g_album->title    =$request->title;			  $g_album->title    =$request->title;
            $g_album->meta    =$request->meta;
            $g_album->save();
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
            $g_album = G_album::find($id);
            if($request->ajax())
                {
                    return response(array('msg' => 'Adding Successfull', 'data'=> $g_album->toJson() ), 200)
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

		$g_album 	= G_album::find($id);
		$g_album->title 	= $request->title ;
		$g_album->meta 	= $request->meta ;



		$g_album->save();
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
		$g_album 	= G_album::find($id);
		$g_album->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
