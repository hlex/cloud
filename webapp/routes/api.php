<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => ['cors', 'api']],function(){
//   /**
//    **  # MasterConfig APIs Routes
//    **=====================================================================================
//    **
//   */
//     Route::group(['prefix' => 'master', 'namespace' => 'Master'], function(){
//       Route::post('/config', 'MasterConfigFacade@getMasterConfig'); // (validated)
//     });
//   /*
//    *  End of APIs
//    */
// });
