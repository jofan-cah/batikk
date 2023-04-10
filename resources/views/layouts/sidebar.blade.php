<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://batikkerisonline.co.id/wp-content/uploads/2017/08/Logo-BK.png" class="img-circle elevation-2"
          alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          {{auth()->user()->level}}
        </a>
      </div>
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

        <li class="nav-item">
          <a href="{{url('/dashboard')}}" class="nav-link {{(request()->segment(1)== '' ? 'active' : '')}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        @if (auth()->user()->level == 'Admin')
        <li class="nav-item menu-open">
          <a href="#"
            class="nav-link {{(request()->segment(1) == 'admin' || request()->segment(2) == 'admin'  ? 'active' : '')}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Data Admin
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('users')}}" class="nav-link {{(request()->segment(1)== 'admin' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Admin</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-header">Barang</li>
        <li class="nav-item menu-open">
          <a href=""
            class="nav-link {{(request()->segment(1) == 'barang' || request()->segment(1) == 'kategori' || request()->segment(1) == 'stock'  ? 'active' : '')}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Data Barang
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('barang')}}" class="nav-link {{(request()->segment(1)== 'barang' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('kategori')}}" class="nav-link {{(request()->segment(1)== 'kategori' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Harga Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('stock')}}" class="nav-link {{(request()->segment(1)== 'stock' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock</p>
              </a>
            </li>


          </ul>
        </li>
        @endif


        @if (auth()->user()->level == 'User')

        <li class="nav-header">Barang</li>
        <li class="nav-item menu-open">
          <a href=""
            class="nav-link {{(request()->segment(1) == 'barang' || request()->segment(1) == 'kategori' || request()->segment(1) == 'stock'  ? 'active' : '')}}">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Data Barang
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('barang')}}" class="nav-link {{(request()->segment(1)== 'barang' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('kategori')}}" class="nav-link {{(request()->segment(1)== 'kategori' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Harga Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('stock')}}" class="nav-link {{(request()->segment(1)== 'stock' ? 'active' : '')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Stock</p>
              </a>
            </li>


          </ul>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <div class="sidebar-custom">
    <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
    <a href="{{url('/logout')}}" class="btn btn-secondary hide-on-collapse pos-right">
      Keluar</a>
  </div>
  <!-- /.sidebar-custom -->
</aside>