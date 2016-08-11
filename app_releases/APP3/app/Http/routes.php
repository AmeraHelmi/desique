<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('facebook', 'AccountController@facebook_redirect');
// Get back to redirect url
Route::get('account/facebook', 'AccountController@facebook');
Route::get     ('/adminpanel', 'HomeController@index');
//koralife
Route::get     ('/',            'KoralifeController@index');
//championship page
Route::get     ('/about_champion',      'KoralifeController@about');
//coach page
Route::get     ('/coaches_champion',    'KoralifeController@coaches');
Route::get     ('/coach_profile/{id}',    'KoralifeController@coache_profile');
//Referee page
Route::get     ('/referees_champion',   'KoralifeController@referees');
Route::get     ('/referee_profile/{id}',   'KoralifeController@referee_profile');
//Stadium page
Route::get     ('/stadium_champion',    'KoralifeController@stadiums');
Route::POST ('/stadium_champion'  , array('as' => 'loadmorestadium','uses' => 'KoralifeController@loadstadium'));
//Analyzing
Route::get     ('/anlyzing',            'KoralifeController@anlyzing');


Route::get     ('/main_team',           'KoralifeController@team');
//News pages
Route::get     ('/news',         'KoralifeController@news');
Route::POST    ('/news'             , array('as' => 'loadmore','uses' => 'KoralifeController@loadmore'));
Route::get     ('/Newdetails/{id?}',         'KoralifeController@getnew');
//
Route::get     ('/Tplayers/{id}','KoralifeController@displayplayers');
Route::get     ('/plan/{id}' ,   'KoralifeController@displayplan');
Route::get     ('/statistics/{id}' ,   'KoralifeController@displaystatistics');
//advert

Route::POST    ('/advert/store'             , array('as' => 'addadvert','uses' => 'AdvertController@store'));
Route::POST    ('/advert/update'         ,'AdvertController@update');
Route::resource('/advert'                , 'AdvertController');
//country
Route::POST    ('/country/store'             , array('as' => 'addcountry','uses' => 'CountryController@store'));
Route::POST    ('/country/update'         ,'CountryController@update');
Route::resource('/country'                , 'CountryController');
//city
Route::POST    ('/city/store'             , array('as' => 'addcity','uses' => 'CityController@store'));
Route::resource('/city'                    , 'CityController');
//player
Route::POST    ('/player/store'          ,'PlayerController@store');
Route::POST    ('/player/update'         ,'PlayerController@update');
Route::POST    ('/player/getCities'      ,'PlayerController@selectCity');
Route::resource('/player'                ,'PlayerController');
//referee
Route::POST    ('/referee/store'           ,'RefereeController@store');
Route::POST    ('/referee/update'          ,'RefereeController@update');
Route::POST    ('/referee/getCities'       ,'RefereeController@selectCity');
Route::resource('/referee'                 ,'RefereeController');
//nation
Route::POST    ('/nation/store'            ,'NationController@store');
Route::POST    ('/nation/update'           ,'NationController@update');
Route::POST    ('/nation/getCities'        , 'NationController@selectCity');
Route::resource('/nation'                  ,'NationController');
//channel
Route::POST    ('/channel/store'           ,'ChannelController@store');
Route::POST    ('/channel/update'          ,'ChannelController@update');
Route::resource('/channel'                 ,'ChannelController');
//commentor
Route::POST    ('/commentor/store'            ,'CommentorController@store');
Route::POST    ('/commentor/update'           ,'CommentorController@update');
Route::POST    ('/commentor/getCities'        ,'CommentorController@selectCity');
Route::resource('/commentor'                  ,'CommentorController');
//sponsor
Route::POST    ('/sponsor/store'            ,'SponsorController@store');
Route::POST    ('/sponsor/update'           ,'SponsorController@update');
Route::resource('/sponsor'                  ,'SponsorController');
//shoes
Route::POST    ('/shoe/store'              ,'ShoeController@store');
Route::POST    ('/shoe/update'             ,'ShoeController@update');
Route::resource('/shoe'                    , 'ShoeController');
//stadium
Route::POST    ('/stadium/store'            ,'StadiumController@store');
Route::POST    ('/stadium/update'           ,'StadiumController@update');
Route::POST    ('/stadium/getCities'        ,'StadiumController@selectCity');
Route::resource('/stadium'                  ,'StadiumController');
//championship
Route::POST    ('/championship/store'          ,'ChampionshipController@store');
Route::POST    ('/championship/update'         ,'ChampionshipController@update');
Route::resource('/championship'                ,'ChampionshipController');
//branch
Route::POST    ('/branch/store'            ,'BranchController@store');
Route::POST    ('/branch/update'           ,'BranchController@update');
Route::POST    ('/branch/getCities'        ,'BranchController@selectCity');
Route::resource('/branch'                  ,'BranchController');
//agent
Route::POST    ('/agent/store'          , array('as' => 'addagent','uses' => 'AgentController@store'));
Route::resource('/agent'                , 'AgentController');
//ball
Route::POST    ('/ball/store'            ,'BallController@store');
Route::POST    ('/ball/update'           ,'BallController@update');
Route::resource('/ball'                  ,'BallController');
//coach
Route::POST    ('/coach/store'            ,'CoachController@store');
Route::POST    ('/coach/update'           ,'CoachController@update');
Route::POST    ('/coach/getCities'        ,'CoachController@selectCity');
Route::resource('/coach'                  ,'CoachController');
//champion sponsors
Route::POST    ('/champsponsors'       , array('as' => 'addchampionsponsors','uses' => 'ChampsponsorsController@store'));
Route::resource('/champsponsors'       , 'ChampsponsorsController');
//managment
Route::POST    ('/manager/store'            ,'ManagerController@store');
Route::POST    ('/manager/update'           ,'ManagerController@update');
Route::POST    ('/manager/getCities'        ,'ManagerController@selectCity');
Route::resource('/manager'                  ,'ManagerController');
//team
Route::POST    ('/team/store'            ,'TeamController@store');
Route::POST    ('/team/update'           ,'TeamController@update');
Route::POST    ('/team/getCities'       ,'TeamController@selectCity');
Route::resource('/team'                  ,'TeamController');
//group
Route::POST    ('/group/store'          , array('as' => 'addgroup','uses' => 'GroupController@store'));
Route::resource('/group'                ,'GroupController');







//match



Route::POST    ('/match/store'          , array('as' => 'addmatch','uses' => 'MatchController@store'));



Route::resource('/match'                ,'MatchController');







//pession



Route::POST    ('/psession/store'          , array('as' => 'addpsession','uses' => 'PsessionController@store'));



Route::resource('/psession'                ,'PsessionController');







//teamcloth



Route::POST    ('/teamcloth/store'              ,'TeamclothController@store');



Route::POST    ('/teamcloth/update'             ,'TeamclothController@update');



Route::resource('/teamcloth'                    ,'TeamclothController');







//nationcloth



Route::POST    ('/nationcloth/store'              ,'NationclothController@store');



Route::POST    ('/nationcloth/update'             ,'NationclothController@update');



Route::resource('/nationcloth'                    ,'NationclothController');







//corner



Route::POST    ('/corner/store'             , array('as' => 'addcorner','uses' => 'CornerController@store'));



Route::resource('/corner'                    , 'CornerController');







//card



Route::POST    ('/card/store'             , array('as' => 'addcard','uses' => 'CardController@store'));


Route::resource('/card'                    , 'CardController');


//error



    ROUTE::POST    ('/ERROR/STORE'             , ARRAY('AS' => 'ADDERROR','USES' => 'ERRORCONTROLLER@STORE'));



    ROUTE::RESOURCE('/ERROR'                    , 'ERRORCONTROLLER');











//offside



Route::POST    ('/offside/store'             , array('as' => 'addoffside','uses' => 'OffsideController@store'));



Route::resource('/offside'                    , 'OffsideController');











//penlty



Route::POST    ('/penlty/store'             , array('as' => 'addpenlty','uses' => 'PenltyController@store'));



Route::resource('/penlty'                    , 'PenltyController');







//match sponsors



Route::POST    ('/msponsors/store'          , array('as' => 'addmsponsors','uses' => 'MatchsponsorController@store'));



Route::resource('/msponsors'                , 'MatchsponsorController');







//player shoes



Route::POST    ('/playershoes/store'             , array('as' => 'addplayershoes','uses' => 'PlayershoesController@store'));



Route::POST    ('/playershoes/getplayers'        ,'PlayershoesController@getplayers');



Route::resource('/playershoes'                   ,'PlayershoesController');







//players team



Route::POST    ('/playersteam/store'              , array('as' => 'addplayersteam','uses' => 'TeamplayerController@store'));



Route::resource('/playersteam'                    , 'TeamplayerController');







//test



Route::GET('/players_team/{id}'                     , 'TestController@show');



Route::GET('/player_detail/{id}'                    , 'TestController@playerDetail');



Route::resource('/test'                             , 'TestController');







//player history



Route::POST    ('/playerhistory/store'              , array('as' => 'addplayerhistory','uses' => 'PlayerhistoryController@store'));



Route::resource('/playerhistory'                    , 'PlayerhistoryController');







//agent history



Route::POST    ('/agent_history/store'              , array('as' => 'addagent_history','uses' => 'Agent_historyController@store'));



Route::resource('/agent_history'                    , 'Agent_historyController');







//team_history_coach



Route::POST    ('/team_history_coach/store'          , array('as' => 'addteam_history_coach','uses' => 'Team_history_coachController@store'));



Route::resource('/team_history_coach'                ,'Team_history_coachController');











//managment_championship



Route::POST    ('/managment_championship/store'          , array('as' => 'addmanagment_championship','uses' => 'Managment_championshipController@store'));



Route::resource('/managment_championship'                ,'Managment_championshipController');







//player_sponsor



Route::POST    ('/player_sponsor/store'          , array('as' => 'addplayer_sponsor','uses' => 'Player_sponsorController@store'));



Route::resource('/player_sponsor'                ,'Player_sponsorController');











//team_sponsor



Route::POST    ('/team_sponsor/store'          , array('as' => 'addteam_sponsor','uses' => 'Team_sponsorController@store'));



Route::resource('/team_sponsor'                ,'Team_sponsorController');







//team_championship



Route::POST    ('/team_championship/store'          , array('as' => 'addteam_championship','uses' => 'Team_championshipController@store'));



Route::resource('/team_championship'                ,'Team_championshipController');







//News



Route::POST    ('/snew/store'          ,'SnewController@store');



Route::POST    ('/snew/update'         ,'SnewController@update');



Route::resource('/snew'                , 'SnewController');







//template



// Route::get('/template' ,'TestController@display');



// Route::get('/Tplayers/{id}' ,'TestController@displayplayers');



// Route::get('/playersdetail/{id}' ,'TestController@displayplayersdetail');



// Route::get('/plan/{id}' ,'TestController@displayplan');

//admin users
Route::resource('/users/update_admin' ,'AdminController@update_admin');
Route::resource('/users' ,'AdminController');

//Analysis
Route::POST    ('/analysis/store'          , array('as' => 'addanalysis','uses' => 'AnalysisController@store'));
Route::resource('/analysis' ,'AnalysisController');

//reserve_players
Route::POST    ('/reserve_player/store'          , array('as' => 'addreserve_player','uses' => 'Reserve_playerController@store'));
Route::POST    ('/reserve_player/getteams'          ,'Reserve_playerController@getteams');
Route::POST    ('/reserve_player/getplayers'          ,'Reserve_playerController@getplayers');
Route::resource('/reserve_player'                ,'Reserve_playerController');

//player_match
Route::POST    ('/player_match/store'          , array('as' => 'addplayer_match','uses' => 'Player_matchController@store'));

Route::POST    ('/player_match/getteams'          ,'Player_matchController@getteams');
Route::POST    ('/player_match/getplayers'          ,'Player_matchController@getplayers');
Route::resource('/player_match'                ,'Player_matchController');

//change_player
Route::POST    ('/change_player/store'          , array('as' => 'addchange_player','uses' => 'Change_playerController@store'));
Route::POST    ('/change_player/getteams'          ,'Change_playerController@getteams');
Route::POST    ('/change_player/getplayers1'          ,'Change_playerController@getplayers1');
Route::POST    ('/change_player/getplayers2'          ,'Change_playerController@getplayers2');
Route::resource('/change_player'                ,'Change_playerController');

//match now
Route::get('/now/{id}' ,'MatchnowController@index');
Route::POST('/now/save'          ,  'MatchnowController@save');
Route::POST('/now/store'          , 'MatchnowController@store');
Route::POST('/now/offside'          , 'MatchnowController@offside');
Route::POST('/now/corner'          , 'MatchnowController@corner');
Route::POST('/now/Psession'          , 'MatchnowController@Psession');
Route::POST('/now/error'          , 'MatchnowController@error');
Route::POST('/now/card'          , 'MatchnowController@card');
Route::POST  ('/now/getplayers'        ,'MatchnowController@getplayers');
Route::POST('/now'          , array('as' => 'addgoal','uses' => 'MatchnowController@goal'));

//team_group
Route::POST    ('/team_group/store'             , array('as' => 'addteam_group','uses' => 'Team_groupController@store'));
Route::resource('/team_group'                    , 'Team_groupController');


//Blog
Route::POST    ('/blog/store'            ,'BlogController@store');
Route::POST    ('/blog/update'           ,'BlogController@update');
Route::resource('blog', 'BlogController');

//Blog comments
Route::resource('blog-comments', 'Blog_commentController');

//post
Route::POST    ('/post/store'            ,'PostController@store');
Route::POST    ('/post/update'           ,'PostController@update');
Route::resource('post', 'PostController');

//Post comments
Route::resource('post-comments', 'Post_commentController');

//g_album
Route::POST    ('/g_album/store'          , array('as' => 'addg_album','uses' => 'G_albumController@store'));
Route::resource('/g_album'                , 'G_albumController');

//add images to album
Route::POST    ('/g_album_photo/store'            ,'G_album_photoController@store');
Route::POST    ('/g_album_photo/update'           ,'G_album_photoController@update');
Route::resource('g_album_photo', 'G_album_photoController');


//v_album
Route::POST    ('/v_album/store'          , 'V_albumController@store');
Route::resource('/v_album'                , 'V_albumController');

//category
Route::POST    ('/category/store'          , array('as' => 'addcategory','uses' => 'CategoryController@store'));
Route::POST    ('/category/update'           ,'CategoryController@update');
Route::resource('/category'                , 'CategoryController');


Route::controllers([
	'auth'      => 'Auth\AuthController',
	'password'  => 'Auth\PasswordController'
]);
