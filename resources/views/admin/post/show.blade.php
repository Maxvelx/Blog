@extends('admin.layouts.main')

@section('title')
    That is post: {{$posts->title}}
@endsection

@section('content')

    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th colspan="2">Action</th>
            <th>ID</th>
            <th>Name post</th>
            <th>Date create</th>
            <th>Date update</th>
        </tr>
        </thead>
        <tbody>
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>
                <a href="{{route('admin.posts.edit', $posts->id)}}">
                    <i class="fas fa-pencil-alt text-success"></i>
                </a>
            </td>
            <td>
                <form action="{{route('admin.posts.delete', $posts->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="fa fa-trash text-danger" role="button"></i>
                    </button>
                </form>
            </td>
            <td>{{$posts->id}}</td>
            <td>{{$posts->title}}</td>
            <td>{{$posts->created_at}}</td>
            <td>{{$posts->updated_at}}</td>
        </tr>
        </tbody>
    </table>

@endsection
