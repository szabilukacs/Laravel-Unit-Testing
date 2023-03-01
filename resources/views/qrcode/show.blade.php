@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="container mt-4">
            @if(!empty($successMsg))
                <div class="alert alert-success"> {{ $successMsg }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h2>Your QR Code</h2>
                    <p>URL: {{$url}}</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-info"
                                onclick="window.location='{{ route('qrcode.index') }}'">
                            Generate new QR code
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    {!! QrCode::size(200)->generate($url) !!}
                    <div class="d-flex justify-content-end">
                        <form method="GET" action={{route('qrcode.export',[$url])}}>
                            @csrf
                            <input class="btn btn-info" type="submit" value="Export">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
