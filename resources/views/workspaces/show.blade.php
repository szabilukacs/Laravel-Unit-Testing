@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                {{$workspace->company_name}}
            </h1>

            <table class="table">
                <tbody>
                <tr>
                    <td>
                        {{$workspace->company_name}}
                    </td>
                    <td>
                        {{$workspace->company_address}}
                    </td>
                    <td>
                        {{$workspace->phone}}
                    </td>
                    <td>
                        {{$workspace->email}}
                    </td>
                    <td>
                        {{$workspace->logo}}
                    </td>
                    <td>
                        {{$workspace->facebook}}
                    </td>
                </tr>
                </tbody>
            </table>
            <h2>Members of workspace: </h2>
            @foreach($members as $member)
                <p>{{$member->name}}</p>
            @endforeach
            <table class="table">
                <thead>
                <tr>
                    <th><a href={{route('workspace.edit',[$workspace->id])}}>Edit</a></th>
                    <th><a href="{{route('workspace.invitations',[$workspace->id])}}">Invitations to Workspace</a></th>
                </tr>
                </thead>
            </table>
            <form method="POST" action="{{route('workspace.destroy', [$workspace->id])}}">
                @method('DELETE')
                @csrf
                <input class="btn btn-primary" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
            </form>
        </div>
    </div>
@endsection
