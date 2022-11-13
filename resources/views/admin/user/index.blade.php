@extends('admin.layouts.main')

@section('content')
    <div class="col-12">
        <div class="col-2">
            <a href="{{route('admin.users.create')}}"
                    class="btn btn-block bg-gradient-primary btn-lg mb-3">Create new user</a>
        </div>
        <div class="col-8">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th colspan="2">Action</th>
                <th>ID</th>
                <th>Name user</th>
                <th>Date create</th>
                <th>Date update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}">
                            <i class="fas fa-pencil-alt text-success"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('admin.users.delete', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fa fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
