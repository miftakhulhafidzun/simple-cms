<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;

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

Route::get('/', function (Request $request) {
    $query = DB::table('kegiatans')->orderBy('date', 'desc');

    // Periksa apakah ada parameter pencarian
    if ($request->has('keyword')) {
        $keyword = $request->input('keyword');
        $query->where('description', 'like', "%$keyword%");
    }

    $kegiatans = $query->get();

    return view('welcome', compact('kegiatans'));
})->name('welcome');

Route::get('/detail/{id}', function ($id) {
    $data = DB::table('kegiatans')->where('id', '=', $id)->first();
    return view('detail_kegiatan', compact('data'));
    // return response()->json($data);
})->name('detail-kegiatan');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::group(['middleware' => ['auth']],function () {
    Route::get('/home', [App\Http\Controllers\KegiatanController::class, 'index'])->name('home');
    Route::resource('kegiatan', KegiatanController::class);
    Route::post('/kegiatan/search', [KegiatanController::class, 'search'])->name('kegiatan.search');
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});
