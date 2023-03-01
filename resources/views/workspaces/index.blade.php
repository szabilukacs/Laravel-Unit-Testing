@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                My Workspaces
            </h1>
            @foreach($workspaces as $workspace)
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <a href={{route('workspace.show',[$workspace->id])}}>{{$workspace->company_name}}</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endforeach
            <table class="table">
                <thead>
                <tr>
                    <th><a href={{route('workspace.create')}}>Create new</a></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
