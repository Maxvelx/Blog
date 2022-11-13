@extends('admin.layouts.main')

@section('title')
    That is tag: {{$tags->title}}
@endsection

@section('content')

    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th colspan="2">Action</th>
            <th>ID</th>
            <th>Name tag</th>
            <th>Date create</th>
            <th>Date update</th>
        </tr>
        </thead>
        <tbody>
        <tr data-widget="expandable-table" aria-expanded="false">
            <td>
                <a href="{{route('admin.tags.edit', $tags->id)}}">
                    <i class="fas fa-pencil-alt text-success"></i>
                </a>
            </td>
            <td>
                <form action="{{route('admin.tags.delete', $tags->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="border-0 bg-transparent">
                        <i class="fa fa-trash text-danger" role="button"></i>
                    </button>
                </form>
            </td>
            <td>{{$tags->id}}</td>
            <td>{{$tags->title}}</td>
            <td>{{$tags->created_at}}</td>
            <td>{{$tags->updated_at}}</td>
        </tr>
        </tbody>
    </table>

@endsection
