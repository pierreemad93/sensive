@extends('theme.master')
@section('content')
    @include('partials.header')
    <main class="site-main">
        @include('partials.bread-crumb', ['title' => $blog->title])
        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main_blog_details">
                            <img class="img-fluid w-100" src="{{ asset('storage/blogs') }}/{{ $blog->image }}" alt="">
                            <br />
                            <a href="#">
                                <h4>{{ $blog->title }}</h4>
                            </a>
                            <div class="user_details">
                                <div class="float-right mt-sm-0 mt-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5>{{ $blog->user->name }}</h5>
                                            <p>{{ $blog->created_at->format('M d,Y') }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <img width="42" height="42" src="img/avatar.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $blog->description }}</p>
                        </div>
                        @if (count($blog->comments) > 0)
                            <div class="comments-area">
                                <h4>{{ count($blog->comments) }} Comments</h4>
                                @foreach ($blog->comments as $comment)
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="{{asset('theme')}}/img/avatar.png" width="50px">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">Emilly Blunt</a></h5>
                                                    <p class="date">{{ $comment->created_at }}</p>
                                                    <p class="comment">
                                                        {{ $comment->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        @endif


                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form action="{{ route('comments.store') }}" method="POST"">
                                @csrf
                                <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"></textarea>
                                </div>
                                <button type="submit" class="button submit_btn">Post Comment</button>
                            </form>
                        </div>
                    </div>

                    @include('partials.sidebar')
                </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection
