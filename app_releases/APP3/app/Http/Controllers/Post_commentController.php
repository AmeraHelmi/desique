<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Pcomment;
use App\Models\User;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class Post_commentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Pcomment $pcomment , Request $request)
	{
		$pcomments = $pcomment
			->join('users as u','u.id','=','pcomments.user_id')
			->join('posts as p','p.id','=','pcomments.post_id')
			->select(array('pcomments.id as pcomments_id',
							'p.title as Post_title',
							'u.name as user_name',
							'pcomments.comment as comment',
							'pcomments.time as time',
							'pcomments.date as date'))
			->orderBy('pcomments_id','desc')->get();

		$tableData = Datatables::of($pcomments)
			->addColumn('actions', function ($data)
			{return view('post_comments/partials.actionBtns')->with('controller','post-comments')->with('pcomments_id', $data->pcomments_id)->render(); });

		if($request->ajax())
			return DatatablePresenter::make($tableData, 'index');
			return view('post_comments.index')
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
	public function store()
	{
		//
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
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function destroy($id)
	{
		$pcomment	= Pcomment::find($id);
		$pcomment->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
			->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
