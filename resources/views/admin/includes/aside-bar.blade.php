  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
          {{-- <span class="brand-text font-weight-light text-center">Sofra</span> --}}
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  {{-- For Admins Only --}}
                  @auth('admin')
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fa fa-store "></i>
                              <p>
                                  Restaurants
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('restaurant-view') }}" class="nav-link">
                                      <i class="fa fa-store nav-icon text-primary"></i>
                                      <p>Stores</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('orders-view') }}" class="nav-link">
                                      <i class="fa fa-money-check-alt nav-icon text-success"></i>
                                      <p>Orders</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('user-view') }}" class="nav-link">
                              <i class="nav-icon fa fa-users"></i>
                              <p>
                                  Clients
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin-logout') }}" class="nav-link text-danger">
                              <i class="nav-icon fa fa-sign-out-alt text-danger"></i>
                              <p>
                                  Logout
                              </p>
                          </a>
                      </li>
                  @endauth
                  {{-- For Admins Only --}}
                  {{-- For Restaurant Owners --}}
                  @auth('restaurant')
                  <li class="nav-item">
                      <a href="{{ route('myStore-view') }}" class="nav-link">
                          <i class="fa fa-store nav-icon text-primary"></i>
                          <p>
                              My Store
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('myProducts-view') }}" class="nav-link">
                          <i class="fa fa-utensils nav-icon text-warning"></i>
                          <p>
                              My Products
                          </p>
                      </a>
                  </li>
                      <li class="nav-item">
                          <a href="{{ route('myOrdersView') }}" class="nav-link">
                              <i class="fa fa-money-check-alt nav-icon text-success"></i>
                              <p>
                                  My Orders
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('store-logout') }}" class="nav-link text-danger">
                              <i class="nav-icon fa fa-sign-out-alt text-danger"></i>
                              <p>
                                  Logout
                              </p>
                          </a>
                      </li>
                  @endauth
                  {{-- For Restaurant Owners --}}
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
