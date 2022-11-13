@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="col-2">
            <a href="{{route('admin.category.create')}}"
                    class="btn btn-block bg-gradient-primary btn-lg mb-3">Create New</a>
        </div>
        <div class="col-8">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Name category</th>
                <th>Date create</th>
                <th>Date update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td><a href="{{route('admin.category.show', $category->id)}}">Show</a></td>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
