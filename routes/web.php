<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('cms/')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login',[AuthController::class, 'showlogin'])->name('view.login');
    Route::post('{guard}/login',[AuthController::class,'login']);
});

Route::get('cms/register',[AuthController::class, 'showRegister'])->name('view.Register');
Route::post('cms/do-register', [AuthController::class,'register']);


Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){
Route::get('cms/admin' , [AuthController::class , 'logout'])->name('cms.logout');
Route::get('edit/profile',[AuthController::class , 'editProfile'])->name('dashboard.profile');
Route::get('edit/password',[SettingController::class ,'editpassword'])->name('cms.auth.editpassword');
Route::post('update/password',[SettingController::class ,'updatepassword']);



});


Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){

    Route::view('/',' cms.parent');
    Route::view('temp',' cms.temp');
    Route::resource('countries', CountryController::class);
    Route::post('countries_update/{id}' , [CountryController::class , 'update'] );
    Route::resource('cities', CityController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('admins',AdminController::class);
    Route::post('admins_update/{id}' , [AdminController::class , 'update'] );
    Route::resource('authors',AuthorController::class);
    Route::post('authors_update/{id}' , [AuthorController::class , 'update'] );
    Route::resource('categories',CategoryController::class);
    Route::post('categories_update/{id}' , [CategoryController::class , 'update'] );
    Route::resource('articles',ArticleController::class);
    Route::post('articles_update/{id}' , [ArticleController::class , 'update'] );
    Route::resource('products',ProductController::class);
    Route::post('products_update/{id}' , [ProductController::class , 'update'] );
    Route::resource('invoices',InvoiceController::class);
    Route::post('invoices_update/{id}' , [InvoiceController::class , 'update'] );
    Route::resource('posts',PostController::class);
    Route::post('posts_update/{id}' , [PostController::class , 'update'] );
    Route::resource('comments',CommentController::class);
    Route::post('comments_update/{id}' , [CommentController::class , 'update'] );
    Route::resource('users',UserController::class);
    Route::resource('profiles',ProfileController::class);

    Route::resource('roles',RoleController::class);
    Route::post('roles_update/{id}' , [RoleController::class , 'update'] );
    Route::resource('permissions',PermissionController::class);
    Route::post('permissions_update/{id}' , [PermissionController::class , 'update'] );
    Route::resource('role.permissions',RolePermissionController::class);


    Route::post('profiles_update/{id}' , [ProfileController::class , 'update'] );
    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');


});
