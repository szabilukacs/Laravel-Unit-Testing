@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                Create a new workspace
            </h1>
            <form method="POST" action="{{route('workspace.store')}}">
                @csrf
                @include('layouts.workspaceform')
            </form>
        </div>
    </div>
@endsection
