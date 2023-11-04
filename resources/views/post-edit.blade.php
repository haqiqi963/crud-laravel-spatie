@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
        <div class="card bg-white w-50">

            <h1 class="ms-3 mt-4">Edit Data Post</h1>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/post-edit/{{$post->id}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="my-2">
                        <input type="hidden" name="id" class="form-control" value="{{ $post->id }}">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$post->title}}">
                    </div>

                    <div class="my-2">
                        <label for="content" class="form-label">Content</label>
                        <input type="text" name="content" id="content" class="form-control" placeholder="Content" value="{{$post->content}}">
                    </div>

                    <div class="my-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="my-2">
                        <label for="currentImage" class="form-label" style="display: block;">Current Image</label>
                        <img src="{{asset('/storage/image/'.$post->image)}}" width="75px" alt="">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
