@extends('admin.layouts.main')

@section('title')
    Update this user: {{$users->name}}
@endsection

@section('content')

    <div class="card-body">
        <form action="{{route('admin.users.update', $users->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name User</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{$users->name }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $users->email }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>

                <div class="col-md-6">
                    <select id="role" name="role" class="custom-select">
                        @foreach($roles as $id => $role)
                            <option {{$id === $users->role ? 'selected' : ''}}
                                    value="{{$id}}">{{$role}}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
         <input type="hidden" name="user_id" value="{{$users->id}}">
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

@endsection
