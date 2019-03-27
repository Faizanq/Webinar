<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['namespace' => 'Api'], function() {

	Route::post('login', 'LoginController@login');
	Route::post('registration', 'LoginController@register');
	Route::get('country', 'LocationController@country');
	Route::post('state', 'LocationController@state');
	Route::post('city', 'LocationController@city');
    Route::get('tags', 'TagController@index');
    Route::get('user-type', 'UserTypeController@index');
    Route::get('subject', 'ContactUsController@index');
    Route::post('contact-us', 'ContactUsController@contactUs');
    Route::post('forgot-password', 'LoginController@resetPassword');
    Route::get('speaker', 'SpeakerController@index');
    Route::get('speaker/{id}', 'SpeakerController@detail');
    Route::get('company', 'CompanyController@index');
    Route::get('company/{id}', 'CompanyController@detail');
    Route::get('webinar', 'WebinarController@index');
    Route::get('webinar/archived', 'ArchiveWebinarController@index');
    Route::get('webinar/live', 'LiveWebinarController@index');
    Route::get('webinar/self-study', 'SelfStudyWebinarController@index');
     /*Commented by faizan by 26-march-2019*/
    // Route::get('series', 'SeriesController@index');
	/*end*/



    /*Add by faizan by 26-march-2019*/
    Route::prefix('contact-us')->group(function () {
        Route::get('info', 'ContactUsController@GetInfo');
        Route::post('query', 'ContactUsController@PostQuery');

        Route::group(['middleware' => 'users-api'],function () {
            Route::post('review', 'ContactUsController@PostFeedback');
    });

    });

    Route::prefix('cms')->group(function () {
        Route::get('faq', 'GeneralController@GetFaq');
        Route::get('privacy_policy', 'GeneralController@GetPrivacyPolicy');
        Route::get('terms_condition', 'GeneralController@GetTermsCondition');
    
    });

    /*end*/


	
	Route::group(['middleware' => 'users-api'], function () {
        Route::post('logout', 'LoginController@logout');
        Route::post('change-password', 'LoginController@changePassword');
        Route::get('view-profile', 'ProfileController@viewProfile');
        Route::post('edit-profile', 'ProfileController@editProfile');
        Route::post('speaker/follow/{id}', 'SpeakerController@followUnfollow');
        Route::post('speaker/unfollow/{id}', 'SpeakerController@followUnfollow');
		Route::post('speaker/my-favorite', 'SpeakerController@myFavorite');
		Route::post('company/my-favorite', 'CompanyController@myFavorite');
        Route::post('webinar/my-favorite', 'WebinarController@myFavorite');
		Route::post('speaker/like/{id}', 'SpeakerController@likeDislike');
        Route::post('speaker/dislike/{id}', 'SpeakerController@likeDislike');
        Route::post('webinar/like-dislike', 'WebinarController@likeDislike');
        Route::post('webinar/dislike', 'WebinarController@likeDislike');
        Route::post('company/like/{id}', 'CompanyController@likeDislike');
        Route::post('company/dislike/{id}', 'CompanyController@likeDislike');
	});
});
