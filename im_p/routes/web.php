<?php


Route::get('/',function(){
	return redirect()->to('login');
});
Auth::routes();

Route::get('/home',function(){
  return redirect()->route('user-location.index');
})->middleware('auth');

//authorization

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


//User Location
Route::resource('user-location','UserLocationController');
Route::get('view-user-location-information/{id}','UserLocationController@show');
Route::get('user-location-edit/{id}','UserLocationController@edit');
Route::get('delete-user-location/{id}','UserLocationController@destroy');
Route::post('user-location-update/{id}','UserLocationController@update'); 

//my location 
Route::get('my-location','UserLocationController@my_location');

//report 

Route::get('all-users-location-report','UserLocationController@all_report');





