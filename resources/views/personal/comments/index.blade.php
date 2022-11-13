@extends('personal.layouts.main')

@section('content')
    <div class="col-8">
        <table class="table table-bordered table-hover">
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
            @foreach($comments as $comment)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td class="text-center">
                        <form action="{{route('personal.comments.delete', $comment)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{route('personal.comments.edit', $comment)}}">
                            <i class="fas fa-pencil-alt text-success" role="button"></i></a>
                    </td>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->message}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>{{$comment->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
