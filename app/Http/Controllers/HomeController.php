<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = \DB::table('posts')->where('status_id',1)->count();
        $data['postsinactivos'] = \DB::table('posts')->where('status_id',2)->count();
        $data['categorias'] = \DB::table('categories')->where('status_id',1)->count();

        return view('home.index')->with('data', $data);
    }
}
