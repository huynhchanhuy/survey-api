<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $api = app('Dingo\Api\Routing\Router');

// $api->version('v1', function ($api) {
// 	// $api->get('users/{id}', 'App\Api\V1\Controllers\UserController@show');
// 	$api->get('test', function () {
//         return 'It is ok';
//     });
// });

// $app->get('/', function () use ($app) {
//     return $app->version();
// });

$api = $app->make('Dingo\Api\Routing\Router');
// $api->version(['v1'], function ($api) use ($app) {
//     $api->get('test', function () use ($app, $api) {
//         return [
//             'message' => $app->version(),
//             'status' => 200,
//         ];
//     });
//     // $api->post('/auth/login', 'App\Api\v1\AuthController@postLogin');
//     // $api->get('/auth/invalidate', 'App\Api\v1\AuthController@getInvalidate');
//     // $api->get('/user', ['middleware' => 'api.auth', function () {
//     //     $user = JWTAuth::parseToken()->authenticate();
//     //     return [
//     //         'id' => $user->id,
//     //         'name' => $user->name,
//     //         'email' => $user->email,
//     //     ];
//     // }]);
// });

$api->group([
    'version' => 'v1',
    'namespace' => 'App\Api\V1\Controllers',
], function($api) use ($app)
{
    $api->get('/', function () use ($app, $api) {
        return [
            'message' => $app->version(),
            'status' => 200,
        ];
    });

    // $api->get('collections/{collection}', function(){
    //     return 'test';
    // });
    // $api->get('users', 'UserController@index');
    // $api->get('users/{id}', 'UserController@show');
    $api->get('collections/{collection}', 'CollectionsController@show');
});