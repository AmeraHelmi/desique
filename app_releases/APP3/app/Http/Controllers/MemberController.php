<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Models\Member;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class MemberController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function __construct()
{
		$this->middleware('auth');
}

public function index(Member $member , Request $request)
{
		$members = $member
								->select(array('id', 'name','job','email','flag'))
								->orderBy('id','desc')->get();

		$tableData = Datatables::of($members)
		->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
		->addColumn('actions', function ($data)
				{
					return view('partials.actionBtns')->with('controller','member')->with('id', $data->id)->render();
				});
		if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
	  return view('member.index')
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

	if(Input::hasFile('flag'))
	{
		 $file = Input::file('flag');
		 $filename=time();
		 $file->move('images/uploads', $filename);
  		$member = new Member;
			 if($request->name)
		 {

			  $member->name                =$request->name;
				$member->email               =$request->email;
				$member->job                 =$request->job;
				$member->facebook            =$request->facebook;
				$member->job                 =$request->job;
				$member->flag                 =$filename;
				$member->save();
				if($request->ajax())
				{
					return response(array('msg' => 'Adding Successfull'), 200)
									->header('Content-Type', 'application/json');
				}
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
	public function edit(Member $member , Request $request , $id)
	{

		$member       = Member::find($id);

		session(['memberid'   => $member->id]);

			return response(array('msg' => 'Adding Successfull', 'data'=> $member->toJson() ), 200)
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
		$member 	= Member::find(session('memberid'));
		if(!empty($_FILES))
		{
			if(Input::hasFile('flag'))
			{
				$file = Input::file('flag');
				$filename=time();
				$file->move('images/uploads', $filename);
				$member->name    =$request->name;
				$member->email    =$request->email;
				$member->flag    =$filename;
				$member->job    =$request->job;
				$member->facebook    =$request->facebook;
			}
		}
		else
		{
			$member->name    =$request->name;
			$member->email    =$request->email;
			$member->job    =$request->job;
			$member->facebook    =$request->facebook;
		}
		$member->save();
		if($request->ajax())
		{
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
		$member 	=Member::find($id);
		$member->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
