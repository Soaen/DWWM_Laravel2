<?php

use App\Http\Controllers\AmazenController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/users/{id}', function(string $id){
    return "Salut utilisateur $id";
});

Route::prefix('/greeting') -> group(function() {
    Route::get('/', function(){
        return 'Salut M2i en get !';
    });
    Route::post('/', function(){
        return 'Salut M2i en post !';
    });
    Route::put('/', function(){
        return 'Salut M2i en put !';
    });
    Route::patch('/', function(){
        return 'Salut M2i en patch !';
    });
    Route::delete('/', function(){
        return 'Salut M2i en delete !';
    });
});

Route::get("/welcome/{lastname}/{firstname}/{premium}", function(string $lastname, string $firstname, string $premium) {

    $premium = filter_var($premium, FILTER_VALIDATE_BOOLEAN);
    return "Bonjour $firstname $lastname. " . ($premium == true ? "Merci d'être abonné à ce site un peu particulier 🔞" : "");

})->where('premium', 'true|false')
  ->name('welcome');

Route::prefix('/auth') -> group(function(){

    Route::post('/register', function(){
        return 'Vous êtes bien inscrit sur ce site bizarre';
    })->name('auth.register');

    Route::post('/login', function(){
        return 'Vous êtes bien connecté sur ce site bizarre';
    })->name('auth.login');

});

Route::get('/blog/home',[BlogController::class, 'home'])->name('blog.index');
Route::get('/blog/new',[BlogController::class, 'newPost'])->name('blog.new');
Route::get('/blog/delete',[BlogController::class, 'deletePost'])->name('blog.delete');
Route::get('/img/{firstname}/{lastname}/{maxSize}',[ImgController::class, "getImage"])
->name('img')
->where('firstname', '[A-Za-z]+')
->where('lastname', '[A-Za-z]+')
->where('maxSize', '[0-9]+');

Route::resource('/post/controller', PostController::class);
Route::resource('/post/amazencontroller', AmazenController::class);
Route::resource('/products', AmazenController::class);
Route::get('/products/advanced-search/specific', [AmazenController::class, 'specificSearch'])->name('products.specific');
Route::get('/products/search/{search}', [AmazenController::class, 'search'])->name('products.search');
Route::get('/products/moy', [AmazenController::class, 'moyenne'])->name('products.moyenne');
