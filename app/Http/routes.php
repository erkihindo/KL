<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Goes to either Student home or Teacher home
Route::get('/', ['uses' => 'HomeController@index', 
    'middleware' => 'auth']);

Route::auth();


Route::get('Shome', ['uses' => 'SHomeController@index',
    'middleware'=>'auth',
    'as' => 'Shome']);


Route::get('Thome', ['uses' => 'THomeController@index',
    'middleware'=>'isAdmin',
    'as' => 'Thome']);


Route::get('Tabout', ['uses' => 'TAboutController@index',
    'middleware'=>'isAdmin',
    'as' => 'Tabout']);

Route::get('Sabout', ['uses' => 'SAboutController@index',
    'middleware'=>'auth',
    'as' => 'Sabout']);

Route::get('Toverall', ['uses' => 'TOverallController@index',
    'middleware'=>'isAdmin',
    'as' => 'Toverall']);

Route::get('Soverall', ['uses' => 'SOverallController@index',
    'middleware'=>'auth',
    'as' => 'Soverall']);

Route::get('Tenter', ['uses' => 'TEnterController@index',
    'middleware'=>'isAdmin',
    'as' => 'Tenter']);

Route::get('Tjudge', ['uses' => 'TJudgeController@index',
    'middleware'=>'isAdmin',
    'as' => 'Tjudge']);

Route::get('TviewUpload/{id}', ['uses' => 'TJudgeController@viewUpload',
    'middleware'=>'isAdmin',
    'as' => 'TviewUpload']);

Route::get('Senter/{id}', ['uses' => 'SEnterController@index',
    'middleware'=>'auth']);

Route::get('Tchange', ['uses' => 'TChangeController@index',
    'middleware'=>'isAdmin',
    'as' => 'Tchange']);

Route::get('Stests', ['uses' => 'STestsController@index',
    'middleware'=>'auth',
    'as' => 'Stests']);

Route::post('/changeText',[
    'uses' => 'THomeController@updateText',
    'as' => 'changeText',
    'middleware' => 'isAdmin'
    
    ]);

Route::post('/enterGrade',[
    'uses' => 'TJudgeController@enterGrade',
    'as' => 'enterGrade',
    'middleware' => 'isAdmin'
    
    ]);

Route::post('/enterComrad',[
    'uses' => 'SEnterController@enterComrad',
    'as' => 'enterComrad',
    'middleware' => 'auth'
    
    ]);

Route::post('/changeGrade',[
    'uses' => 'TChangeController@changeGrade',
    'as' => 'changeGrade',
    'middleware' => 'isAdmin'
    
    ]);


Route::post('/uploadfile',[
    'uses' => 'SEnterController@upload',
    'as' => 'test.save',
    'middleware' => 'auth'
        
        ]);

/*
Route::get('/home', ['uses' => 'HomeController@index',
    'middleware' => 'isAdmin']);*/
