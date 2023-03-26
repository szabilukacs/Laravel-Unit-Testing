<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;

class QrCodeControllerTest extends TestCase
{

    public function test_a_qrCode_view_can_be_rendered(): void
    {
        $view = $this->view('qrcode.index');

        $view->assertSee('Generate a QR code');
        $view->assertSee('Simple QR Code');
    }

    public function test_a_qrCode_show_view_can_be_rendered(): void
    {
        $view = $this->view('qrcode.show', ['url' => 'https://ms.sapientia.ro/hu']);

        $view->assertSee('Your QR Code');
    }

    public function test_function_generate_empty_url(): void
    {
        $empyt_url = '';

        $response = $this->post('qrcode', ['url' => $empyt_url]);
        $response->assertStatus(200);
        $response->assertSee('Generate a QR code');
    }

    public function test_function_generate_normal_url(): void
    {
        $url = 'https://ms.sapientia.ro/hu';

        $response = $this->post('qrcode', ['url' => $url]);
        $response->assertStatus(200);
        $response->assertSee('Your QR Code');
    }

    public function test_function_can_export_url(): void
    {
        $url = 'ms.sapientia.ro';

        $response = $this->get('qrcode/export/' . $url);
        $response->assertStatus(200);
        $response->assertSee('The QR code has been exported successfully!');
    }
}
