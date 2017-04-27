<?php

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

//Dashboard
Route::get('/', 'DashboardController@Welcome');

Route::prefix('user')->group(function(){
	Route::get('/index', 'UserController@index');
	Route::post('/index', 'UserController@searchType');
	Route::get('/class_type', 'UserController@show_class');
	Route::get('/class_type', 'UserController@description_class');
	Route::get('/route', 'UserController@index_route');
});

//Auth
Auth::routes();

Route::prefix('member')->group(function(){
	Route::post('/index', 'MemberController@searchType');
	Route::get('/route', 'MemberController@index_route');
	Route::get('/class_type', 'MemberController@show_class');
	Route::get('/class_type', 'MemberController@description_class');
	Route::post('/fill_factors','MemberController@create_factors');
	Route::get('/fill_factors','MemberController@index_factors');
	Route::get('/profile','MemberController@show_factors');
	Route::get('/edit_profile/{id}','MemberController@edit_profile');
	Route::get('/index','MemberController@index');
	Route::post('/update_profile/{id}', 'MemberController@update_profile');
	Route::get('/group','MemberController@index_group');
	
	Route::get('/show_score','FactorsController@sort_scores');
	Route::get('/baye','FactorsController@sort_baye');
});

Route::prefix('admin')->group(function(){
	Route::get ( '/', 'AdminController@index')->name('admin.dashboard');
	Route::get ( '/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post ( '/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::get ( '/add_fitness', 'AdminController@show_add_fitness');
	Route::post ( '/add_fitness', 'AdminController@create_add_fitness');
	Route::get ( '/add_class', 'AdminController@show_add_class');
	Route::post ( '/add_class', 'AdminController@create_add_class');
	Route::get ( '/add_typesports', 'AdminController@show_add_typesports');
	Route::post ( '/add_typesports', 'AdminController@create_add_typesports');
	Route::get ( '/add_workservices', 'AdminController@show_add_workservices');
	Route::post ( '/add_workservices', 'AdminController@create_add_workservices');
	Route::get ( '/add_factors', 'AdminController@show_add_factors');
	Route::post ( '/add_factors', 'AdminController@create_add_factors');
	Route::get ( '/add_comments', 'AdminController@show_add_comments');
	Route::post ( '/add_comments', 'AdminController@create_add_comments');
	Route::get ( '/add_members', 'AdminController@show_add_members');
	Route::post ( '/add_members', 'AdminController@create_add_members');
	Route::get ( '/add_admins', 'AdminController@show_add_admins');
	Route::get ( '/add_fitness_class', 'AdminController@show_add_fitness_class');
	Route::post ( '/add_fitness_class', 'AdminController@create_add_fitness_class');
	Route::get ( '/add_fitness_workservices', 'AdminController@show_add_fitness_workservices');
	Route::post ( '/add_fitness_workservices', 'AdminController@create_add_fitness_workservices');

	Route::get ( '/manage_fitness', 'AdminController@show_manage_fitness');
	Route::get ( '/manage_class', 'AdminController@show_manage_class');
	Route::get ( '/manage_factors', 'AdminController@show_manage_factors');
	Route::get ( '/manage_typesports', 'AdminController@show_manage_typesports');
	Route::get ( '/manage_workservices', 'AdminController@show_manage_workservices');
	Route::get ( '/manage_comments', 'AdminController@show_manage_comments');
	Route::get ( '/manage_members', 'AdminController@show_manage_members');
	Route::get ( '/manage_admins', 'AdminController@show_manage_admins');
	Route::get ( '/manage_fitness_class', 'AdminController@show_manage_fitness_class');
	Route::get ( '/manage_fitness_workservices', 'AdminController@show_manage_fitness_workservices');

	Route::get ( '/edit_fitness/{id}', 'AdminController@edit_fitness_table');
	Route::get ( '/edit_class/{id}', 'AdminController@edit_class_table');
	Route::get ( '/edit_factors/{id}', 'AdminController@edit_factors_table');
	Route::get ( '/edit_typesports/{id}', 'AdminController@edit_typesports_table');
	Route::get ( '/edit_workservices/{id}', 'AdminController@edit_workservices_table');
	Route::get ( '/edit_comments/{id}', 'AdminController@edit_comments_table');
	Route::get ( '/edit_members/{id}', 'AdminController@edit_members_table');
	Route::get ( '/edit_admins/{id}', 'AdminController@edit_admins_table');
	// Route::get ( '/edit_fitness_class/{fitness_id}/{class_id}', 'AdminController@edit_fitness_class_table');


	Route::post ( '/update_fitness/{id}', 'AdminController@update_fitness');
	Route::post ( '/update_typesports/{id}', 'AdminController@update_typesports');
	Route::post ( '/update_workservices/{id}', 'AdminController@update_workservices');
	Route::post ( '/update_class/{id}', 'AdminController@update_class');
	Route::post ( '/update_comments/{id}', 'AdminController@update_comments');
	Route::post ( '/update_factors/{id}', 'AdminController@update_factors');
	Route::post ( '/update_members/{id}', 'AdminController@update_members');
	Route::post ( '/update_admins/{id}', 'AdminController@update_admins');
	// Route::post ( '/update_fitness_class/{fitness_id}/{class_id}', 'AdminController@update_fitness_class');

	Route::get ( '/delete_typesports/{id}', 'AdminController@delete_typesports_table');
	Route::get ( '/delete_fitness/{id}', 'AdminController@delete_fitness_table');
	Route::get ( '/delete_class/{id}', 'AdminController@delete_class_table');
	Route::get ( '/delete_comments/{id}', 'AdminController@delete_comments_table');
	Route::get ( '/delete_workservices/{id}', 'AdminController@delete_workservices_table');
	Route::get ( '/delete_factors/{id}', 'AdminController@delete_factors_table');
	Route::get ( '/delete_members/{id}', 'AdminController@delete_members_table');
	Route::get ( '/delete_admins/{id}', 'AdminController@delete_admins_table');
	Route::get ( '/delete_fitness_class/{fitness_id}/{class_id}', 'AdminController@delete_fitness_class_table');
	Route::get ( '/delete_fitness_workservices/{fitness_id}/{work_id}', 'AdminController@delete_fitness_workservices_table');

});




