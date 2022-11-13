@extends('admin.layouts.main')

@section('title')
    Create a new tag
    @endsection

@section('content')

    <div class="card-body">
        <form action="{{route('admin.tags.store')}}" method="post">
            @csrf
            <input class="form-control col-6" name="title" type="text" placeholder="Type name new tag">
            <div class="pt-4">
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg col-2">Create</button>
            </div>

        </form>
    </div>

@endsection
