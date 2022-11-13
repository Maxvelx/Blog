@extends('personal.layouts.main')

@section('content')
    <div class="col-8">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Action</th>
                <th>ID</th>
                <th>Name post</th>
                <th>Date create</th>
                <th>Date update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($likedPosts as $likedPost)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>
                        <form action="{{route('personal.likes.delete', $likedPost->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{$likedPost->id}}</td>
                    <td>{{$likedPost->title}}</td>
                    <td>{{$likedPost->created_at}}</td>
                    <td>{{$likedPost->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
