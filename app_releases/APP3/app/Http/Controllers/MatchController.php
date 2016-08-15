<?php namespace App\Http\Controllers;



use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\User;

use App\Models\Ball;

use App\Models\Group;

use App\Models\Team;

use App\Models\Stadium;

use App\Models\Match_referee;

use App\Models\Referee;

use App\Models\Manager;

use App\Models\Match;

use App\Models\Channel;

use App\Models\Championship;

use yajra\Datatables\Datatables as Datatables;

use Illuminate\Http\Request;

use Illuminate\Routing\Router as Route;

use App\Services\DatatablePresenter;

use Auth;

use Input;





class MatchController extends Controller {



	/**

	 * Display a listing of the resource.

	 *

	 * @return Response

	 */

	 public function __construct()

 {

	 $this->middleware('auth');

 }

	 public function index(Match $match , Request $request)

	 {

		 $matches = $match

			 ->join('teams as team1','team1.id','=','matches.team1_id')

			 ->join('teams as team2','team2.id','=','matches.team2_id')

			 ->join('groups as group','group.id','=','matches.group_id')

			 ->join('channels as channel','channel.id','=','matches.channel_id')

			 ->select(array(

				 'matches.id as matchID',

			   'team1.name as team1_name',

				 'team2.name as team2_name',

				 'matches.match_date as match_date',

				 'matches.team1_goals as team1_goals',

				 'matches.team2_goals as team2_goals',

				 'group.id as group_id',

				 'group.name as group_name',

				 'channel.frequency as frequency'

			 ))



			 ->orderBy('matches.id','desc')->get();



			 $tableData = Datatables::of($matches)



				 ->addColumn('actions', function ($data)

					 {return view('partials.actionBtns')->with('controller','match')->with('id', $data->matchID)->render(); })

				 ;



			 if($request->ajax())

				 return DatatablePresenter::make($tableData, 'index');

				//  $championships=Championship::lists('name','id');

				 $groups=Group ::lists('name','id');

				 $teams= Team::lists('name','id');

				 $referees =Referee::lists('name','id');

			   $stadiums =Stadium::lists('name','id');

			   $channels=Channel::lists('name','id');

				 $championships = Championship::lists('name','id');

		 return view('match.index')

		   ->with('championships',$championships)

			 ->with('referees',$referees)

			 ->with('groups',$groups)

			 ->with('teams',$teams)

			 ->with('stadiums',$stadiums)

			 ->with('channels',$channels)

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

	 public function store(Request $request)

 	{

		$match = new Match;

		$match->team1_id          =$request->team1_id;
		$match->team2_id          =$request->team2_id;
		$match->match_date        =$request->match_date;
		$match->date               =date('Y-m-d',strtotime($request->match_date));
		// $match->match_period      =$request->match_period;
		$match->group_id          =$request->group_id;
		$match->champion_id       =$request->champion_id;
		$match->stadium_id       =$request->stadium_id;
		$match->channel_id       =$request->channel_id;
		$match->addition_info    =$request->addition_info;
    $match->role    =$request->role;

		$match->save();



		$count = count($request->referees);
		for($i = 0 ; $i < $count ; $i++){

 		  $match_referee = new Match_referee;
			$match_referee->match_id          =$match->id;
			$match_referee->referee_id        =$request->referees[$i];
 			$match_referee->save();

   }

			if($request->ajax()){

				return response(array('msg' => 'Adding Successfull'), 200)

									->header('Content-Type', 'application/json');

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

	public function selectCity(Request $request)

	{

		$country_id = $request->country_id;

		$city = City::where('country_id',$country_id)->get();



		foreach($city as $row){

			echo'<option value='.$row->id.'> '.$row->name.' </option>';

		}





	}

	/**

	 * Show the form for editing the specified resource.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	 public function edit(Request $request , $id)

 	{

 		$match 	= Match::find($id);

 		if($request->ajax()){

 			return response(array('msg' => 'Adding Successfull', 'data'=> $match->toJson() ), 200)

 								->header('Content-Type', 'application/json');

 			}

 	}



	/**

	 * Update the specified resource in storage.

	 *

	 * @param  int  $id

	 * @return Response

	 */

	 public function update(Request $request, $id)

	{

		$match 	= Match::find($id);

		$match->team1_id          =$request->team1_id;

		$match->team2_id          =$request->team2_id;

		$match->match_date        =$request->match_date;

		$match->date               =date('Y-m-d',strtotime($request->match_date));

		$match->match_period      =$request->match_period;

		$match->group_id          =$request->group_id;

		$match->champion_id       =$request->champion_id;

		$match->stadium_id       =$request->stadium_id;

		$match->addition_info    =$request->addition_info;

		$match->channel_id       =$request->channel_id;

        $match->role    =$request->role;

		$match->save();



		// $match_referee =  new Match_referee;

		// $mreferee=Match_referee::where('match_id',6)->get();

  //       $count = count($request->referees);



  //  if(count($mreferee) > 0){

		// for($i = 0 ; $i < $count ; $i++){

 	// 	  	$mreferee->match_id    =$id;

		// 	$mreferee->referee_id  =$request->referees[$i];

		// 	$mreferee->save();

 	// 	  }

 	// 	}

  //  else{

	 // for($i = 0 ; $i < $count ; $i++){

		// $m_referee =  new Match_referee;

		// $m_referee->match_id    =$id;

		// $m_referee->referee_id  =$request->referees[$i];

		// $m_referee->save();

		//             }

 	// 	  }



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

 		$match	= Match::find($id);

 		$match->delete();

 		if($request->ajax()){

 			return response(array('msg' => 'Removing Successfull'), 200)

 								->header('Content-Type', 'application/json');

 			}

 		return redirect()->back();

 	}





}
