@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2 mb-5">
                Edit the your appstatusbar
            </h1>
            <div class="container row">
                <div class="col-4">
                    <form method="POST" action="{{route('appstatus.update', [$id])}}">
                        @method('PUT')
                        @csrf
                        @include('layouts.appstatusform')
                    </form>
                </div>
                <div class="col-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="text"><h4>Program name</h4></td>
                            <td class="text-right"><h4>Program status</h4></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td class="text">
                                    {{$program->name}}
                                </td>
                                <td class="text-right">
                                    {{$program->status}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <form method="POST" action="{{route('appstatus.addProgram', [$id])}}">
                        @csrf
                        @include('layouts.programsform')
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
