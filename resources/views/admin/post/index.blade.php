@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="col-2">
            <a href="{{route('admin.posts.create')}}"
               class="btn btn-block bg-gradient-primary btn-lg mb-3">Create New</a>
        </div>
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th colspan="2">Action</th>
                    <th>ID</th>
                    <th>Name Post</th>
                    <th>Category</th>
                    <th>Date create</th>
                    <th>Date update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}">
                                <i class="fas fa-pencil-alt text-success"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('admin.posts.delete', $post->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fa fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                        </td>
                        {{--                    <td><a href="{{route('admin.posts.show', $post->id)}}">Show</a></td>--}}
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            @foreach($categories as $category)
                                {{$post->category_id === $category->id ? $category->title : false}}
                            @endforeach
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
