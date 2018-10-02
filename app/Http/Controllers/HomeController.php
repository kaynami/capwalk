<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::select('posts.*', 'users.name as name', 'categories.type')
                     ->where('status', 1);

        if ($request->get('cat')) {
            $posts = $posts->where('posts.category_id', $request->get('cat'));
        }
        if ($request->get('keyword')) {
            $posts = $posts->whereRaw('UPPER( posts.title ) LIKE \'%' . strtoupper($request->get('keyword') . '%\''));
        }

        $posts = $posts->join('users', 'users.id', '=', 'posts.user_id')
                       ->join('categories', 'categories.id', '=', 'posts.category_id')
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

    public function post($category, $pointer)
    {
        $post = Post::select('posts.*', 'users.name as name')
                    ->join('categories', 'categories.id', '=', 'posts.category_id')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    ->where('status', 1)
                    ->where('posts.pointer', 'LIKE', $pointer)
                    ->where('categories.type', 'LIKE', $category)
                    ->get()[0];

        return view('post', compact('post'));
    }

    public function filter($category)
    {
        $posts = Post::select('posts.*', 'users.name as name', 'categories.type')
                     ->where('status', 1)
                     ->where('categories.type', 'LIKE', $category)
                     ->join('users', 'users.id', '=', 'posts.user_id')
                     ->join('categories', 'categories.id', '=', 'posts.category_id')
                     ->orderBy('created_at', 'desc')
                     ->paginate(8);

        return view('home', compact('posts'));
    }
}
