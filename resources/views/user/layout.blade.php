@include('user.head')

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

@include('user.header')

@include('user.slider')
@yield('latest')
{{-- @include('user.body') --}}

@include('user.footer')