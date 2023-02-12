  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ asset('images/sadboi.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">sdbys Cafe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/1.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ @Auth::user()->name}} ( {{@auth::user()->level}} ) </a>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-people-fill "></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('customer')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('customer/form')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
             <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-book"></i>
              <p>
                menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('menu')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  url('menu/form')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-book-half"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('category')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('category/form')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
             <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-tablet-landscape"></i>
              <p>
                tables
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{   url('tables')   }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  url('tables/form')  }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
             <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-cloud-fog"></i>
              <p>
                Kitchen
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('kitchen')    }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{  url('kitchen/form')    }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
             <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon bi bi-cart4"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{  url('transaction') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{   url('transaction/form') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("report/transaction") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data</p>
                </a>
              </li>
            </ul>
          </li>   

            <li class="nav-item">
                <a href="{{ route("signout") }}" class="nav-link text-danger">
                  <i class="bi bi-arrow-bar-right nav-icon"></i>
                  <p>Log out</p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
