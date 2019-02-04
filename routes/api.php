<?php

use Illuminate\Http\Request;
use BrainySoft\Allowance_type;

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

Route::group(["middleware" => "api"], function(){

	Route::get('allowance_types', function(){
		return Allowance_type::latest()->orderBy('created_at','desc')->get();
	});

	Route::get('allowance_types/{id}', function($id){
		return Allowance_type::findOrFail($id);
	});


	Route::post('allowance_types/store', function(Request $request){
		return Allowance_type::create(['company_id' => 1,'name' => $request->input(['name']),'description' => $request->input(['description'])]);
	});

	Route::patch('allowance_types/{id}', function(Request $request,$id){
	Allowance_type::findOrFail($id)->update(['company_id' => 1,'name' => $request->input(['name']),'description' => $request->input(['description'])]);
	});


	Route::delete('allowance_types/{id}', function($id){
		return Allowance_type::destroy($id);
	});

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
