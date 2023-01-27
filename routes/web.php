<?php

use App\Http\Controllers\CdataGetController;
use App\Http\Controllers\CdataPostController;
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('home');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'iclock', 'middleware' => \Spatie\HttpLogger\Middlewares\HttpLogger::class], function(){
    Route::get('cdata', [CdataGetController::class, 'index']);
    Route::get('getrequest', [CdataGetController::class, 'getRequest']);
    Route::post('cdata', [CdataPostController::class, 'index']);
    Route::post('devicemd', [CdataPostController::class, 'devicemd']);    
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('password.change', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'showResetForm'])->name('password.change');
    Route::post('password.change', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'reset'])->name('password.change');
    Route::get('password/resetAdmin/{user}', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'resetByAdmin'])->name('password.resetByAdmin');

    Route::group(['prefix' => 'base'], function(){
        Route::resource('import', Base\ImportController::class, ['as' => 'base']);
        Route::resource('export', Base\ExportController::class, ['as' => 'base']);
        Route::resource('roles', Base\RoleController::class, ['as' => 'base', 'middleware' => ['easyauth']]);
        Route::resource('permissions', Base\PermissionController::class, ['as' => 'base','middleware' => ['easyauth']]);
        Route::resource('users', Base\UserController::class, ['as' => 'base','middleware' => ['easyauth']]);
        Route::resource('menus', Base\MenusController::class, ['as' => 'base','middleware' => ['easyauth']]);
    });
    
    Route::resource('devices', DeviceController::class);
    Route::resource('attendanceLogs', AttendanceLogController::class);
    Route::resource('userDevices', UserDeviceController::class);
    Route::resource('commands', CommandController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('templateFingerprintDevices', TemplateFingerprintDeviceController::class);
    Route::resource('webhooks', WebhookController::class);
});


Route::group(['prefix' => 'artisan'], function () {
    Route::get('clear_cache', function(){
        Artisan::call('cache:clear');
    });
});