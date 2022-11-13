@extends('layouts.main')

@section('content')
    <main class="blog-grid-page">
        <div class="container">
            <h1 class="oleez-page-title wow fadeInUp">{{$category->title}}</h1>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <div class="blog-post-card wow fadeInUp">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{Storage::url($post->image)}}" alt="blog">
                            </div>
                            <div class="d-flex justify-content-between blog-post-date">
                                {{$post->DateToPost}}
                                <form action="{{route('blog.liked.store', $post->id)}}" method="post">
                                    @csrf
                                    <button type="submit" name='like' style="background:transparent; border:0">
                                        @auth()

                                            @if(auth()->user()->GetLikedPosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif

                                        @endauth
                                    </button>
                                </form>
                                @guest()
                                    <div class="row mx-2">
                                        <i class="far fa-heart mx-2"></i>{{$post->likes->count()}}
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('blog.show', $post->id)}}">
                                <h5 class="blog-post-title">{{$post->title}}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 pb-5 mb-5">
                    <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
                        <a href="#!" class="active">01</a>
                        <a href="#!">02</a>
                        <a href="#!">03</a>
                        <a href="#!" class="next">&rarr;</a>
                    </nav>
                </div>

            </div>
        </div>
    </main>
@endsection
