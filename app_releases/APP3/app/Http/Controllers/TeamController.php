<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;use App\Models\User;use App\Models\Country;use App\Models\City;use App\Models\Team;use App\Models\Coach;use App\Models\Manager;use App\Models\Stadium;use yajra\Datatables\Datatables as Datatables;use Illuminate\Http\Request;use Illuminate\Routing\Router as Route;use App\Services\DatatablePresenter;use Auth;use Input;

class TeamController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
public function __construct(){
		$this->middleware('auth');
}

public function index(Team $team , Request $request){
		$teams = $team
									->join('countries as country', 'country.id', '=', 'teams.country_id')
									->join('stadia as stadium','stadium.id','=','teams.stadium_id')
									->select(array('teams.id as teamID',
																'teams.name as name',
																'teams.slogan as slogan',
																'teams.flag as team_image',
																'teams.flag2 as team_image2',
																'teams.is_team as is_team',
																'country.name as countryname',
																'stadium.name as stadium_name'))
									->orderBy('teams.id','desc')->get();
		$tableData = Datatables::of($teams)
								 ->editColumn('team_image', '<div class="image"><img src="images/uploads/{{ $team_image }}"  width="50px" height="50px">')
								 ->editColumn('team_image2', '<div class="image"><img src="images/uploads/{{ $team_image2 }}"  width="50px" height="50px">')
								 ->addColumn('actions', function ($data)
								 {
									 return view('partials.actionBtns')->with('controller','team')->with('id', $data->teamID)->render();
								 });
		if($request->ajax())
		return DatatablePresenter::make($tableData, 'index');
		$countries=Country::lists('name','id');
		$stadiums= Stadium:: lists('name','id');
		$coaches= Coach:: lists('name','id');
		return view('team.index')
						->with('countries',$countries)
						->with('stadiums',$stadiums)
						->with('coaches',$coaches)
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
public function store(Request $request){
		if(Input::hasFile('flag') && Input::hasFile('flag2'))
		{
		    $file = Input::file('flag');				$filename=time();				$file->move('images/uploads', $filename);				$file2 = Input::file('flag2');
				$filename2=time();
				$file2->move('images/uploads', $filename2);
				$team = new Team;
				$team->name                  =$request->name;
				$team->slogan                =$request->slogan;
				$team->flag                  =$filename;
				$team->flag2                 =$filename2;
				$team->country_id            =$request->country_id;
				$team->stadium_id            =$request->stadium_id;
				$team->history               =$request->history;
				$team->continent             =$request->continent;
				$team->is_team               =$request->is_team;
				$team->coach_id              =$request->coach_id;
				$team->start_date            =$request->start_date;
				$team->save();
				if($request->ajax())
				{
						return response(array('msg' => 'Adding Successfull'), 200)
											->header('Content-Type', 'application/json');
				}
 	} 	else	{
					return response(false, 200)										->header('Content-Type', 'application/json');
	}
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

//get all city
public function selectCity(Request $request){
		$country_id = $request->country_id;
		$city = City::where('country_id',$country_id)->get();
		foreach($city as $row)
		{
				echo'<option value='.$row->id.'> '.$row->name.' </option>';
		}
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function edit(Request $request , $id){
		$team 	= Team::find($id);
		session(['teamid'    => $team->id]);
		session(['teamimage' => $team->flag]);
		session(['teamimage2' => $team->flag2]);
		if($request->ajax())
		{
				return response(array('msg' => 'Adding Successfull', 'data'=> $team->toJson() ), 200)
									->header('Content-Type', 'application/json');
		}
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function update(Request $request){
		$team 	= Team::find(session('teamid'));
		if(!empty($_FILES))
		{
			if(Input::hasFile('flag'))
			{
				$file             =Input::file('flag');
				$filename         =time();
				$file->move('images/uploads', $filename);
				$team->name       =$request->name;
				$team->slogan     =$request->slogan;
				$team->flag       =$filename;
				$team->flag2      =session('teamimage2');
				$team->country_id =$request->country_id;
				$team->stadium_id =$request->stadium_id;
				$team->history    =$request->history;
				$team->continent  =$request->continent;
				$team->coach_id   =$request->coach_id;
				$team->start_date =$request->start_date;
				$team->is_team    =$request->is_team;
			}
			else
			{
				$file2            =Input::file('flag2');
				$filename2        =time();
				$file2->move('images/uploads', $filename2);
				$team->name       =$request->name;
				$team->slogan     =$request->slogan;
				$team->flag       =session('teamimage');
				$team->flag2      =$filename2;
				$team->country_id =$request->country_id;
				$team->stadium_id =$request->stadium_id;
				$team->history    =$request->history;
				$team->continent  =$request->continent;
				$team->coach_id   =$request->coach_id;
				$team->start_date =$request->start_date;
				$team->is_team    =$request->is_team;
       	}
   }	 else
	 {
				$team->name          =$request->name;
				$team->slogan        =$request->slogan;
				$team->country_id    =$request->country_id;
				$team->stadium_id    =$request->stadium_id;
				$team->history       =$request->history;
				$team->continent     =$request->continent;
				$team->coach_id      =$request->coach_id;
				$team->start_date    =$request->start_date;
				$team->is_team       =$request->is_team;
				$team->flag          =session('teamimage');
				$team->flag2         =session('teamimage2');
	 }	 $team->save();	 if($request->ajax())
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
		$team	= Team::find($id);
		$team->delete();
		if($request->ajax())
		{
				return response(array('msg' => 'Removing Successfull'), 200)
									->header('Content-Type', 'application/json');
		}
		return redirect()->back();
 }}
