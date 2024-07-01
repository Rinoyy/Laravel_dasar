<?php
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HelloController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PhotoController;
// use App\Http\Controllers\Contoh;
// use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // echo "welcome";
});

Route::get('/tambah', function() {
   return $user =  \App\Models\Post::find(1);
});

// Route::get('/hello/rino', function() {
//     // namafolder.nama_folder.nama_file
//     return view('hello.rino.index');
// });

// Route::get('hello', 'App\Http\controllers\HelloController@index');
//-----------------Pangil controllers
// Route::get('hello', [Hellocontroller::class, 'index']);
// Route::get('world', [Hellocontroller::class, 'world_message']);
// Route::get('akses', [Contoh::class, 'yes']);
 




Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout' ]);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);

Route::post('posts', [PhotoController::class, 'store']);
Route::get('posts', [PhotoController::class, 'index']);
Route::get('posts/create', [PhotoController::class, 'create']);
Route::get('posts/{id}', [PhotoController::class, 'show']);
Route::get('posts/{id}/edit', [PhotoController::class, 'edit']);
Route::patch('posts/{id}', [PhotoController::class, 'update']);
Route::delete('posts/{id}', [PhotoController::class, 'destroy']);
// Route::get('photoss/tes', [PhotoController::class, 'showPost']);

