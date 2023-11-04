<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('post', ['post' => $post]);
    }

    public function add()
    {
        return view('post-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts',
            'content' => 'required',
            'image' => 'mimes:jpg,bmp,png',
        ], [
            'title.required' => 'Title harus diisi!',
            'content.required' => 'Content harus diisi!',
        ]);

        $newName = '';

        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;

            // menyimpan gambar ke dir image
            $request->file('image')->storeAs('image', $newName);
        }

        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newName,
        ]);

        $post->save();

        return redirect('post')->with('status', 'Post berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post-edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,bmp,png',
        ], [
            'title.required' => 'Title harus diisi!',
            'content.required' => 'Content harus diisi!',
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $newName = $request->title . '-' .now()->timestamp . '.' . $extension;

            // menyimpan gambar ke direktori penyimpanan image
            $image->storeAs('image', $newName);
            $post->image = $newName;
        }

        $post->save();

        return redirect('post')->with('status', 'Post Sukses Diubah');

    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        return redirect('post')->with('status', 'Post berhasil dihapus');
    }

}
