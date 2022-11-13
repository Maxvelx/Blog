@extends('personal.layouts.main')

@section('title')
    Edit message
@endsection

@section('content')

    <div class="card-body">
        <form action="{{route('personal.comments.update', $comments->id)}}" method="post">
            @csrf
            @method('patch')
            <input class="form-control col-6" name="message" type="text" value="{{$comments->message}}">
            <div class="pt-4">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg col-2">Update</button>
            </div>

        </form>
    </div>

@endsection
