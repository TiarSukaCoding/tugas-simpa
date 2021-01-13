

@section('side')
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100%;">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{url('/dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BACKEND</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/dashboard/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" name="name" >{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/locked" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">

                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p>{{ __('Logout') }}</p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/home/jasa" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Jasa</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/home/supplier" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Supplier</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <script src="{{asset('/dashboard/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <!-- <script src="{{ asset('/dashboard/plugins/jquery/jquery.min.js')}}"></script> -->
