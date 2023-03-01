<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkSpace;
use App\Models\WorkSpaceInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkspaceInvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($workspaceid)
    {
        $workspace = WorkSpace::find($workspaceid);
        $members = $workspace->users()
            ->get();
        $membersid = $members->pluck('id');

        $notmembers = User::all()
            ->whereNotIn('id', $membersid);

        return view('workspaceinvitations.create', [
            'workspaceid' => $workspaceid,
            'workspace' => $workspace,
            'members' => $members,
            'notmembers' => $notmembers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $workspaceid)
    {
        $this->validate($request, [
            'inviteuser' => 'required'
        ]);
        $user = User::find($request->inviteuser);
        $invitation = new WorkSpaceInvitation;
        $invitation->work_space_id = $workspaceid;
        $invitation->email = $user->email;
        $invitation->status = 'Sent';

        // egybol hozza is adja a workspace-hez
        DB::table('user_work_space')
            ->insert([
                'user_id' => $user->id,
                'work_space_id' => $workspaceid,
            ]);
        $invitation->save();
        return redirect()->route('workspace.invitations', [$workspaceid]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($workspaceid)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
