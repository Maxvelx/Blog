@extends('personal.layouts.main')

@section('content')

    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$data['CommentsCount']}}</h3>

                    <p>Comments</p>
                </div>
                <div class="icon">
                    <i class="ion fa-solid fa-list"></i>
                </div>
                <a href="{{route('personal.comments.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$data['LikedCount']}}</h3>

                    <p>Liked Posts</p>
                </div>
                <div class="icon">
                    <i class="ion fa-brands fa-hive"></i>
                </div>
                <a href="{{route('personal.likes.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection

@
