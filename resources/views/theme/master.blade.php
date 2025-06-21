<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    @yield('content')


    @include('partials.footer')

    <script src="{{ asset('theme') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('theme') }}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('theme') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('theme') }}/js/mail-script.js"></script>
    <script src="{{ asset('theme') }}/js/main.js"></script>
</body>

</html>
