@extends('admin.layouts.main')

@section('title')
    Update this category: {{$category->title}}
@endsection

@section('content')

    <div class="card-body">
        <form action="{{route('admin.category.update', $category->id)}}" method="post">
            @csrf
            @method('patch')
            <input class="form-control col-6" name="title" type="text" value="{{$category->title}}">
            <div class="pt-4">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg col-2">Update</button>
            </div>

        </form>
    </div>

@endsection
