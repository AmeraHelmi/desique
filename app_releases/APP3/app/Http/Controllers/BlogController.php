<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class BlogController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

public function __construct()
{
 	$this->middleware('auth');
}

public function index(Blog $blog , Request $request)
{
	$blogs = $blog
		->select(array('id','title',
						'body','vedio_url',
						'flag','author',
						'date','likes'
				))
		->orderBy('id','desc')->get();
	$tableData = Datatables::of($blogs)
		->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"    					width="50px" height="50px">')
		->addColumn('actions', function ($data)
								{
								return view('partials.actionBtns')->with('controller','blog')->with('id', $data->id)->render();
								});

	if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		return view('blog.index')
		->with('tableData', DatatablePresenter::make($tableData, 'index'));
}

	
public function create()
{
		
}

	
public function store(Request $request)
{
	if(Input::hasFile('flag'))
	{
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);
		$blog = new Blog;
		$blog->title             =$request->title;
		$blog->flag              =$filename;
		$blog->body              =$request->body;
		$blog->vedio_url         =$request->vedio_url;
		$blog->author            =Auth::user()->name;
		$blog->date              =$request->date;
		$blog->save();
	if($request->ajax())
	{
		return response(array('msg' => 'Adding Successfull'), 200)
		->header('Content-Type', 'application/json');
	}
    }
	else
	{
		return response(false, 200)
		->header('Content-Type', 'application/json');
	}
}

	
public function show($id)
{
		
}

	
public function edit($id)
{
		$blog = Blog::find($id);
		session(['blogid'   => $blog->id]);
		session(['blogflag' => $blog->flag]);
		return response(array('msg' => 'Adding Successfull', 'data'=> $blog->toJson() ), 200)
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
 	$blog 	= Blog::find(session('blogid'));
	if(!empty($_FILES))
		{
			if(Input::hasFile('flag'))
			{
			$file = Input::file('flag');
			$filename=time();
			$file->move('images/uploads', $filename);
			$blog->title             =$request->title;
			$blog->flag              =$filename;
			$blog->body              =$request->body;
			$blog->vedio_url         =$request->vedio_url;
			$blog->date              =$request->date;
            }
        }
	else
	   {
			$blog->title             =$request->title;
			$blog->body              =$request->body;
			$blog->vedio_url         =$request->vedio_url;
			$blog->date              =$request->date;
		    $blog->flag              =session('blogflag');
	   }
	$blog->save();
	if($request->ajax())
	    {
	 			return response(array('msg' => 'Adding Successfull'), 200)
	 							->header('Content-Type', 'application/json');
	    }
}


	
public function destroy($id)
{
				$blog 	= Blog::find($id);
				$blog->delete();
				if($request->ajax())
					{
						return response(array('msg' => 'Removing Successfull'), 200)
											->header('Content-Type', 'application/json');
					}
				return redirect()->back();
}
}
