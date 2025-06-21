@extends('theme.master')
@section('content')
    @include('partials.header')
    <main class="site-main">
        @include('partials.bread-crumb', ['title' => 'Edit Blog'])
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('blog.update', $blog) }}" method="POST"" class="form-contact contact_form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <input class="form-control border" name="image" type="file">
                                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                        </div>
                                        <div class="col-6 form-group">
                                            <img src="{{ asset('storage/blogs') }}/{{ $blog->image }}" />
                                        </div>
                                    </div>


                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border" name="title" value="{{ $blog->title }}"
                                            type="text" placeholder="Enter your title">
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control border" name="category">
                                            @if (count($categories) > 0)
                                                @foreach ($categories as $index => $category)
                                                    <option value="{{ $index }}" @selected($index == $blog->category_id)>
                                                        {{ $category }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <textarea class="w-100 border" name="description" rows="10">
                                        {{ $blog->description }}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
