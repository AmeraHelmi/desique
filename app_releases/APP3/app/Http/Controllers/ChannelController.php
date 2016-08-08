<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models\User;
use App\Models\Country;
use App\Models\Agent;
use App\Models\Channel;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Input;

class ChannelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function __construct()
	 {
		 $this->middleware('auth');
	 }
	public function index(Channel $channel , Request $request)
	{
		$channels = $channel
			->select(array('id', 'name','frequency','flag'))
			->orderBy('id','desc')->get();

			$tableData = Datatables::of($channels)
			->editColumn('flag', '<div class="image"><img src="images/uploads/{{ $flag }}"  width="50px" height="50px">')
				->addColumn('actions', function ($data)
					{return view('partials.actionBtns')->with('controller','channel')->with('id', $data->id)->render(); });

			if($request->ajax())
				return DatatablePresenter::make($tableData, 'index');
		return view('channel.index')
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

			$channel = new Channel;
			  $channel->name        =$request->name;
				$channel->frequency   =$request->frequency;
				$channel->flag        =$filename;

			  $channel->save();

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
	public function edit(Request $request , $id)
	{
		$channel 	      = Channel::find($id);

		session(['channelid'    => $channel->id]);
		session(['channelimage' => $channel->flag]);

		if($request->ajax()){
			return response(array('msg' => 'Adding Successfull', 'data'=> $channel->toJson() ), 200)
								->header('Content-Type', 'application/json');
			}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$channel 	= Channel::find(session('channelid'));

		if(!empty($_FILES)){
     	if(Input::hasFile('flag')){
		$file = Input::file('flag');
		$filename=time();
		$file->move('images/uploads', $filename);

		$channel->name 	     = $request->name ;
		$channel->frequency  =$request->frequency;
		$channel->flag       =$filename;
	}
}
else{
	$channel->name 	     = $request->name ;
	$channel->frequency  =$request->frequency;
	$channel->flag       =session('channelimage');
}

		$channel->save();
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
		$channel 	= Channel::find($id);
		$channel->delete();
		if($request->ajax()){
			return response(array('msg' => 'Removing Successfull'), 200)
								->header('Content-Type', 'application/json');
			}
		return redirect()->back();
	}

}
