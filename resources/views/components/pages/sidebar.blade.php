<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/dashboard" class="b-brand">
                <h3 class="logo logo-lg">Cheff Catrin</h3>
                <h6 class="logo logo-sm"> </h6>
            </a>
        </div>
        <div class="navbar-content ps">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Навигация</label>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a @if( auth()->user()->role == '2')
                           href="{{ route('superAdmin.dashboard') }}"
                       @elseif( auth()->user()->role == '1')
                           href="{{ route('admins.dashboard') }}"
                       @endif class="nxl-link">
                        <span class="nxl-micon"><i class="feather-home"></i></span> <!-- Dashboard icon -->
                        <span class="nxl-mtext">Dashboards</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('categories.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-info"></i></span> <!-- About icon -->
                        <span class="nxl-mtext">Category</span>
                    </a>
                </li>
                <li class="nxl-item nxl-hasmenu">
                    <a href="{{ route('products.index') }}" class="nxl-link">
                        <span class="nxl-micon"><i class="feather-briefcase"></i></span> <!-- Products icon -->
                        <span class="nxl-mtext">Products</span>
                    </a>
                </li>


                {{--                @can('admins')--}}
{{--                    <li class="nxl-item nxl-hasmenu">--}}
{{--                        <a href="{{ route('news.index') }}" class="nxl-link">--}}
{{--                            <span class="nxl-micon"><i class="feather-users"></i></span> <!-- Admins icon -->--}}
{{--                            <span class="nxl-mtext">News</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 598px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
</nav>
