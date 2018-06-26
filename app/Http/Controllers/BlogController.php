<?php
/**
 * Created by PhpStorm.
 * User: AbrahamFunes
 * Date: 17/10/2017
 * Time: 07:17 PM
 */

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;


class BlogController extends AppBaseController
{
    public function index(Request $request)
    {
        if($request->lang == null) $request->lang = "es";
        
        return redirect()->route('homeByLang', ['lang' => $request->lang]);
    }

    public function indexLang(Request $request)
    {
        \App::setLocale($request->lang);
        
        $category = [];

        if(isset($request['cat'])){
            if(\App::getLocale() == 'es'){
                $legal = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(1)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3);
            }else if(\App::getLocale() == 'en'){
                $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId($request['cat'])->where('category_id', '!=', 4)->where('title_en', '!=', '')->orderBy('id', 'DESC')->simplePaginate(6);
            }else if(\App::getLocale() == 'cn'){
                $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId($request['cat'])->where('category_id', '!=', 4)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->simplePaginate(6);
            }else{
                $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId($request['cat'])->where('category_id', '!=', 4)->orderBy('id', 'DESC')->simplePaginate(6);
            }


            $category = \App\Models\Category::Where("id", $request['cat'])->where('id', '!=', 4)->first();
        }else{
            if(\App::getLocale() == 'en'){
                $leg = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(1)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $fin = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(2)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $cor = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(3)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $eco = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(9)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $fis = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(10)->where('title_en', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
            }else if(\App::getLocale() == 'cn'){
                $leg = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(1)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $fin = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(2)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $cor = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(3)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $eco = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(9)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
                $fis = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(10)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->limit(3)->get();
            }else{
                $leg = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(1)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3)->get();
                $fin = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(2)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3)->get();
                $cor = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(3)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3)->get();
                $eco = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(9)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3)->get();
                $fis = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(10)->where('category_id', '!=', 4)->orderBy('id', 'DESC')->limit(3)->get();
            }

        }

        #dd(\App::getLocale()

        return view('blog.index2')
            ->with('category', $category)
            ->with('leg', $leg)
            ->with('fin', $fin)
            ->with('cor', $cor)
            ->with('eco', $eco)
            ->with('fis', $fis);
    }

    public function GetPost($lang, $category_name, $post_id)
    {
        \App::setLocale($lang);

        $post = Post::with('file')->whereId($post_id)->whereStatusId(1)->first();


        $category = Category::whereStatusId(1)->get()->map(function ($item) use ($category_name) {
            if (str_slug($item->name) === str_slug($category_name)) return $item;
        })->reject(function ($item) {
            return empty($item);
        })->first();

        $posts = Post::whereStatusId(1)
            ->whereNotIn('id', [$post->id])
            ->whereCategoryId($category->id)
            ->orderBy('created_at')
            ->limit(6)
            ->get();

        if (empty($post)) {

            return redirect(route('blog'));
        }

        return view('blog.single')
            ->with('posts', $posts)
            ->with('lang', $lang)
            #->with('recents', $recents)
            ->with('post', $post);
    }

    public function noticias(Request $request){
        \App::setLocale($request->lang);

        $category = [];
        if(\App::getLocale() == 'es'){
            $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(4)->orderBy('id', 'DESC')->simplePaginate(6);
        }else if(\App::getLocale() == 'en'){
            $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(4)->where('title_en', '!=', '')->orderBy('id', 'DESC')->simplePaginate(6);
        }else if(\App::getLocale() == 'cn'){
            $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(4)->where('title_cn', '!=', '')->orderBy('id', 'DESC')->simplePaginate(6);
        }else{
            $posts = \App\Models\Post::with('file')->whereStatusId(1)->whereCategoryId(4)->orderBy('id', 'DESC')->simplePaginate(6);
        }




        return view('noticias.index')
            ->with('category', $category)
            ->with('posts', $posts);
    }

    public function nosotros(Request $request){
        \App::setLocale($request->lang);
        return view('about_us.index');
    }

    public function contacto(Request $request){
        \App::setLocale($request->lang);
        return view('contact.index2');
    }

    public function GetPosts($lang = null, $category_name = null){

        if ($lang == null) return redirect()->guest('/');
        if($lang != 'es' && $lang != 'cn' && $lang != 'en') return redirect()->guest('/');

        \App::setLocale($lang);

        $category = Category::whereStatusId(1)->get()->map(function ($item) use ($category_name) {
            if (str_slug($item->name) === str_slug($category_name)) return $item;
        })->reject(function ($item) {
            return empty($item);
        })->first();


        #dd(\App::getLocale());

        if(isset($category)){
            $posts = Post::whereStatusId(1)->whereCategoryId($category->id)->orderBy('id', 'DESC');

            if($lang == 'es') $posts->where('title', '!=', '');
            if($lang == 'en') $posts->where('title_en', '!=', '');
            if($lang == 'cn') $posts->where('title_cn', '!=', '');

            $posts = $posts->get();

            #dd($posts);

            if(count($posts) > 0)
                return view('blog.category')
                    ->with('category', $category)
                    ->with('posts', $posts);
        }

        return redirect()->guest('/');

    }


}