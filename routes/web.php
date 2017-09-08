<?php

use Illuminate\Http\Request;

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
    #$categories = \App\Models\Category::whereStatusId(1)->get();
    #$posts = \App\Models\Post::whereStatusId(1)->orderBy('id', 'DESC')->get();
    #$recents = \App\Models\Post::whereStatusId(1)->orderBy('id', 'DESC')->limit(6)->get();

    $category = [];



    if(isset($request['cat'])) {
        $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId($request['cat'])->orderBy('id', 'DESC')->simplePaginate(6);
        $category = \App\Models\Category::Where("id", $request['cat'])->first();
    }else{
        $posts = \App\Models\Post::with('file')->whereStatusId(1)->orderBy('id', 'DESC')->simplePaginate(6);
    }

    #dd($posts);

    return view('blog.index')
        ->with('category', $category)
        ->with('posts', $posts);
        #->with('recents', $recents);
})->name('blog');

Route::get('/configcache', function() {
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    $exitCode = \Artisan::call('config:cache');
    print_r($exitCode);
});

Route::get('blog/{title_slug}', [
    'uses' => 'PostController@GetPost',
    'as'   => 'blog.getPost',
]);

Route::post('api/posts/index', [
    'uses' => 'PostController@index',
    'as' => 'api.posts.index'
]);

Route::post('api/comments/index', [
    'uses' => 'CommentController@index',
    'as' => 'api.comments.index'
]);

Route::get('/blog_postid/{id}', function ($id) {
    $post = \App\Models\Post::with('file')->where("id", $id)->first();

    return redirect('/blog/' . $post->title_slug);
});

Route::post('comentar', 'CommentController@putComment')->name('comment.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('contacto', function () {

    return view('contact.index');
})->name('contact_us');

Route::post('contacto', function (Request $request) {

    Mail::send('emails.contact', ['user' => "", 'request' => $request], function ($mail) use ($request) {

        $mail->to("info@bc2.mx", "Nombre del correo de contacto")
            ->bcc('elfunes@gmail.com ', 'Funes')
            ->subject("Correo (bc2.mx)");
    });

    alert()->success("Tu mensaje ha sido enviado, nos pondremos en contacto contigo a la brevedad.", 'Gracias')->persistent("Ok");

    return redirect()->route('contact_us');

})->name('contact.post');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('categories', 'CategoryController');

Route::resource('users', 'UserController');

Route::resource('posts', 'PostController');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');