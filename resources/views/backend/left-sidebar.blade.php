<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('user.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('general.profile') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li class="@if (Route::is('speakers.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('speakers.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Speakers</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('venues.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('venues.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Venues</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('sponsors.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('sponsors.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Sponsors</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('events.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('events.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('blogs.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('blogs.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Blogs</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('tags.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('tags.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('comments.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('comments.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Comments</span>
                        </a>
                    </li>
                    <li class="@if (Route::is('categories.*')) {{ 'mm-active' }} @endif">
                        <a href="{{ route('categories.index') }}" class="waves-effect">
                            <i class="bx bx-menu"></i>
                            <span>Post Categories</span>
                        </a>
                    </li>
                @else
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
