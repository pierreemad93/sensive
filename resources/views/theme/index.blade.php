@extends('theme.master')
@section('home', 'active')
@section('content')
    @include('partials.header')

    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->



        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @forelse ($blogs as $blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid w-100" src="{{ asset('storage') }}/blogs/{{ $blog->image }}"
                                        alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                        <li><a href="#">
                                                <i class="ti-notepad"></i>{{ $blog->created_at->format('M d,Y') }}</a></li>
                                        <li><a href="#"><i
                                                    class="ti-themify-favicon"></i>{{ count($blog->comments) }}
                                                Comments</a></li>
                                        @if (Auth::user()->id === $blog->user_id)
                                            <li class="nav-item submenu dropdown">
                                                <a href="#" class="nav-link dropdown-toggle"
                                                    data-toggle="dropdown">control</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('blog.edit', $blog) }}">edit</a>
                                                    </li>

                                                    <form action="{{ route('blog.destroy', $blog) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li class="nav-item">
                                                            <a class="nav-link"
                                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                delete
                                                            </a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="{{ route('blog.show', $blog) }}">
                                        <h3>{{ $blog->title }}</h3>
                                    </a>
                                    <p>{{ $blog->description }}</p>
                                    <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @empty
                            <p>no posts</p>
                        @endforelse

                        {{-- Paginate --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a href="#" class="page-link" aria-label="Previous">
                                                <span aria-hidden="true">
                                                    <i class="ti-angle-left"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item">
                                            <a href="#" class="page-link" aria-label="Next">
                                                <span aria-hidden="true">
                                                    <i class="ti-angle-right"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    @include('partials.sidebar')
                </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection
