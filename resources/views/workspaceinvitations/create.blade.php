@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                {{$workspace->company_name}}
            </h1>
            <h2>Already members: </h2>
            @foreach($members as $member)
                <p>{{$member->name}}</p>
            @endforeach
            <form method="POST" action="{{route('workspaceinvitations.store',$workspaceid)}}">
                @csrf
                <select name="inviteuser" class="form-select">
                    <option selected disabled>Select a user</option>
                    @foreach($notmembers as $notmember)
                        <option value="{{$notmember->id}}">{{$notmember->name}}</option>
                    @endforeach
                </select>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>


        </div>
    </div>
@endsection
