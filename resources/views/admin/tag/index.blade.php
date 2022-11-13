@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="col-2">
            <a href="{{route('admin.tags.create')}}"
                    class="btn btn-block bg-gradient-primary btn-lg mb-3">Create New</a>
        </div>
        <div class="col-8">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Name Tag</th>
                <th>Date create</th>
                <th>Date update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><a href="{{route('admin.tags.show', $tag->id)}}">Show</a></td>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>{{$tag->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
