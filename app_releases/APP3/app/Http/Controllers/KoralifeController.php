<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use App\Models\Match;
use App\Models\Coach;
use App\Models\Player_match;
use App\Models\Reserve_player;
use App\Models\Snew;
use App\Models\Sponsor;
use App\Models\Championship;
use App\Models\Team_championship;
use App\Models\Referee;
use App\Models\Championship_sponsor;
use App\Models\Stadium;
use App\Models\Country;
use App\Models\Post;
use App\Models\Pcomment;
use App\Models\Team_player;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use Carbon\Carbon;


class KoralifeController extends Controller {
	public function __construct()
	 {
	 	$championship_sponsor = new Championship_sponsor;
          $sponsors = $championship_sponsor
             ->join('sponsors as s','s.id','=','championship_sponsors.sponsor_id')
             ->join('championships as c','c.id','=','championship_sponsors.championship_id')
             ->select(array(
             	'championship_sponsors.id as id',
             	's.name as sponsor_name',
             	's.url as url',
             	's.flag as sponsor_flag'))->orderByRaw("RAND()")->take(2)->get();
       $championship_sponsor = new Championship_sponsor;
          $sponsors6 = $championship_sponsor
             ->join('sponsors as s','s.id','=','championship_sponsors.sponsor_id')
             ->join('championships as c','c.id','=','championship_sponsors.championship_id')
             ->select(array(
             	'championship_sponsors.id as id',
             	's.name as sponsor_name',
             	's.url as url',
             	's.flag as sponsor_flag'))->orderByRaw("RAND()")->take(6)->get();
		view()->share('sponsors', $sponsors);
		view()->share('sponsors6', $sponsors6);

	 }

	public function index(Match $match , Request $request)
	{
		$match = $match
	   ->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
		 ->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
		 ->join('stadia as S', 'S.id', '=', 'matches.stadium_id')
		 ->join('countries as C', 'C.id', '=', 'S.country_id')
		 ->select(array('T1.name as T1name','T2.name as T2name',
		 'matches.id as match_id',
		 'matches.team1_goals as team1_goals',
		 'matches.team2_goals as team2_goals',
		 'matches.match_date as match_date',
		 'matches.date as date',
		 'T1.flag as T1flag',
		 'T2.flag as T2flag',
		 'T1.id as T1ID',
		 'T2.id as T2ID',
		 'S.name as stadium_name',
		 'C.name as country_name'
		))
		 ->where('date',date('Y-m-d'))->get();
$Allmatch= new Match;

		 $Allmatch = $Allmatch
			->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
			->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
			->select(array('T1.name as T1name','T2.name as T2name'
			,'matches.id as match_id',
			'matches.team1_goals as team1_goals',
			'matches.team2_goals as team2_goals',
			'matches.match_date as match_date',
			'T1.flag as T1flag',
			'T2.flag as T2flag',
			'T1.id as T1ID',
			'T2.id as T2ID'
		 ))
		 ->where('date',date('Y-m-d'))->orderBy('match_id','desc')->get();
		 $Allmatch2= new Match;

		 $Allmatch2 = $Allmatch2
			->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
			->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
			->select(array('T1.name as T1name','T2.name as T2name'
			,'matches.id as match_id',
			'matches.team1_goals as team1_goals',
			'matches.team2_goals as team2_goals',
			'matches.match_date as match_date',
                        'matches.date as date',
			'T1.flag as T1flag',
			'T2.flag as T2flag',
			'T1.id as T1ID',
			'T2.id as T2ID'

		 ))
		 ->orderBy('matches.match_date','ASC')->get();
     $team_championship = new Team_championship;

     $team_championship = $team_championship
                          ->join('teams as t','t.id','=','team_championships.team_id')
                          ->select(array(
                          	't.name as team_name',
                          	't.flag as team_flag',
                          'team_championships.no_points as points'
                          	))->orderBy('points','desc')->get();
    $news=new Snew;
		$news = $news->take(3)->orderBy('id','desc')->get();
 $newcontent=new Snew;
		$newcontent = $newcontent->skip(3)->take(6)->orderBy('id','desc')->get();
	$matches_table= new Match;
		 $matches_table = $matches_table
			->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
			->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
			->select(array('T1.name as T1name','T2.name as T2name'
			,'matches.id as match_id',
		'T1.flag as T1flag',
			'T2.flag as T2flag',
			'matches.team1_goals as team1_goals',
			'matches.team2_goals as team2_goals',
			'matches.match_date as match_date'
		 ))->orderBy('match_date','desc')->get();
		return view('koralife.index')
		->with('match',$match)
		->with('matches_table',$matches_table)
		->with('news',$news)
                ->with('newcontent',$newcontent)
		->with('team_championship',$team_championship)
		->with('Allmatch',$Allmatch)
		->with('Allmatch2',$Allmatch2);
	}
	
	public function team()
	{
		return view('koralife.team');
	}
public function displayplayers(Team_player $team_players , $id)
{
			$team_id = Team_player::find($id);
			 $team_players = $team_players
			 ->join('players as P','P.id','=','team_players.player_id')
			 ->join('countries as country','country.id','=','P.country_id')
			 ->select(array(
			 	'P.name as Pname',
			 	'P.flag as Pflag',
			 	'P.id as PID',
			 	'P.position as position',
			 	'country.name as country',
			 	'P.num as number',
			 	'P.birth_date as Birth',
			 	'P.nickname as nickname',
			 	'P.addition_info as info',
			 	'P.height as height',
			 	'P.weight as weight'
			 	))
			 ->where('P.team_id',$id)->orderBy('position','asc')->get();
     $team_championship = new Team_championship;
     $team_lega = $team_championship
                          ->join('teams as t','t.id','=','team_championships.team_id')
                          ->select(array(
                          	't.name as team_name',
                          	't.flag as team_flag',
                          	'team_championships.no_points as points',
                          	'team_championships.no_winnes as winnes',
                          	'team_championships.no_loses as loses',
                          	'team_championships.no_draughts as draughts'
                          	))->where('team_championships.team_id',$id)->get();
			$team_name = Team::where('id',$id)->get();
			return view('koralife.team')
			->with('team_name',$team_name)
			->with('team_players',$team_players)
			->with('team_lega',$team_lega);
}
//statistics
	public function displaystatistics(Match $match,$id)
	{
		$match_id=Match::find($id);
		$team1id = $match_id->team1_id;
		$team2id = $match_id->team2_id;
		$matchteams= new Match;
				 $matchteam = $matchteams
				->join('teams as T1', 'T1.id', '=', 'matches.team1_id')
				->join('teams as T2', 'T2.id', '=', 'matches.team2_id')
				->select(array(
				'T1.name as T1name',
				'T2.name as T2name',
				'T1.flag as T1flag',
				'T2.flag as T2flag',
				'T1.id as T1id',
				'T2.id as T2id' ))->where('matches.id',$id)->get();
		$goals   = $match->where('id',$id)->get(['team1_goals','team2_goals']);
		$errors  = $match->where('id',$id)->get(['team1_errors','team2_errors']);
		$corners = $match->where('id',$id)->get(['team1_corners','team2_corners']);
		$psessions   = $match->where('id',$id)->get(['team1_psessions','team2_psessions']);
		$m=new Match;
		$red1cards= $m
		->join('cards as c ','c.match_id','=','matches.id')
		->join('teams as t','t.id','=','c.team_id')
		->join('teams as t2','t2.id','=','c.team_id')
	    ->where('c.color','red')->where('c.team_id',$team1id)
		->count('c.team_id');
		$red2cards= $m
		->join('cards as c ','c.match_id','=','matches.id')
		->join('teams as t','t.id','=','c.team_id')
		->join('teams as t2','t2.id','=','c.team_id')
	    ->where('c.color','red')->where('c.team_id',$team2id)
		->count('c.team_id');
		$yellow1cards= $m
		->join('cards as c ','c.match_id','=','matches.id')
		->join('teams as t','t.id','=','c.team_id')
		->join('teams as t2','t2.id','=','c.team_id')
	    ->where('c.color','yellow')->where('c.team_id',$team1id)
		->count('c.team_id');
		$yellow2cards= $m
		->join('cards as c ','c.match_id','=','matches.id')
		->join('teams as t','t.id','=','c.team_id')
		->join('teams as t2','t2.id','=','c.team_id')
	    ->where('c.color','yellow')->where('c.team_id',$team2id)
		->count('c.team_id');
		$offsides   = $match->where('id',$id)->get(['team1_offsides','team2_offsides']);
	   return view('koralife.statistics')
       ->with('matchteams',$matchteam)
       ->with('goals',$goals)
       ->with('errors',$errors)
       ->with('corners',$corners)
       ->with('psessions',$psessions)
       ->with('offsides',$offsides)
       ->with('red1cards',$red1cards)
       ->with('red2cards',$red2cards)
       ->with('yellow1cards',$yellow1cards)
       ->with('yellow2cards',$yellow2cards);
   }
	//displayplan
	public function displayplan(Match $match,$id)
		{
			$match_id=Match::find($id);
	///////////////teams name///////////////////////////////
			$teamsname=$match
			->join('teams as T1','T1.id','=','matches.team1_id')
			->join('teams as T2','T2.id','=','matches.team2_id')
			->select(array(
			  'T1.name as T1name',
			  'T2.name as T2name'
			))
			->where('matches.id',$id)->first();
			$m1=new Match;
			$playersteam1=$m1
			->join('teams as T1','T1.id','=','matches.team1_id')
			->join('team_players as TP1','TP1.team_id','=','T1.id')
			->join('players as player1','player1.id','=','TP1.player_id')
			->select(array(
						'player1.name as P1name',
						'player1.flag as P1flag',
						'player1.height as P1height',
						'player1.position as P1position',
						'player1.num as P1num',
						'player1.weight as P1weight',
						'player1.prefered_foot as P1foot',
						'player1.birth_date as P1birth_date',
						'player1.nationality as P1nationality'
					))
						->where('matches.id',$id)->get();
						//$count=count($playersteam1);
						$m2=new Match;
						$playersteam2=$m2
						->join('teams as T2','T2.id','=','matches.team2_id')
						->join('team_players as TP2','TP2.team_id','=','T2.id')
						->join('players as player2','player2.id','=','TP2.player_id')
						->select(array(
						  'player2.name as P2name',
						  'player2.flag as P2flag',
						  'player2.height as P2height',
						  'player2.position as P2position',
						  'player2.num as P2num',
						  'player2.weight as P2weight',
						  'player2.prefered_foot as P2foot',
						  'player2.birth_date as P2birth_date',
						  'player2.nationality as P2nationality'
						  ))
				->where('matches.id',$id)->get();
				//$count=count($playersteam1);
				return view('koralife.plan')
				->with('teamsname',$teamsname)
				//->with('count',$count)
				->with('playersteam1',$playersteam1)
				->with('playersteam2',$playersteam2);
		}
//about
	public function about()
	{
		$championship_sponsor = new Championship_sponsor;
		$sponsors = $championship_sponsor
		          ->join('sponsors as s','s.id','=','championship_sponsors.sponsor_id')
		          ->join('championships as c','c.id','=','championship_sponsors.championship_id')
		          ->select(array(
		             	'championship_sponsors.id as id',
		             	's.name as sponsor_name',
		             	's.url as url',
		             	's.flag as sponsor_flag'))->orderByRaw("RAND()")->take(2)->get();
		return view('koralife.about')
		->with('sponsors',$sponsors);
	}
	//coache_profile
	public function coache_profile(Coach $coach , $id)
	{
		$coach_id = $coach->find($id);
		$coache_details = $coach
		        ->join('teams as T','T.coach_id','=','coaches.id')
		        ->join('countries as country','country.id','=','coaches.country_id')
		        ->join('cities as city','city.id','=','coaches.city_id')
		        ->select(array('T.name as team_name',
						'coaches.name as coache_name',
                        'coaches.id as coache_id',
					    'coaches.flag as flag',
					    'coaches.birth_date as birth_date',
					    'coaches.role as role',
					    'city.name as city_name',
					    'country.name as country_name',
					    'coaches.additional_info as info'
					))
		        ->where('coaches.id',$id)->get();
		    	return view('koralife.coache_profile')
		     	->with('coache_details',$coache_details);
	}
//coaches
	public function coaches(Coach $coach)
	{
		$coaches = $coach
		        ->join('teams as T','T.coach_id','=','coaches.id')
				->where('role','=','مدير فنى')
				->select(array('T.name as team_name',
								'coaches.name as coache_name',
                        		'coaches.id as coache_id',
					    		'coaches.flag as flag'
						))
		->get();
		return view('koralife.coache')
		->with('coaches',$coaches);
	}
	//stadiums
	public function stadiums(Stadium $stadium)
	{	
		$stadiums = $stadium->take(6)->orderBy('id','desc')->get();
		return view('koralife.stadium')
		->with('stadiums',$stadiums);
	}
	//Referees
	public function referee_profile(Referee $referee , $id)
	{
		$referee_id = $referee->find($id);
		$referee_details = $referee
		                  	->join('countries as country','country.id','=','referees.country_id')
		                  	->join('cities as city','city.id','=','referees.city_id')
		                  	->select(array(
						        'referees.name as referee_name',
				                'referees.id as referee_id',
								'referees.flag as flag',
								'referees.birth_date as birth_date',
								'referees.role as role',
								'city.name as city_name',
                                'referees.job as job',
					    		'country.name as country_name',
					    		'referees.additional_info as info'
								))
		                  	->where('referees.id',$id)->get();
		    				return view('koralife.referee_profile')
		     				->with('referee_details',$referee_details);
	}
	//referees
	public function referees(Referee $referee)
	{
		$referee = $referee->where('role','=','referee 1')->get();
		return view('koralife.referee')
		->with('referee',$referee);
	}
	//News
	public function loadmore(Request $request)
	{
		$output='';
		$lastid=$request->lastid;
        $n = new Snew;
		$newsload = $n->where('id','<',$lastid)->take(2)->orderBy('id','desc')->get();
		if(count($newsload) > 0){
		$i=0;
		foreach($newsload as $new){
		if($i == 0 )
		$dir='it-right';
		else
		$dir='it-left';
		$output .= '
        <div class="it-box '.$dir.' it-animate">
        <div class="it-content">
        <a class="it-image" href="images/uploads/'.$new->flag.'" >
        <img src="images/uploads/'.$new->flag.'"><span><i></i></span>
        </a>
        <h2><a style="color:#069 !important;" href="Newdetails/'.$new->id.'">'.$new->title.'</a></h2>
        <p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">'.$new->additional_info.'</p>
        <div class="it-infobar">
        <em>'.$new->date.'</em>
        <a style="color:#069 !important;" href="Newdetails/'.$new->id.'" class="it-readmore">أقرأ المزيد</a>
        </div>
        </div>
        <div class="it-iconbox">
        <span></span>
        </div>
        </div>';
		$i = $i + 1;
		}
		$output .='<div id="remove"><button style="margin-left:44%; margin-top:7%;" type="button" class="btn btn-success form_control"id="btn_more" data-id="'.$new->id.'">

		   ...تحميل المزيد</button></div>';

		}



		echo $output;
	}
	//stadium
	public function loadstadium(Request $request)

	{
		$output='';
		$lastid=$request->lastid;
        $s = new Stadium;
		$stadiumload = $s->where('id','<',$lastid)->take(6)->orderBy('id','desc')->get();
		if(count($stadiumload) > 0){
		$i=0;
		foreach($stadiumload as $stad){
		if(($i % 2) == 0 )
		$dir='it-right';
		else
		$dir='it-left';
		$output .= '
  	    <div class="it-box '.$dir.' it-animate">
        <div class="it-content">
        <a href="images/uploads/'.$stad->flag.'" class="it-image">
        <img src="images/uploads/'.$stad->flag.'"><span><i></i></span></a>
        <h2 style="text-align: right;">'.$stad->name.'</h2>
        <p style="text-align: right;"> '.$stad->addition_info.'</p>
        <div class="it-infobar">
        <em><bdi>شخص</bdi> '.$stad->capacity.' </em><span>:السعة</span>
        <h3 font-size:15px; style="float: right;" class="it-readmore">الأرض '.$stad->ground.'</h3>
        </div>
        </div>
        <div class="it-iconbox">
        <span></span>
        </div>
        </div>';
		$i = $i + 1;
		}
		$output .='<div id="remove"><button style="margin-left:44%; margin-top:7%;" type="button" class="btn btn-success form_control"id="btn_more" data-id="'.$stad->id.'">
		   ...تحميل المزيد</button></div>';
		}
		   echo $output;
	}
	//news
	public function news()
	{
		$new = new Snew;
        $news = $new->take(2)->orderBy('id','desc')->get();
		return view('koralife.news')
		->with('news',$news);
	}
	//getnew
	public function getnew(Request $request , $new_id)

	{
       $new = new Snew;
       $newid=$new->find($new_id);
       $newdetails = $new->where('id',$new_id)->get();
	   return view('koralife.news-single')
       ->with('newdetails',$newdetails);

	}
	//anlyzing
	public function anlyzing()
	{
		return view('koralife.analyzing');
    }
	//post 
	public function post()
	{
		$posts=Post::get();
		return view ('Front.post')
		->with('posts',$posts);
	}

	//postdetails
	public function post_details($id)
	{
		$post = new Post();
		$p_detail = $post
		             ->join('categories as c','c.id','=','posts.cat_id')
		             ->select(array('posts.id as id',
		             	            'c.name as Cname',
		             	            'posts.title as title',
		             	            'posts.flag as flag',
		             	            'posts.body as body',
		             	            'posts.date as date',
		             	            'posts.author as author'))
		             ->where('posts.id',$id)->get();

		$previous_post_id = $post->where('id','<',$id)->first();
		$next_post_id     = $post->where('id','>',$id)->first();

		$num_comments = Pcomment::where('post_id',$id)->count();
		return view ('Front.post-details')
		->with('p_details',$p_detail)
		->with('previous_post_id',$previous_post_id)
		->with('next_post_id',$next_post_id)
		->with('num_comments',$num_comments);
	}

}
