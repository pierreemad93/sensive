@extends('theme.master')
@section('content')
    @include('partials.header')
    <main class="site-main">
        @include('partials.bread-crumb', ['title' => 'login'])
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="{{ route('login') }}" class="form-contact contact_form">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border" name="email" type="email"
                                            placeholder="Enter email address">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border" name="password" id="name" type="password"
                                            placeholder="Enter your password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center text-md-left mt-3">
                                <button type="submit" class="button button--active button-contactForm">Login</button>
                                <a href="{{ route('register') }}" class="">Don't Have Account?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
