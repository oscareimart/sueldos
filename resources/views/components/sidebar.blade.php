<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
        {{-- <div class="info">

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="d-block"><button type="button" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt"></i>
                </button></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div> --}}


    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            @if ($modules)
                {{-- {{ $modules }} --}}
                @foreach ($modules as $module)
                    {{-- {{ $module }} --}}
                    @if ($module->level == 0)
                        <li class="nav-item">
                            <a href="{{ $module->path }}" class="nav-link">
                                <i class="{{ $module->icon }}"></i>
                                <p>
                                    {{ $module->name }}
                                    @if ($module->children == 1)
                                        <i class="fas fa-angle-left right"></i>
                                    @endif

                                </p>
                            </a>
                            @if ($module->children == 1)
                                <ul class="nav nav-treeview">
                                    @foreach ($module->modules as $smod)
                                        <li class="nav-item">
                                            <a href="{{ $smod->path }}" class="nav-link">
                                                <i class="{{ $smod->icon }}"></i>
                                                <p>{{ $smod->name }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                    {{-- {{ $module->children }} --}}
                @endforeach
            @endif


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
