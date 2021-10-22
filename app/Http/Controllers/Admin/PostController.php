<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $info = Auth::user()->userInfo->address;
        // @dd($info);
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'DESC')->paginate(8);
        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $post = new Post();
        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|string|min:3',
            'content' => 'required|string|min:10',
            'image' => 'string|min:3',
            'category_id' => 'nullable|exists:categories,id'
        ], [
            // 'required' => 'Il campo :attribute è obbligatorio',
            // 'image.required' => 'Immagine necessaria'
        ]);

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = str::slug($post->title, '-');
        $post->user_id = Auth::id();
        $post->save();
        // Post::create($data)
        return redirect()->route('admin.posts.index')->with('alert', 'success')->with('alert-message', "$post->title creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id), 'string', 'min:3'],
            'content' => 'required|string|min:10',
            'image' => 'string|min:3',
        ], [
            // 'required' => 'Il campo :attribute è obbligatorio',
            // 'image.required' => 'Immagine necessaria'
        ]);

        $data = $request->all();
        // $post->fill($data);
        $post->slug = str::slug($post->title, '-');
        $post->user_id = Auth::id();
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('alert', 'info')->with('alert-message', 'Elemento modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert', 'danger')->with('alert-message', "$post->title eliminato con successo");
    }
}
