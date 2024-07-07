 <!-- partial:partials/_navbar.html -->
 <nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset("admin/assets")}}/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>

      <ul class="navbar-nav w-100">
        <li class="nav-item w-100">
          <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
            <input type="text" class="form-control" placeholder="{{__('message.Search products')}}">
          </form>
        </li>
      </ul>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block">
                @if (session()->get('lang') == 'ar')
                    <a href="{{ url('change/en') }}" class="nav-link btn create-new-button p-3">
                        {{ __('message.English') }}
                    </a>
                @else
                    <a href="{{ url('change/ar') }}" class="nav-link btn create-new-button p-3">
                        {{ __('message.Arabic') }}
                    </a>
                @endif
            </li>


                    <li class="nav-item d-none d-lg-block">
                        <a href="{{route('create_Prodcts')}}" class="nav-link btn btn-success create-new-button">
                        {{__('message.+ Create New Product')}}
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('logout') }}" class="nav-link btn create-new-button" style="width: 100px; text-align: center; background-color: #FF5733; color: white;"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{__('message.Logout')}}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <li class="nav-item d-flex align-items-center">
                        <a href="{{url('dashboard')}}" class="d-flex align-items-center text-decoration-none">
                        <img class="img-xs rounded-circle me-2" src="{{asset("admin/assets")}}/images/faces/face15.jpg" alt="Admin Profile Image">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name text-white">{{__('message.Admin Profile')}}</p>
                        </a>
                    </li>


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
  </nav>