<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    @if(Module::find('adminhome') && Module::find('adminhome')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('admin.home') }}" aria-expanded="false">
                                <i class="bx bx-home-circle mr-2"></i>{{ _t('home') }}
                            </a>
                        </li>
                    @endif

                    @if(Module::find('core') && Module::find('core')->isEnabled())
                        <li class="nav-item">
                            <a class="nav-link arrow-none" href="{{ route('users.index') }}" aria-expanded="false">
                                <i class="bx bxs-user mr-2"></i>{{ _t('user') }}
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</div>
