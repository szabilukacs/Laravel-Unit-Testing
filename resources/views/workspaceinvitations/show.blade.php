@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                Invitations
            </h1>
            @foreach($workspaceinvitations as $workspaceinvitation)
                <p>{{$workspaceinvitation->email}}: {{$workspaceinvitation->status}}</p>
            @endforeach
            <h3><a href={{route('workspaceinvitations.create',[$workspaceid])}}>Invite new members</a></h3>
        </div>
    </div>
@endsection
