<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\V_album;
use App\Models\Country;
use App\Models\Team;
use App\Models\Nation;
use App\Models\Championship;
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
												->join('countries as c ','c.id','=','v_albums.country_id')
												->join('teams as t ','t.id','=','v_albums.team_id')
												->join('championships as p ','p.id','=','v_albums.championship_id')
												->join('nations as n ','n.id','=','v_albums.nation_id')
												->select(array('v_albums.id as VID',
												 							'v_albums.title as title',
																			'v_albums.meta as meta',
																			'v_albums.vedio_url as vedio_url',
																			'v_albums.continent as continent',
																			'c.name as cname',
																			't.name as tname',
																			'n.nickname as nname',
																			'p.name as pname'))
                        ->orderBy('title')->get();
            $tableData = Datatables::of($v_albums)
						->editColumn('vedio_url', ' <iframe width="50" height="50"
																								src="{{ $vedio_url }}" frameborder="0" allowfullscreen></iframe> ')
                        ->addColumn('actions', function ($data)


            {
                return view('partials.actionBtns')->with('controller','v_album')->with('id', $data->VID)->render();

            });

            if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		$championships=Championship::lists('id','name');
		$nations=Nation::lists('id','nickname');
		$teams=Team::lists('id','name');
		$countries=Country::lists('id','name');
		return view('v_album.index')
			->with('countries',$countries)
			->with('teams',$teams)
			->with('nations',$nations)
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
						$v_album->team_id    =$request->team_id;
						$v_album->nation_id    =$request->nation_id;
						$v_album->championship_id    =$request->championship_id;
						$v_album->continent    =$request->continent;
            $v_album->country_id    =$request->country_id;
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
		$v_album->team_id    =$request->team_id;
		$v_album->nation_id    =$request->nation_id;
		$v_album->championship_id    =$request->championship_id;
		$v_album->continent    =$request->continent;
		$v_album->country_id    =$request->country_id;


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
