<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Post;
use App\Http\Requests\FormPostRequest;
use App\Category;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts');
    }

    public function table(Request $request)
    {
        $datatables = new DataTables;
        $post = DB::table('posts')->select('posts.*', 'users.name as name')->join('users', 'users.id', '=', 'posts.user_id');

        return $datatables->queryBuilder($post)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request_type = 'posts.store';
        $category = Category::all();
        return view('admin.post_form', compact('request_type', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormPostRequest $request)
    {
        $title = $request->get('title');
        $post = new Post;
        $post->title = $title;
        $post->content = $request->get('editor');
        $post->status = $request->get('status');
        $post->category_id = $request->get('category');
        $post->subtitle = $request->get('subtitle');
        $post->image_link = $request->get('image_link');
        $post->user_id = auth()->user()->id;
        $post->pointer = str_replace(' ', '-', strtolower($title));
        $post->save();
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_type = 'post.update';
        $post = Post::find($id);
        $category = Category::all();
        return view('admin.post_form_edit', compact('request_type', 'id', 'post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->get('title');
        $post = Post::find($id);
        $post->title = $title;
        $post->content = $request->get('editor');
        $post->status = $request->get('status');
        $post->category_id = $request->get('category');
        $post->subtitle = $request->get('subtitle');
        $post->image_link = $request->get('image_link');
        $post->user_id = auth()->user()->id;
        $post->pointer = str_replace(' ', '-', strtolower($title));
        $post->save();

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/admin/posts');
    }
}
