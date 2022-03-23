<?php

use Illuminate\Support\Facades\Route;


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
Route::get('/login', 'Auth\AuthController@index')->name('login-view');

Route::post('/login', 'Auth\AuthController@loginUser')->name('login-user');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/register', 'Auth\AuthController@userRegisterView')->name('register-view');

    Route::post('/register', 'Auth\AuthController@userRegister')->name('user-register');

    Route::get('/user-list', 'Auth\AuthController@userList')->name('user-list');

    Route::get('/logout', 'Auth\AuthController@logoutUser')->name('logout-user');
    
    Route::get('/', 'Test\WelcomeController@showWelcomeView')->name('welcome-view');
    
    Route::get('/todo/create', 'Todo\TodoController@showCreateView')->name('todo-create-view');
    
    Route::post('/todo/create', 'Todo\TodoController@createTodo')->name('todo-create');
    
    Route::get('/todo/list', 'Todo\TodoController@showTodoList')->name('todo-list-view');
    
    Route::get('/todo/update/{id}', 'Todo\TodoController@updateTodoView')->name('todo-update-view');
    
    Route::post('/todo/update', 'Todo\TodoController@updateTodo')->name('todo-update');
    
    Route::get('/todo/delete/{id}', 'Todo\TodoController@deleteTodo')->name('todo-delete');
});

Route::get('/role', 'Auth\AuthController@role')->name('role-create');

Route::get('/user-role-list', 'Auth\AuthController@userRoleList')->name('user-role-list');

Route::get('send-mail', function () {
    \Mail::to('chitsusuhlaing206974@gmail.com')->send(new \App\Mail\MyTestMail());
    return 'Sent Success';
});
