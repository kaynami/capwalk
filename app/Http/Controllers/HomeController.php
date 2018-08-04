<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Utilities\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = DB::table('posts')
        ->select('posts.*', 'users.name as name')
        ->where('status', 1);

        if ($request->get('cat')) {
            $posts = $posts->where('posts.category_id', $request->get('cat'));
        }
        if ($request->get('keyword')) {
            $posts = $posts->whereRaw('UPPER( posts.title ) LIKE \'%'.strtoupper($request->get('keyword').'%\''));
        }
        $posts = $posts->join('users', 'users.id', '=', 'posts.user_id')
        ->orderBy('created_at', 'desc')
        ->paginate(8);

        
        return view('home', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function post(Request $request)
    {
        return view('post');
    }
}
