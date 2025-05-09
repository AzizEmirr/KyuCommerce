<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OdemeController;

Route::group(['prefix'=>'odeme'],function (){
  
    Route::post('/bildirim','OdemeController@bildirim'); 

    // Bu örnekteki bildirim url: https://www.siteadiniz.com/odeme/bildirim



    // Diğer yol:
    // Sadece ödeme alacak ve başka bir işlem yaptıramyacaksanız Public içinde bildirim.php diye dosya atıp bildirim url yi https://www.siteadiniz.com/bildirim.php diye girebilirsiniz.



    // ÖNEMLİ NOT !!!!! 

    // Bildirim url ve sitenizin urlsindeki www https - http bilgilerinin doğru olduğuna emin olun.

});



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
