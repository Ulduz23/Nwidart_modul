<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{asset('/images/logos/dark-logo.svg')}}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('core.index')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Home</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('blog.index')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Blogs</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('product.index')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Product</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('category.index')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Category</span>
            </a>
          </li>
          
          
          
        </ul>
        
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->