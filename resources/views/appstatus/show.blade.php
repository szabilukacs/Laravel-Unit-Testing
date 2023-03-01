@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                {{$appstatus->name}}
            </h1>

            <p class="m-5">{{$appstatus->description}}</p>

            <table class="table w-75">
                <thead>
                <tr>
                    <td class="text"><h4>Program name</h4></td>
                    <td colspan="2" class="text-right"><h4>Program status</h4></td>
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
                        <td class="text-right col-1">
                            @switch($program->status)
                                @case("Available")
                                <x-elusive-ok-sign class="w-25" style="color: green"/>
                                @break
                                @case("Service disruption")
                                <x-fas-info-circle class="w-25" style="color: orange"/>
                                @break
                                @case("Service outage")
                                <x-ri-error-warning-fill class="w-25" style="color: red"/>
                                @break
                                @case("Service information")
                                <x-bi-info-lg class="w-25" style="color: gray"/>
                                @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <table class="table">
                <thead>
                <tr>
                    <th><a href={{route('appstatus.edit',[$appstatus->id])}}>Edit</a></th>
                </tr>
                </thead>
            </table>
            <form method="POST" action="{{route('appstatus.destroy', [$appstatus->id])}}">
                @method('DELETE')
                @csrf
                <input class="btn btn-primary" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
            </form>
        </div>
    </div>
@endsection
