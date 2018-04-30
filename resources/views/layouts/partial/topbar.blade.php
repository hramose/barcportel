<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"><img src="{{  asset('images/logo.svg') }}" width="30" alt="Oreo"><span class="m-l-10">Oreo</span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        <li class="float-right">
            <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            <a href="javascript:void(0);" class="mega-menu" data-close="true"
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i></a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</nav>