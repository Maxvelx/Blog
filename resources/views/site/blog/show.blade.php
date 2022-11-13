@extends('layouts.main')


@section('content')

    <main class="blog-post-single">
        <div class="container">
            <h1 class="post-title wow fadeInUp">{{$posts->title}}</h1>
            <div class="row">
                <div class="col-md-8 blog-post-wrapper">
                    <div class="post-header wow fadeInUp">
                        <img src="{{Storage::url($posts->image)}}" alt="blog post" class="post-featured-image">
                        <p class="post-date">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$posts->created_at)->format('F j, Y')}}</p>
                    </div>
                    <div class="post-content wow fadeInUp">
                        {!! $posts->content !!}
                    </div>
                    <div class="post-tags wow fadeInUp d-flex justify-content-between">
                        <div>
                        <a href="#!" class="post-tag">Design Studio</a>
                        <a href="#!" class="post-tag">Creative Design</a>
                        </div>
                        <div class="mx-5">
                            <form action="{{route('blog.liked.store', $posts->id)}}" method="post">
                                @csrf
                                <button type="submit" name='like' style="background:transparent; border:0">
                                    @auth()

                                        @if(auth()->user()->GetLikedPosts->contains($posts->id))
                                            This post in you favorite list <i class="fas fa-heart mx-2"></i>
                                        @else
                                            Add to favorite list <i class="far fa-heart mx-2"></i>
                                        @endif

                                    @endauth
                                </button>
                            </form>
                            @guest()
                                <div class="row mx-2">
                                    <span><i class="far fa-heart mx-2"></i>{{$posts->likes->count()}}</span>
                                </div>
                            @endguest
                        </div>
                    </div>
                    <div class="post-navigation wow fadeInUp">

                        <a href="{{isset($prevPost) ? route('blog.show', $prevPost->id) : route('blog.index')}}">
                            <button class="btn prev-post"> Prev Post</button>
                        </a>
                        <a href="{{isset($nextPost) ? route('blog.show', $nextPost->id) : route('blog.index')}}">
                            <button class="btn next-post"> Next Post</button>
                        </a>
                    </div>
                    <section>

                    </section>

                    <div class="comment-section wow fadeInUp">
                        <h5 class="section-title">Comments ({{$posts->comments->count()}})</h5>
                        @foreach($posts->comments as $comment)
                            <div class="comment-text my-4">
                    <span class="username">
                        <div>
                      {{$comment->user->name}}
                        </div>
                      <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                    </span><!-- /.username -->
                                {{$comment->message}}
                            </div>
                            @endforeach

                        @auth()
                        <form action="{{route('blog.comment.store', $posts->id)}}" method="post" class="oleez-comment-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" rows="10" class="oleez-textarea"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit">Send</button>
                                </div>
                            </div>
                        </form>
                        @endauth
                    </div>


                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>

                            <div class="card-tools">
                                <span title="3 New Messages" class="badge badge-primary">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Is this template really for free? That's unbelievable!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        You better believe it!
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Alexander Pierce</span>
                                        <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        Working with AdminLTE on a great new app! Wanna join?
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                                <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Sarah Bullock</span>
                                        <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                    </div>
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    <div class="direct-chat-text">
                                        I would love to.
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->

                            </div>
                            <!--/.direct-chat-messages-->

                            <!-- Contacts are loaded here -->
                            <div class="direct-chat-contacts">
                                <ul class="contacts-list">
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                                <span class="contacts-list-msg">How have you been? I was...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                                                <span class="contacts-list-msg">I will be waiting for...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                                                <span class="contacts-list-msg">I'll call you back at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Where is your new...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Can I take a look at...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                    <li>
                                        <a href="#">
                                            <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                                            <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                                                <span class="contacts-list-msg">Never mind I found...</span>
                                            </div>
                                            <!-- /.contacts-list-info -->
                                        </a>
                                    </li>
                                    <!-- End Contact Item -->
                                </ul>
                                <!-- /.contacts-list -->
                            </div>
                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                    <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Tags</h5>
                        <div class="widget-content">
                            @foreach($posts->tags as $tag)

                                <a href="#!" class="post-tag">{{$tag->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Share</h5>
                        <div class="widget-content">
                            <nav class="social-links">
                                <a href="#!">Fb</a>
                                <a href="#!">Tw</a>
                                <a href="#!">In</a>
                                <a href="#!">Be</a>
                            </nav>
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">More related post in same category</h5>
                        <div class="widget-content">
                            <div class="gallery">
                                @foreach($relatedPost as $post)
                                    <a href="{{route('blog.show', $post->id)}}" class="gallery-grid-item"
                                       data-fancybox="widget-gallery">
                                        <img src="{{Storage::url($post->image)}}" alt="gallery item">
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget wow fadeInUp">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-content">
                            <ul class="category-list">
                                @foreach($categories as $category)
                                    <li><a href="{{route('blog.category.index', $category->id)}}">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
