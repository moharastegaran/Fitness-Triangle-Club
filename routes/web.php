<?php

use App\WorkoutProgram;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => false]);

Route::post('/login','Auth\LoginController@login')->name('login');

//panel routes
Route::group(['middleware' => ['auth'], 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

    Route::resource('users', 'UserController')->except([
        'create',
    ]);

    Route::get('order/result/{id}','UserRequestController@orderResult')->name('order.result');
    Route::resource('requests', 'UserRequestController');

    Route::post('order/add/{id}','UserRequestController@addOrder')->name('order.add');

    Route::get('workout-programs/export-pdf/{id}','WorkoutProgramController@exportPDF')->name('workout-programs.export-pdf');
    Route::get('workout-programs/show/{id}','WorkoutProgramController@show')->name('workout-programs.show');
    Route::get('nutrition-programs/export-pdf/{id}','NutritionProgramController@exportPDF')->name('nutrition-programs.export-pdf');
    Route::get('nutrition-programs/show/{id}','NutritionProgramController@show')->name('nutrition-programs.show');

    Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'as' => 'admin.'], function () {

        Route::get('/logout', 'UserController@logout')->name('logout');

        Route::get('workouts/group/{id}','WorkoutController@group')->name('workouts.group');
        Route::resource('workouts', 'WorkoutController');

        Route::put('workout-programs/update/item/{id}', 'WorkoutProgramController@updateItem')->name('workout-programs.update.item');
        Route::delete('workout-programs/destroy/item/{id}', 'WorkoutProgramController@destroyItem')->name('workout-programs.destroy.item');
        Route::resource('workout-programs', 'WorkoutProgramController')->except(['show']);

        Route::get('articles/attachment/download/{blog}', 'ArticleController@downloadAttachment')->name('articles.attachment.download');
        Route::resource('articles', 'ArticleController');

        Route::resource('nutritions', 'NutritionController');

        Route::get('nutrition-programs/ratio', 'NutritionProgramController@getRatio')->name('nutrition-programs.ratio');
        Route::put('nutrition-programs/update/item/{id}', 'NutritionProgramController@updateItem')->name('nutrition-programs.update.item');
        Route::delete('nutrition-programs/destroy/item/{id}', 'NutritionProgramController@destroyItem')->name('nutrition-programs.destroy.item');
        Route::resource('nutrition-programs', 'NutritionProgramController')->except(['show']);
//        Route::resource('diet-programs', 'DietProgramController');

        Route::get('expenses/edit','ExpenseController@edit')->name('expenses.edit');
        Route::put('expenses/update','ExpenseController@update')->name('expenses.update');

    });
});

Route::prefix('attachment')->name("attachment.")->group(function () {
    Route::post('store', 'AttachmentController@store')->name('store');
    Route::delete('destroy/{id}', 'AttachmentController@destroy')->name('destroy');
    Route::put('update/{id}', 'AttachmentController@update')->name('update');
});

//website routes
Route::group(['as' => 'website.'], function () {

    Route::get('/', 'WebsiteController@index')->name('index');
    Route::get('/v', 'WebsiteController@videos')->name('videos');
    Route::get('/articles/all','WebsiteController@articles')->name('articles');
    Route::get('/article/{id}','WebsiteController@article')->name('article');

    Route::get('/users/join','WebsiteController@register')->name('users.join');
    Route::post('/users/store','WebsiteController@store')->name('users.store');

    Route::get('/users/login','WebsiteController@login')->name('users.login');
    Route::post('/users/login','WebsiteController@check')->name('users.check');

    Route::get('/users/logout','WebsiteController@logout')->name('users.logout');
});

/*
Route::get('videos/{id?}', function ($id = null) {
    $query = \App\Category::has("workouts.attachments")->with(['workouts.attachments' => function ($query) {
        $query->where('type', 'video');
    }]);
    if ($id) {
        $query->where('id', $id);
    }
    $query = $query->get();
    $categories = \App\Category::all();
    return view('videos')
        ->with(compact('query'))
        ->with(compact('categories'));
})->name('videos');

Route::prefix('login-member')->name('login-member.')->namespace('Auth')->group(function () {
    Route::get('/', 'LoginController@showLoginForm')->name('view');
    Route::post('check', 'LoginController@login')->name('check');
});

Route::prefix('join-member')->name('join-member.')->group(function () {
    Route::get('/', 'RegisterController@view')->name('view');
    Route::post('store', 'RegisterController@store')->name('store');
});

Route::prefix('admin')->name('admin.')->namespace('Auth')->group(function () {
    Route::get('home', 'AdminController@template')->name('home');
    Route::get('login', 'AdminController@showLoginForm')->name('login.view');
    Route::post('login/check', 'AdminController@check')->name('login.check');
    Route::post('logout', 'AdminController@logout')->name('logout');
    Route::get('users/notifications/markAsReadMembers', 'AdminController@markAsReadMembers')->name('users.notifications.markAsReadMembers');
    Route::get('users/notifications/markAsReadMessages', 'AdminController@markAsReadMessages')->name('users.notifications.markAsReadMessages');
});

Route::prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('show/{user}', 'UserController@show')->name('show');
    Route::delete('destroy/{user}', 'UserController@destroy')->name('destroy');
    Route::delete('destroy/multiple', 'UserController@destroyMultiple')->name('destroy.multiple');
});

Route::post('workout/image/remove', 'WorkoutController@removeImage')->name('workout.image.remove');
Route::delete('workout/destroy/multiple', 'WorkoutController@destroyMultiple')->name('workout.destroy.multiple');
Route::resource('workout', 'WorkoutController');
//
//Route::prefix('attachment')->name("attachment.")->group(function () {
//    Route::post('store', 'AttachmentController@store')->name('store');
//    Route::delete('destroy/{id}', 'AttachmentController@destroy')->name('destroy');
//    Route::put('update/{id}', 'AttachmentController@update')->name('update');
//});

Route::prefix('user')->name('user.')->group(function () {
    Route::put('update/personal/{user}', 'UserController@updatePersonal')->name('update.personal');
    Route::put('update/medical/{user}', 'UserController@updateMedical')->name('update.medical');
    Route::put('update/athletic/{user}', 'UserController@updateAthletic')->name('update.athletic');
    Route::post('medical/upload/attachment', 'UserController@uploadMedicalAttachment')->name('medical.attachment.upload');
    Route::get('medical/download/attachment', 'UserController@downloadMedicalAttachment')->name('medical.attachment.download');
    Route::post('athletic/upload/attachment/image', 'UserController@uploadAthleticImageAttachment')->name('athletic.attachment.image.upload');
    Route::get('athletic/download/attachment/image', 'UserController@downloadAthleticImageAttachment')->name('athletic.attachment.image.download');
    Route::post('athletic/upload/attachment/test', 'UserController@uploadAthleticTestAttachment')->name('athletic.attachment.test.upload');
    Route::get('athletic/download/attachment/test', 'UserController@downloadAthleticTestAttachment')->name('athletic.attachment.test.download');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('{type}', 'BlogController@index')->name('index');
    Route::get('{type}/show', 'BlogController@show')->name('show');
    Route::get('{type}/edit', 'BlogController@edit')->name('edit');
    Route::put('{type}/update', 'BlogController@update')->name('update');
});

Route::post('contact/image/remove', 'ContactController@removeImage')->name('contact.image.remove');
Route::delete('contact/destroy/multiple', 'ContactController@destroyMultiple')->name('contact.destroy.multiple');
Route::get('contact/reply/{id}', 'ReplyController@create')->name('contact.reply');
Route::post('contact/reply/send/{id}', 'ReplyController@send')->name('contact.reply.send');

Route::resource('contact', 'ContactController');
Route::resource('workout_program', 'WorkoutProgramController');
Route::resource('category', 'CategoryController');
Route::resource('nutrition', 'NutritionController');
*/
