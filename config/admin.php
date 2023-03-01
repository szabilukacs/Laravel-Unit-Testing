<?php
/**
 * @author Márton-Illés Krisztián <chriscc@webapix.hu>
 * @copyright Webapix Kft. 2018 All rights reserved.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 * Proprietary and confidential.
 */

return [

    /*
    |----------------------------------------------------------------------------
    | Admin Languages
    |----------------------------------------------------------------------------
    |
    | These are the available languages for Admin management.
    | Leave this empty if you want to use all languages from
    | the laravellocalization package.
    |
    */

    'languages' => [],

    /*
    |--------------------------------------------------------------------------
    | Admin Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Admin will be accessible from. Feel free to
    | change this path to anything you like.
    |
    */

    'path' => '/admin',

    /*
    |--------------------------------------------------------------------------
    | Export configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure the export drivers that are available on the
    | admin panels
    |
    */

    'export' => [
        'drivers' => [
            'csv' => \Webapix\Admin\Export\Drivers\CSV::class,
            'xlsx' => \Webapix\Admin\Export\Drivers\LaravelExcel::class,
            'zip' => \Webapix\Admin\Export\Drivers\Zip::class
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Admin route, giving you the
    | chance to add your own middleware to this stack or override any of
    | the existing middleware. Or, you can just stick with this stack.
    |
    */

    'middleware' => [
        'web',
        'auth',
        'localized',
        'can:accessAdminPanel',
        \Webapix\Admin\Http\Middleware\DispatchServingAdminEvent::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | These images will be used to display a brand logo on the panel.
    |
    */

    'logo' => [
        'normal' => 'images/vendor/admin/logo.png',
        'small' => 'images/vendor/admin/logo-small.png'
    ]
];
