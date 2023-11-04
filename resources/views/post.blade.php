@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <div class="container">
        <div class="card bg-white">

                <div class="mx-3 my-4">
                    <a href="post-add" class="btn btn-primary">Tambah Posts</a>
                </div>

            <div class="card-body">

                <div class="my-3">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="col-md-1">No.</th>
                            <th class="col-md-3">Title</th>
                            <th class="col-md-3">Content</th>
                            <th class="col-md-3">Image</th>
                            @if(auth()->user()->hasRole('admin'))
                                <th class="col-md-2">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach($post as $post => $value)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->content }}</td>
                            <td>
                                <img src="{{asset('/storage/image/'.$value->image)}}" width="75px" alt="">
                            </td>
                            @if(auth()->user()->hasRole('admin'))
                            <td>
                                <a href="/post-edit/{{$value->id}}" class="btn btn-primary">Edit</a>
                                <a href="/post-destroy/{{$value->id}}" onclick="confirm('Yakin Hapus?')" class="btn btn-danger">Delete</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
