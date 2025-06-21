@extends('theme.master')
@section('content')
    @include('partials.header')
    <main class="site-main">
        @include('partials.bread-crumb', ['title' => 'Add Blog'])
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('blog.store') }}" method="POST"" class="form-contact contact_form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border" name="image" type="file">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border" name="title" type="text"
                                            placeholder="Enter your title">
                                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control border" name="category">
                                            @if (count($categories) > 0)
                                                @foreach ($categories as $index => $category)
                                                    <option value="{{ $index }}">{{ $category }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                    </div>

                                </div>
                                <div class="col-12">
                                    <textarea class="w-100 border" name="description" placeholder="Enter your description" rows="10"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
