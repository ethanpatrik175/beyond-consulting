<div class="side-menu-area">
    <div class="header-logo">
        <a href="{{route('front.welcome')}}">
            <img src="{{ asset('assets/frontend/images/logo.png') }}" alt="logo">
        </a>
    </div>
    <div class="side-menu">
        <ul>
            <li><a href="{{route('front.welcome')}}" class="@if(Route::is('front.welcome')) {{ 'active' }} @endif"><i class="fa-solid fa-house"></i></a></li>
            <li><a href="{{route('front.blogs')}}" class="@if(Route::is('front.blogs')) {{ 'active' }} @endif"><i class="fa-solid fa-blog"></i></a></li>
            <li><a href="{{route('front.view.events')}}" class="@if(Route::is('front.view.events')) {{ 'active' }} @endif"><i class="fa-solid fa-calendar"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-fire-flame-curved"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-compass"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-heart"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-clock"></i></a></li>
        </ul>
        <ul>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-bell"></i></a></li>
            <li><a href="javascript:void(0);"><i class="fa-solid fa-gear"></i></a></li>                    
            @auth()
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @else
                <li class="flipped"><a href="javascript:void(0);"><i class="fa-solid fa-right-from-bracket"></i></a></li>
            @endauth
        </ul>
        <ul>
            <li><a href="{{route('front.about.us')}}" class="@if(Route::is('front.about.us')) {{ 'active' }} @endif"><i class="fa-solid fa-info"></i></a></li>
        </ul>
    </div>
</div>