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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/webhooks/ric-flair/{api_token}', function(Request $request, $api_token) {

   if ($api_token == config('services.jira.api_token')){

       \Illuminate\Support\Facades\Log::info('GET REQUEST.');

       \Illuminate\Support\Facades\Log::info('JIRA request input: ' . print_r($request->input(), true));

       return response()->json(['yell' => 'WOOOOO!']);

   } else {

       \Illuminate\Support\Facades\Log::error('Invalid API token.');

       return response()->json(['success' => false, 'message' => 'Invalid API token.'], 401);

   }
});

Route::post('/webhooks/ric-flair/{api_token}', function(Request $request, $api_token) {

    if ($api_token == config('services.jira.api_token')){

        \Illuminate\Support\Facades\Log::info('POST REQUEST.');

        \Illuminate\Support\Facades\Log::info('JIRA request input: ' . print_r($request->input(), true));

        return response()->json(['yell' => 'WOOOOO!']);

    } else {

        \Illuminate\Support\Facades\Log::error('Invalid API token.');

        return response()->json(['success' => false, 'message' => 'Invalid API token.'], 401);

    }
});
