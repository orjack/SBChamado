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

Auth::routes();
Route::get('/profile', ['as'=>'profile', 'uses'=> 'UserController@profile']);
Route::post('/profile',  ['as'=>'profile', 'uses'=> 'UserController@update_avatar']);
Route::get('/', 'HomeController@index')->name('home');
    
Route::get('/analista/modal', ['as'=>'modal', 'uses' =>'HomeController@modal']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/chamado', ['as'=>'ticket', 'uses'=> 'Ticket\TicketController@index']);
    Route::get('/chamado/add', [
      'as'=>'ticket.add', 'uses'=>'Ticket\TicketController@add']);
    Route::post('/chamado/save', [
      'as'=>'ticket.save', 'uses'=>'Ticket\TicketController@save']);
    Route::get('/chamado/edit/{id}', [
      'as'=>'ticket.edit', 'uses'=>'Ticket\TicketController@edit']);
    Route::put('/chamado/update/{id}', [
      'as'=>'ticket.update', 'uses'=>'Ticket\TicketController@update']);
    Route::get('/chamado/delete/{id}', [
      'as'=>'ticket.delete', 'uses'=>'Ticket\TicketController@delete']);
});

Route::group(['middleware'=>'auth'], function(){
  Route::get('/analista', [
    'as'=>'analyst', 'uses'=> 'Ticket\AnalystController@index']);
  Route::get('/analista/add', [
    'as'=>'analyst.add', 'uses'=>'Ticket\AnalystController@add']);
  Route::post('/analista/save', [
    'as'=>'analyst.save', 'uses'=>'Ticket\AnalystController@save']);
  Route::get('/analista/edit/{id}', [
    'as'=>'analyst.edit', 'uses'=>'Ticket\AnalystController@edit']);
  Route::put('/analista/update/{id}', [
    'as'=>'analyst.update', 'uses'=>'Ticket\AnalystController@update']);
  Route::get('/analista/delete/{id}', [
    'as'=>'analyst.delete', 'uses'=>'Ticket\AnalystController@delete']);
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/cliente', ['as'=>'client', 'uses'=> 'Ticket\ClientController@index']);
    Route::get('/cliente/add', [
      'as'=>'client.add', 'uses'=>'Ticket\ClientController@add']);
    Route::post('/cliente/save', [
      'as'=>'client.save', 'uses'=>'Ticket\ClientController@save']);
    Route::get('/cliente/edit/{id}', [
      'as'=>'client.edit', 'uses'=>'Ticket\ClientController@edit']);
    Route::put('/cliente/update/{id}', [
      'as'=>'client.update', 'uses'=>'Ticket\ClientController@update']);
    Route::get('/cliente/delete/{id}', [
      'as'=>'client.delete', 'uses'=>'Ticket\ClientController@delete']);
});
