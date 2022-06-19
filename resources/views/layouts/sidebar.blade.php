<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo">
        <i class="bx bx-car bx-md"></i>
      </span>

      <span class="app-brand-text demo menu-text fw-bolder ms-2">Simaska</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Layouts -->

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Data Master</span>
    </li>

    <!-- Tables -->
    <li class="menu-item {{ request()->is('kendaraan*') ? 'active' : '' }}">
      <a href="{{ route('kendaraan.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-car"></i>
        <div data-i18n="Tables">Data Kendaraan</div>
      </a>
    </li>
    <li class="menu-item {{ request()->is('department*') ? 'active' : '' }}">
      <a href="{{ route('department.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-buildings"></i>
        <div data-i18n="Tables">Data Department</div>
      </a>
    </li>
    <li class="menu-item {{ request()->is('kategori*') ? 'active' : '' }}">
      <a href="{{ route('kategori.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-category"></i>
        <div data-i18n="Tables">Kategori Kendaraan</div>
      </a>
    </li>

    <!-- Misc -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Opsi</span>
    </li>

    <li class="menu-item">
      <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
        class="menu-link">
        <i class="menu-icon tf-icons bx bx-support"></i>
        <div data-i18n="Support">Support</div>
      </a>
    </li>
    <li class="menu-item">
      <a href="https://github.com/aktssam/" target="_blank" class="menu-link">
        <i class="menu-icon tf-icons bx bx-file"></i>
        <div data-i18n="Documentation">Documentation</div>
      </a>
    </li>
  </ul>
</aside>
