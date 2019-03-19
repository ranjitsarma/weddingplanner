<?php
use Illuminate\Http\Request;
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('changePassword', 'API\UserController@changePassword');

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');

});
Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});