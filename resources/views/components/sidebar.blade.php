@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="#">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/UniBook.png') }}" alt="" width="50%">

                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i data-feather="list"></i>
                    <span>Home</span>
                </a>
            </li>
                <li class="treeview {{ $prefix == '/admin' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="users"></i>
                        <span>Admins</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'book' ? 'active' : '' }}"><a href="{{ route('book') }}"><i
                                    class="ti-more"></i>Books</a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li class="{{ $route == 'publisher' ? 'active' : '' }}"><a href="{{ route('publisher') }}"><i
                                    class="ti-more"></i>Publishers</a></li>
                    </ul>
                </li>
            <li class="{{ $route == 'pengadaan' ? 'active' : '' }}">
                <a href="{{ route('pengadaan') }}">
                    <i data-feather="alert-circle"></i>
                    <span>Pengadaan</span>
                </a>
            </li>

        </ul>
    </section>

</aside>
