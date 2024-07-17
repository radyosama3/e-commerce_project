<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="{{route('redirectin')}}"><h2>{{__('message.E_comm')}}<em>{{__('message.erce')}}</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('redirectin')}}">{{__('message.home')}}
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.html">{{__('message.my cart')}}</a>
            </li>
            @if (session()->has('lang')&& session()->get('lang')=="ar")
            <li class="nav-item">
                <a class="nav-link" href="{{url('change/en')}}">الانجليزية</a>
            </li>
            @endif

            @if (session()->has('lang')&& session()->get('lang')=="en")
            <li class="nav-item">
                <a class="nav-link" href="{{url('change/ar')}}">Arabic</a>
            </li>
            @endif
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}">{{__('message.Login')}}</a>
            </li>
            @endguest
            @auth
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{__('message.Logout')}}
                </a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>