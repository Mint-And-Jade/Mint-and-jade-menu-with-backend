<?php

use App\Models\Item;
use App\Models\User;
use Inertia\Inertia;
use App\Models\section;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;

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



Route::get('/', function () {
    return Inertia::render('Home',[
        'items' => Item::all(),
        'categories' => Category::all(),
        'sections' => section::all()
    ]);
});

Route::get('/login', [AuthController::class, 'page']);
Route::post('login', [AuthController::class, 'login']);

Route::get('/user', function(){
    User::create([
        'name' => 'admin',
        'email' => 'admin',
        'password' => '123',
    ]);
});

Route::middleware('admin')->group(function() {
    Route::get('/dashboard', function() {
        return Inertia::render('Dashboard', [
            'categories' => Category::all(),
            'items' => Item::all(),
            'sections' => section::all()
        ]);
    });

    Route::post('add/item', [ItemController::class, 'add']);
    Route::patch('/edit/item', [ItemController::class, 'update']);
    Route::delete('item/delete/{id}',[ItemController::class, 'delete']);

    Route::post('category/add', [CategoryController::class, 'add']);
    Route::patch('category/update', [CategoryController::class, 'update']);
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);

    Route::post('section/add', [SectionController::class, 'add']);
    Route::patch('section/update', [SectionController::class, 'update']);
    Route::delete('section/delete/{id}', [SectionController::class, 'delete']);
});

