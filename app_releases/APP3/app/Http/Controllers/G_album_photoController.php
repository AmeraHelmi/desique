<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\G_album_photo;
use App\Models\G_album;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class G_album_photoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
 	{
 		$this->middleware('auth');
 	}
	public function index(G_album_photo $g_photo , Request $request)
	{
		$g_album_photos = $g_photo
			->join('g_albums as g','g.id','=','g_album_photos.g_album_id')
			->select(array('g_album_photos.id as GID', 'g_album_photos.flag as flag', 'g_album_photos.alt as alt','g.title as title'))
			->orderBy('GID','desc')->get();
			$tableData = Datatables::of($g_album_photos)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				->addColumn('actions', function ($data)
					{return view('partials.actionBtns')->with('controller','g_album_photo')->with('id', $data->GID)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				$albums=G_album::lists('id','title');

		return view('g_album_photo.index')
			->with('albums',$albums)
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

			$g_album = new G_album_photo;
			  $g_album->alt    =$request->alt;
				$g_album->flag    =$filename;
			  $g_album->g_album_id    =$request->g_album_id;
			  $g_album->save();

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
	public function show()
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(G_album_photo $g_album , Request $request , $id)
	{

		$g_album       = $g_album->find($id);

		session(['albumid'   => $g_album->id]);
		session(['albumflag' => $g_album->flag]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $g_album->toJson() ), 200)
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
 $g_album 	= G_album_photo::find(session('albumid'));

	if(!empty($_FILES)){
		if(Input::hasFile('flag')){
			 $file = Input::file('flag');
			 $filename=time();
			 $file->move('images/uploads', $filename);
			 $g_album->g_album_id    =$request->g_album_id;
			 $g_album->alt    =$request->alt;
			 $g_album->flag    =$filename;
       	}
   }
	else{
		$g_album->g_album_id    =$request->g_album_id;
		$g_album->alt    =$request->alt;
		$g_album->flag    =session('albumflag');
	}
	$g_album->save();
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
		$g_album 	= G_album_photo::find($id);
		$g_album->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
