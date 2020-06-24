<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/teams', function () {
	$teams = App\Team::with(['players', 'matches', 'matchesAsTeamA' , 'matchesAsTeamB'])->get();
	return Response::json($teams, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_PRETTY_PRINT);
});

Route::get('/matches', function () {
	$matches = App\Match::with(['teamA', 'teamB'])->get();
	return Response::json($matches, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_PRETTY_PRINT);
});
