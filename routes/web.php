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

//Route::get('/', function (Request $request) {
//
//})->name('blog');

Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);

Route::get('/configcache', function() {
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    $exitCode = \Artisan::call('config:cache');
    print_r($exitCode);
});







Route::post('api/posts/index', [
    'uses' => 'PostController@index',
    'as' => 'api.posts.index'
]);

Route::post('api/news/index', [
    'uses' => 'NewsController@index',
    'as' => 'api.news.index'
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



Route::post('contacto', function (Request $request) {

    Mail::send('emails.contact', ['user' => "", 'request' => $request], function ($mail) use ($request) {

        $mail->to("info@bc2.mx", "Nombre del correo de contacto")
            ->bcc('elfunes@gmail.com ', 'Funes')
            ->subject("Correo (bc2.mx)");
    });

    alert()->success("Tu mensaje ha sido enviado, nos pondremos en contacto contigo a la brevedad.", 'Gracias')->persistent("Ok");

    return redirect()->route('contact_us', ['lang' => $request->lang]);

})->name('contact.post');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('categories', 'CategoryController');

Route::resource('users', 'UserController');

Route::resource('posts', 'PostController');

Route::resource('news', 'NewsController');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

Route::get('/{lang}', [
    'uses' => 'BlogController@indexLang',
    'as' => 'homeByLang'
]);

Route::group(['prefix' => '{lang}'], function ($lang) {


    Route::get('noticias', [
        'uses' => 'BlogController@noticias',
        'as' => 'noticias'
    ]);

    Route::get('contacto', [
        'uses' => 'BlogController@contacto',
        'as' => 'contact_us'
    ]);

    Route::get('nosotros', [
        'uses' => 'BlogController@nosotros',
        'as' => 'about_us'
    ]);

    Route::get('{category_name}', [
        'uses' => 'BlogController@getPosts',
        'as'   => 'categoria',
    ]);

    Route::get('{category_name}/{post_id}', [
        'uses' => 'BlogController@GetPost',
        'as'   => 'blog.getPost',
    ]);
});


