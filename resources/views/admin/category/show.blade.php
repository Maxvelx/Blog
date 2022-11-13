@extends('admin.layouts.main')

@section('title')
    That is category: {{$category->title}}
@endsection

@section('content')

    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th colspan="2">Action</th>
            <th>ID</th>
            <th>Name category</th>
            <th>Date create</th>
            <th>Date update</th>
        </tr>
        </thead>
        <tbody>
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>
                <a href="{{route('admin.category.edit', $category->id)}}">
                    <i class="fas fa-pencil-alt text-success"></i>
                </a>
            </td>
            <td>
                <form action="{{route('admin.category.delete', $category->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="fa fa-trash text-danger" role="button"></i>
                    </button>
                </form>
            </td>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
        </tr>
        </tbody>
    </table>

@endsection
