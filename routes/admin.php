<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard', 'AuthController@showLoginForm')->name('admin.login');
Route::post('dashboard', 'AuthController@login');


Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.logout');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:admin', 'admin'], 'as' => 'admin.'], function () {

    Route::get('/main', 'DashboardController@index')->name('main');
    Route::resources([
        'roles' => 'RoleController',
        'admins' => 'AdminController',
        'users' => 'UserController',
        'achievements' => 'AchievementController',
        'profiles' => 'ProfileController',
        'administrations' => 'AdministrationController',
        'ideas' => 'IdeaController',
        'policies' => 'PolicyController',
        'media' => 'MediaController',
        'rates' => 'RateController',
        'settings' => 'SettingController',
        'sliders' => 'SliderController',
        'second-sliders' => 'SecondSliderController',
        'donates' => 'DonateController',
        'site-roles' => 'SiteRoleController',
    ]);

    Route::post('active/{id}/role', 'RoleController@active')->name('active.role');
    Route::post('active/{id}/{type}', 'DashboardController@active')->name('active');
    Route::delete('/file/{id}','PolicyController@deleteFile')->name('deleteFile');
});


require __DIR__ . '/auth.php';
