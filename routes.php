<?php namespace Dondo\ReviewService;

use Route;
use Dondo\ReviewService\Handlers\ReviewServiceHandler;

Route::group(['middleware' => 'RainLab\User\Classes\AuthMiddleware'], function () {
	Route::group(['prefix' => 'review'], function() {
		Route::post('create', [ReviewServiceHandler::class, 'storeReview']);
	});
	Route::group(['prefix' => 'service'], function () {
		Route::post('create', [ReviewServiceHandler::class, 'storeService']);
	});
	//Route::get('get', [ReviewServiceHandler::class, 'getProductById']);
	//Route::put('update/{id}', [ReviewServiceHandler::class, 'updateProduct']);
	//Route::delete('delete/{id}', [ReviewServiceHandler::class, 'deleteProduct']);
});