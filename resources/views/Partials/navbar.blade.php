<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">{{ $title }}</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        <div class="ico-item">
            <img src="http://placehold.it/80x80" alt="" class="ico-img">
            <ul class="sub-ico-item">
                <li><a href="#">Settings</a></li>
                <li><a href="#">Blog</a></li>
                <li><a
                        href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
            <!-- /.sub-ico-item -->
        </div>
        <!-- /.ico-item -->
    </div>
    <!-- /.pull-right -->
</div>
