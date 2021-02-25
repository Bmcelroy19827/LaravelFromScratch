<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;

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





// Laravels container - stored in App\Providers\AppServiceProvider
// app()->bind('App\Models\Example', function () {
//     //fetch $foo from config >> services.php
//     $foo = config('services.foo');
//     $collaborator = new \App\Models\Collaborator();
//     return new \App\Models\Example($collaborator, $foo);
// });

use App\Http\Controllers\PaymentsController;
Route::get('payments/create', [PaymentsController::class, 'create'])->middleware('auth');
Route::post('payments/create', [PaymentsController::class, 'store'])->middleware('auth');

use App\Http\Controllers\UserNotificationsController;
Route::get('notifications', [UserNotificationsController::class, 'show'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->middleware('auth');

//Route::get('/',  function(App\Models\Example $example){ //Just ask for it  // function () {

    // //$container = new \App\Models\Container();

    // //$container->bind('example', function () {
    // //    return new \App\Models\Example();
    // //});

    // //$example = $container->resolve('example');

    // //$example->go();

    //$example = resolve('example');

    //$example = resolve(App\Models\Example::class);

  //  ddd($example);


   // return view('welcome');
//});


Route::get('/test', function () {

    // Query string
    $name = request('name');

    return view('test', [
        'name' => $name
    ]);
});

//Wildcard
/*
Route::get('/posts/{post}', function ($post) {

    $posts = [
        'my-first-post' => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];

    // Check to see if it exists
    if(! array_key_exists($post, $posts)){
        abort(404, 'Sorry, that post was not found.');
    }

    return view('post', [
        //'post' => $posts[$post]  ?? 'Nothing here yet'
        'post' => $posts[$post]
    ]);
});
*/
Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/about', function () {

    return view('about', [
        'articles' =>  App\Models\Article::latest()->take(3)->get()
    ]);
});

use App\Http\Controllers\ArticlesController;
Route::post('/article/test/{article}', [ArticlesController::class, 'test_policy']);

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles.index');// Named Route
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/articles/create', [ArticlesController::class, 'create']);

// using the 'can' middleware very similar to the blade directive with can followed by 
// a semicolon and the name of the policy function, and then the second argument in this case is what is passed into the route
// This is an alternative to putting the authorization in the controller action
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show')->middleware('can:view, article'); 

Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles/{article}', [ArticlesController::class, 'update']);


// REST
// GET, POST, PUT, DELETE

// GET /articles 
// GET /articles/:id 
// POST /articles
// PUT /articles/:id
// DELETE /articles/:id/
