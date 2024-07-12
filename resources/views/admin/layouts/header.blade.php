<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="#!" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            {{-- <img src="{{ asset('/assets/images/logo.png') }}" alt="" class="logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="" class="logo-thumb"> --}}
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            {{-- <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
           --}}
          
        </ul>
        <ul class="navbar-nav ml-auto">
            {{-- @if(auth()->user()->hasPermission('mark-as-read')) --}}
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i> <sup class="text-danger">{{auth()->user()->unreadNotifications->count()}}</sup>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">

                        <ul class="pro-body p-2">
                            @if (auth()->user()->unreadNotifications)
                            <li class="d-flex justify-content-end mx-1 my-2">
                                <a href="{{route('mark-as-read')}}">Mark All as Read</a>
                            </li>
                            @endif
                            @foreach (auth()->user()->unreadNotifications->take(4) as $notification)
                            <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['data']}}</li></a>
                            @endforeach
                            @foreach (auth()->user()->readNotifications->take(4) as $notification)
                            <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['data']}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            {{-- @endif --}}
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{auth()->user()->name}}</span>
                            <a href="#" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            @if(auth()->user()->hasPermission('profile'))
                                <li><a href="{{route('profile')}}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            @endif
                           <li><a href="{{route('logout')}}" class="dropdown-item"><i class="feather icon-lock"></i> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>