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

Route::get('/', function () {return view('welcome');});


// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/contacts', 'ContactsListController@index')->name('contacts');
// Route::get('/contacts/{id}', 'ContactController@index')->name('contact');

// //$url = route('profile', ['id' => 1]);
// // view single contact

// // make contacts
// // edit contacts
// // delete contacts

// Route::get('/companies', 'CompaniesListController@index')->name('companies');
// Route::get('/companies/{id}', 'CompanyController@index')->name('company');

// Route::view('/{path?}', 'app');