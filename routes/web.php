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

// 一般ユーザー
Route::group(['middleware' => ['guest']], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // プレビューをした瞬間の設定
    Route::get('/', 'ToppagesController@index')->name('index');
    // ログイン認証系
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('login.post');
    // ユーザ登録系
    Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
    Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
});


// ユーザー認証必要
Route::group(['middleware' => ['auth']], function () {
    
    //ログイン後のリダイレクト先
    Route::get('mypage', function () {
            return view('mypage');
    });
    
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

    // プロフィール関係
    Route::resource('profiles', 'ProfilesController', ['only' => ['index', 'create', 'store', 'show']]);
    
    //　コミュニティ関係
    Route::resource('communities', 'CommunitiesController', ['only' => ['index', 'create', 'store', 'show']]);
    
    // ポスト関係
    Route::resource('posts', 'PostsController');
    
    
     // フレンド申請関係
    Route::resource('friends', 'FriendsController', ['only' => ['index', 'create', 'store', 'update']]); 

    //　コミュニティ申請関係
    Route::group(['prefix' => 'communities/{id}'], function () {
        // 投稿一覧
        Route::resource('participations', 'ParticipationsController', ['only' => ['index', 'create', 'store', 'show', 'update']]);
        // Route::post('approval', 'ParticipationsController@participation_approval');

        //トピック関係
        Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'show','display']]);
        
        // ユーザー関連
        Route::resource('users', 'UsersController', ['only' => ['index', 'create', 'store', 'show']]); 
    });

    
});

