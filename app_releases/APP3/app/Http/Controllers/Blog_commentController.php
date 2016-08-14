<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Bcomment;
use App\Models\User;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class Blog_commentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
 			$this->middleware('auth');
 	 }
	 public function index(Bcomment $bcomment , Request $request)
	 {
			$bcomments = $bcomment
		    							->join('users as u','u.id','=','bcomments.user_id')
		    							->join('blogs as b','b.id','=','bcomments.blog_id')
											->select(array ('bcomments.id as Bcomments_id',
			 																'b.title as Blog_title',
			 																'u.name as user_name',
			 																'bcomments.comment as comment',
			 																'bcomments.time as time',
			 																'bcomments.date as date'))
											->orderBy('Bcomments_id','desc')->get();

			$tableData = Datatables::of($bcomments)
											->addColumn('actions', function ($data)
											{
												return view('blog_comments/partials.actionBtns')->with('controller','blog-comments')->with('Bcomments_id', $data->Bcomments_id)->render();
											});

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				return view('blog_comments.index')
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
 			$bcomment	= Bcomment::find($id);
 			$bcomment->delete();
 			if($request->ajax())
			{
 					return response(array('msg' => 'Removing Successfull'), 200)
 								->header('Content-Type', 'application/json');
 			}
 			return redirect()->back();
 	}
}
