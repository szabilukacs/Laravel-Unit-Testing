<?php

use App\Http\Controllers\AppStatusController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\WorkSpaceController;
use App\Http\Controllers\WorkspaceInvitationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::group(['prefix' => 'workspaceinvitations/', 'middleware' => 'auth'],
    function () {
        Route::get('{workspaceid}', [WorkspaceController::class, 'invitations'])
            ->name('workspace.invitations');
        Route::get('{workspaceid}/create', [WorkspaceInvitationController::class, 'create'])
            ->name('workspaceinvitations.create');
        Route::post('{workspaceid}', [WorkspaceInvitationController::class, 'store'])
            ->name('workspaceinvitations.store');
    });

Route::resource('workspace', WorkSpaceController::class)
    ->middleware('auth');

Route::post('appstatus/addProgram/{id}',[AppStatusController::class,'addProgram'])
    ->middleware('auth')
    ->name('appstatus.addProgram');
Route::resource('appstatus', AppStatusController::class)
    ->middleware('auth');


Route::post('qrcode', [QrCodeController::class, 'generate'])
    ->name('qrcode.index');
Route::get('qrcode', [QrCodeController::class, 'index'])
    ->name('qrcode.show');
Route::get('qrcode/export/{url}', [QrCodeController::class, 'export'])
    ->name('qrcode.export');
