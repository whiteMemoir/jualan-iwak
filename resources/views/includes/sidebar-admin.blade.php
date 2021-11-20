
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/commodity') }}" class="nav-link {{ request()->segment(2) == 'commodity' ? 'active' : '' }}">
          <i class="nav-icon fas fa-dumpster"></i>
          <p>
            Jenis
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/item') }}" class="nav-link {{ request()->segment(2) == 'item' ? 'active' : '' }}">
          <i class="nav-icon fas fa-fish"></i>
          <p>
            Items
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/carousel') }}" class="nav-link {{ request()->segment(2) == 'carousel' ? 'active' : '' }}">
          <i class="nav-icon fas fa-tablet-alt"></i>
          <p>
            Slider Banner
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/social-media') }}" class="nav-link {{ request()->segment(2) == 'social-media' ? 'active' : '' }}">
          <i class="nav-icon fas fa-icons"></i>
          <p>
            Sosial Media
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/tentang-kami') }}" class="nav-link {{ request()->segment(2) == 'tentang-kami' ? 'active' : '' }}">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Tentang Kami
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/setting') }}" class="nav-link {{ request()->segment(2) == 'setting' ? 'active' : '' }}">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Pengaturan
          </p>
        </a>
      </li>
    </ul>
  </nav>
