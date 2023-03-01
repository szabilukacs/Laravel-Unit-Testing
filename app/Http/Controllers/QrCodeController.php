<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index()
    {
        return view('qrcode.index');
    }

    public function generate(Request $request)
    {
        if (!empty($request->url))
            return view('qrcode.show', ['url' => $request->url]);
        else
            return view('qrcode.index');
    }

    public function export($url)
    {
        QrCode::size(400)
            ->format('svg')
            ->generate($url, public_path('images/qrcode/' . $url . '.svg'));
        return view('qrcode.show', [
            'url' => $url,
            'successMsg' => 'The QR code has been exported successfully!',
        ]);
    }
}
