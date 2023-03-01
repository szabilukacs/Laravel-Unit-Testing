<?php

namespace App\Http\Controllers;

use App\Models\WorkSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkSpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workspaces = DB::table('users')
            ->join('user_work_space', 'user_work_space.user_id', '=', 'users.id')
            ->join('work_spaces', 'user_work_space.work_space_id', '=', 'work_spaces.id')
            ->where('users.id', '=', auth()->id())
            ->get();

        return view('workspaces.index', ['workspaces' => $workspaces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workspaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $workspace = new WorkSpace;

        $workspace->company_name = $request->input('name');
        $workspace->company_address = $request->input('address');
        $workspace->phone = $request->input('phone');
        $workspace->email = $request->input('email');
        $workspace->logo_path = $request->input('logo');
        $workspace->instagram = $request->input('instagram');
        $workspace->facebook = $request->input('facebook');
        $workspace->linkedin = $request->input('linkedin');
        $workspace->twitter = $request->input('twitter');
        $workspace->webpage = $request->input('webpage');
        $workspace->save();
        $workspace->users()
            ->attach($request->user());
        $workspace->save();

        return redirect('/workspace');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workspace = WorkSpace::find($id);

        $this->authorize('view', [$workspace, auth()->user()]);

        $members = $workspace->users()->get();

        return view('workspaces.show', [
            'workspace' => $workspace,
            'members' => $members,
            'id' => $id,
        ]);
    }

    public function invitations($workspaceid)
    {
        $workspaceinvitations = DB::table('work_space_invitations')
            ->join('work_spaces', 'work_space_invitations.work_space_id', '=', 'work_spaces.id')
            ->where('work_spaces.id', '=', $workspaceid)
            ->select('work_space_invitations.id', 'status', 'work_space_invitations.email')
            ->get();

        return view('workspaceinvitations.show', [
            'workspaceinvitations' => $workspaceinvitations,
            'workspaceid' => $workspaceid,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workspace = WorkSpace::find($id);
        return view('workspaces.edit',
            [
                'workspace' => $workspace
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        WorkSpace::where('id', $id)
            ->update([
                'company_name' => $request->name,
                'company_address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'logo_path' => $request->logo,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'webpage' => $request->webpage,
            ]);

        return redirect('/workspace');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        WorkSpace::where('id', $id)->delete();
        return redirect('/workspace');
    }
}
