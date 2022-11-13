@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$data['usersCount']}}</h3>

                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="ion fa-solid fa-users"></i>
                </div>
                <a href="{{route('admin.users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$data['tagsCount']}}<sup style="font-size: 20px"></sup></h3>

                    <p>Tags</p>
                </div>
                <div class="icon">
                    <i class="ion fa-solid fa-tags"></i>
                </div>
                <a href="{{route('admin.tags.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$data['categoriesCount']}}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="ion fa-solid fa-list"></i>
                </div>
                <a href="{{route('admin.category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$data['postsCount']}}</h3>

                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="ion fa-brands fa-hive"></i>
                </div>
                <a href="{{route('admin.posts.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection