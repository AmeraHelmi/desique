<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
        $this->middleware('auth');
	 }
	 public function index(Category $cat , Request $request)
	 {
        $categories = $cat
												->select(array('id', 'name'))
                        ->orderBy('name')->get();
        $tableData = Datatables::of($categories)
                        ->addColumn('actions', function ($data)
            						{
                					return view('partials.actionBtns')->with('controller','Category')->with('id', $data->id)->render();
												});

        if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
				return view('category.index')
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
			$cat = new Category;
      $cat->name    =$request->name;
      $cat->save();
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
    	$cat = Category::find($id);
			session(['catid'    => $cat->id]);
			if($request->ajax())
      {
        return response(array('msg' => 'Adding Successfull', 'data'=> $cat->toJson() ), 200)
                            ->header('Content-Type', 'application/json');
		  }
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request )
	{

		$cat 	= Category::find(session('catid'));
		$cat->name 	= $request->name ;
		$cat->save();
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
		$cat 	= Category::find($id);
		$cat->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
