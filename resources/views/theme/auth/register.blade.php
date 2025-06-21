@extends('theme.master')
@section('content')
    @include('partials.header')
    <main class="site-main">
        @include('partials.bread-crumb', ['title' => 'Register'])
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('register') }}" method="POST"" class="form-contact contact_form">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border" name="name" type="text"
                                            placeholder="Enter your name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border" name="email" type="email"
                                            placeholder="Enter email address">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border" name="password" type="password"
                                            placeholder="Enter your password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border" name="password_confirmation" type="password"
                                            placeholder="Enter your password confirmation">
                                        <x-input-error :messages="$errors->get('password-confrimation')" class="mt-2" />
                                    </div>
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
