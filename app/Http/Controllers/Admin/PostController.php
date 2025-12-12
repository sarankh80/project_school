<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        // $post = DB::table('posts')->all();
        // $id = 1;
        // $post = Post::where('id',$id)->where('category_id');
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->user_id = auth()->id();
        $post->content = $request->input('content');
        $post->is_active = $request->has('is_active');      
        $post->save();

        // Post::create(
        //     [
        //         'title'=>$request->title,
        //         'slug'=>$request->slug,
        //     ]
        // );

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        // $post->name;
        return view('post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $post->update($request->all());
        return "Post updated successfully!";
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        // ]);

        // $post = Post::findOrFail($id);
        // $post->title = $request->input('title');
        // $post->slug = $request->input('slug');
        // $post->category_id = $request->input('category_id');
        // $post->user_id = auth()->id();
        // $post->content = $request->input('content');
        // $post->is_active = $request->has('is_active');
        // $post->save();
        
        // return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.'); 
    }
}
