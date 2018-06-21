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

/** @var \Dingo\Api\Routing\Router $api */
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->post('pet', 'App\Http\Controllers\Api\PetController@store');
    $api->put('pet', 'App\Http\Controllers\Api\PetController@update');
    $api->get('pet/findByTags', 'App\Http\Controllers\Api\PetController@findByTags');
    $api->get('pet/{petId}', 'App\Http\Controllers\Api\PetController@get');
    $api->post('pet/{petId}', 'App\Http\Controllers\Api\PetController@updateByPetId');
    $api->delete('pet/{petId}', 'App\Http\Controllers\Api\PetController@delete');
    $api->post('pet/{petId}/uploadImage', 'App\Http\Controllers\Api\PetController@uploadImageForPet');

    $api->post('store/order', 'App\Http\Controllers\Api\\StoreController@get');
    $api->post('store/order/{orderId}', 'App\Http\Controllers\Api\\StoreController@get');
    $api->delete('store/order/{orderId', 'App\Http\Controllers\Api\\StoreController@get');
});

Route::get('/', function () {
    return view('welcome');
});
