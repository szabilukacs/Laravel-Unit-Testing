<?php

namespace App\Http\Controllers;

use App\Models\AppStatus;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppStatusController extends Controller
{
    public function index()
    {
        $appstatuses = DB::table('users')
            ->join('user_work_space', 'user_work_space.user_id', '=', 'users.id')
            ->join('work_spaces', 'user_work_space.work_space_id', '=', 'work_spaces.id')
            ->join('app_statuses','app_statuses.work_space_id','=','work_spaces.id')
            ->where('users.id', '=', auth()->id())
            ->get();
        return view('appstatus.index',['appstatuses' => $appstatuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appstatus = AppStatus::find($id);
        $programs = AppStatus::find($id)
            ->programs;
        return view('appstatus.show',[
            'appstatus' => $appstatus,
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appstatus = AppStatus::find($id);
        $programs = AppStatus::find($id)
            ->programs;
        return view('appstatus.edit',[
            'id' => $id,
            'appstatus' => $appstatus,
            'programs' => $programs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        ($request->is_visible == null) ? $logo_bool = 0 : $logo_bool = 1;
        AppStatus::where('id',$id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'logo_path' => $request->logo_path,
                'is_visible' => $logo_bool,
            ]);
        return redirect('/appstatus/'.$id);
    }

    public function addProgram(Request $request, $id)
    {
        $program = new Program;

        $program->name = $request->name;
        $program->description = $request->description;
        $program->status = "Available";

        $app = AppStatus::find($id);
        $program->app_status_id = $app->id;
        $program->save();
        return redirect('/appstatus/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppStatus::where('id',$id)->delete();
        return redirect('/appstatus');
    }
}
