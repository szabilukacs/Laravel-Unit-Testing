@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                Edit the workspace
            </h1>
            <form method="POST" action="{{route('workspace.update', [$workspace->id])}}">
                @method('PUT')
                @csrf
                @include('layouts.workspaceformedit')
            </form>
        </div>
    </div>
@endsection
