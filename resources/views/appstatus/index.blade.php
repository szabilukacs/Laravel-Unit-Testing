@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="text-center">
            <h1 class="display-2">
                My Appstatuses
            </h1>
            @foreach($appstatuses as $appstatus)
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <a href={{route('appstatus.show',[$appstatus->id])}}>{{$appstatus->name}}</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endforeach
            <table class="table">
                <thead>
                <tr>
                    <th><a href={{route('appstatus.create')}}>Create new</a></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
