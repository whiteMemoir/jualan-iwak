@extends('layouts.admin')
@section('sidebar-menu')
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{ url('/admin/dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/commodity') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Commodities
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/item') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Items
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/carousel') }}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Carousel
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/social-media') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Social Medias
          </p>
        </a>
      </li>

      <li class="nav-item menu-open">
        <a href="{{ url('/admin/setting') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Settings
          </p>
        </a>
      </li>
    </ul>
  </nav>
@endsection

