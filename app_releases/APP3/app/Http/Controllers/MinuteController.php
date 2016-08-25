<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables as Datatables;
use Illuminate\Http\Request;
use Illuminate\Routing\Router as Route;
use App\Services\DatatablePresenter;
use Auth;
use App\Models\Minute;
use App\Models\Match;


class MinuteController extends Controller
{
    
 public function __construct()
     {
         $this->middleware('auth');
     }




    public function index(Minute $minutes , Request $request)
    {
       $minutes = $minutes
                ->join('matches as M', 'M.id', '=', 'minutes.match_id')
                ->join('teams as T1', 'T1.id', '=', 'M.team1_id')
                ->join('teams as T2', 'T2.id', '=', 'M.team2_id')
                ->select(array(
                                    'minutes.id as mid',
                                    'minutes.body as body',
                                    'minutes.minute as minute',
                                    'T1.name as T1name',
                                    'T2.name as T2name'
                                ))
                ->orderBy('mid','desc')->get();
    $tableData = Datatables::of($minutes)
                ->editColumn('T1name', '{{ $T1name }} - {{ $T2name }}')
                ->addColumn('actions', function ($data)
                    {return view('partials.actionBtns')->with('controller','minute')->with('id', $data->mid)->render(); });

    if($request->ajax())
        return DatatablePresenter::make($tableData, 'index');
        $match= new Match;
        $matches = $match
                ->join('teams as team1', 'team1.id', '=', 'matches.team1_id')
                ->join('teams as team2', 'team2.id', '=', 'matches.team2_id')
                ->select(array('team1.name as team1_name',
                                                    'team2.name as team2_name',
                                                    'matches.id as matchid'))
                ->get();
        return view('minutes.index')
        ->with('matches',$matches)
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
            $minute = new Minute;
            $minute->match_id          = $request->match_id;
            $minute->body              = $request->body;
            $minute->minute               = $request->minute;
            $minute->save();
            if($request->ajax())
            {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request , $id)
    {
         $minute = Minute::find($id);
            if($request->ajax())
              {
                return response(array('msg' => 'Adding Successfull', 'data'=>$minute->toJson() ), 200)
                        ->header('Content-Type', 'application/json');
              }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
     public function update(Request $request , $id)
    {
        $minute = Minute::find($id);
        $minute->match_id      = $request->match_id;
        $minute->body          = $request->body;
        $minute->minute           = $request->minute;
        $minute->save();
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
        $minute = Minute::find($id);
        $minute->delete();
        if($request->ajax())
          {
            return response(array('msg' => 'Removing Successfull'), 200)
                            ->header('Content-Type', 'application/json');
          }
        return redirect()->back();
    }



     public function finish()
    {
         $l7za = new Minute();
         $result = $l7za->where('match_id',2)->get();
         $data = [];
         $datamin = [];
         foreach($result as $row){
            $data[]=$row->body;
            $datamin[]=$row->min;

         $inputs = new Jminutes();
         $inputs->match_id=2;
         $inputs->body=json_encode($data,true);
         $inputs->min=json_encode($datamin,true);
         $inputs->save();

         //$alaa=new Minute();
         //$alaaresult=$alaa->where('match_id',2)->first();

        // $res = json_decode($alaaresult->body);
        // return view('json')->with('res',$res);

    }
}
}