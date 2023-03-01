@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center position-relative mt-5 pt-5">
        <div class="row">
            <div class="col-sm-4">
                <h2>Generate a QR code</h2>
                <form method="POST" action="{{'qrcode'}}">
                    @csrf
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" placeholder="type url" name="url">
                </div>
                <input class="btn btn-primary" type="submit" value="Generate">
                </form>
            </div>
            <div class="col-sm-8">
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h2>Simple QR Code</h2>
                        </div>
                        <div class="card-body">
                            {!! QrCode::size(200)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
