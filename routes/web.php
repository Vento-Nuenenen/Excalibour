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
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::get('/', ['as' => 'public.home',   'uses' => 'AuswertungController@index']);

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity']], function () {

    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'Auth\ActivateController@exceeded']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity']], function () {

    // Activation Routes
    Route::get('/activation-required', ['uses' => 'Auth\ActivateController@activationRequired'])->name('activation-required');
    Route::get('/logout', ['uses' => 'Auth\LoginController@logout'])->name('logout');

    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', ['as' => 'public.home',   'uses' => 'AuswertungController@index']);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@show',
    ]);
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity']], function () {

    // User Profile and Account Routes
    Route::resource(
        'profile',
        'ProfilesController', [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => '{username}',
        'uses' => 'ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'ProfilesController@userProfileAvatar',
    ]);

    Route::get('/tn/points', ['as' => 'user.points',   'uses' => 'PointsControler@index']);
    Route::get('/print/certificate', ['as' => 'user.certificate',   'uses' => 'PrintControler@certificate']);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity']], function () {
    Route::resource('/users/deleted', 'SoftDeletesController', [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', 'UsersManagementController', [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);

    Route::get('exer1/auswertung', 'AuswertungController@e1');
    Route::get('exer2/auswertung', 'AuswertungController@e2');

    Route::get('import/user', 'ImportController@index');
    Route::post('import/user/do', 'ImportController@import')->name('import_user_do');

    Route::get('routes', 'AdminDetailsController@listRoutes');

    Route::get('active-users', 'AdminDetailsController@activeUsers');

    Route::get('exer1/points', 'PointsController@e1');
    Route::get('exer2/points', 'PointsController@e2');
    Route::post('tn/points/add', 'PointsController@add')->name('add_points');
    Route::post('tn/points/delete', 'PointsController@delete');

    Route::get('print/certificate', 'PrintController@index');
    Route::match(['GET', 'POST'], 'print/certificate/do', 'PrintController@certificate')->name('print');

    Route::get('groups', 'GroupController@manage');
    Route::post('groups/add', 'GroupController@add')->name('add_groups');
    Route::post('groups/delete', 'GroupController@delete');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'SuccessController@index')->name('home');
    Route::get('/success', 'SuccessController@index')->name('home');

    Route::any('/participations', 'ParticipationsController@index')->name('participations');
    Route::get('/participations/add', 'ParticipationsController@create')->name('add-participations');
    Route::post('/participations/store', 'ParticipationsController@store')->name('store-participations');
    Route::get('/participations/edit/{uid}', 'ParticipationsController@edit')->name('edit-participations');
    Route::post('/participations/update/{uid}', 'ParticipationsController@update')->name('update-participations');
    Route::get('/participations/destroy/{uid}', 'ParticipationsController@destroy')->name('destroy-participations');

    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/users/add', 'UsersController@create')->name('add-users');
    Route::post('/users/store', 'UsersController@store')->name('store-users');
    Route::get('/users/edit', 'UsersController@edit')->name('edit-users');
    Route::get('/users/destroy', 'UsersController@destroy')->name('destroy-users');

    Route::get('/groups', 'GroupsController@index')->name('groups');
    Route::get('/groups/add', 'GroupsController@create')->name('add-groups');
    Route::post('/groups/store', 'GroupsController@store')->name('store-groups');
    Route::get('/groups/edit/{gid}', 'GroupsController@edit')->name('edit-groups');
    Route::post('/groups/update/{gid}', 'GroupsController@update')->name('update-groups');
    Route::get('/groups/destroy/{gid}', 'GroupsController@destroy')->name('destroy-groups');

    Route::get('/fields', 'FieldsController@index')->name('fields');
    Route::get('/fields/add', 'FieldsController@create')->name('add-fields');
    Route::post('/fields/store', 'FieldsController@store')->name('store-fields');
    Route::get('/fields/edit/{fid}', 'FieldsController@edit')->name('edit-fields');
    Route::post('/fields/update/{fid}', 'FieldsController@update')->name('update-fields');
    Route::get('/fields/destroy/{gid}', 'FieldsController@destroy')->name('destroy-fields');

    Route::get('/info', 'InfoController@index')->name('info');
    Route::get('/info/add', 'InfoController@create')->name('add-info');
    Route::get('/info/edit', 'InfoController@edit')->name('edit-info');
    Route::get('/info/destroy', 'InfoController@destroy')->name('destroy-info');

    Route::get('/gratulation', 'InfoController@index')->name('gratulation');
    Route::get('/gratulation/create', 'InfoController@create')->name('create-gratulation');
});
