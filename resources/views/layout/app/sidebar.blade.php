<div id="app">
  <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h2 class="text-primary">Rental Mobil</h2>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                
                <li
                    class="sidebar-item {{Request::is('/')?'active':''}} ">
                    <a href="/" class='sidebar-link {{Request::is('/')?'active':''}}'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sidebar-title">Master Data</li>
                
                <li
                    class="sidebar-item {{Request::is('brand') || Request::is('cars*') || Request::is('clients*') ?'active':''}} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu {{Request::is('brand') || Request::is('cars*') || Request::is('clients*') ?'active':''}}">
                        <li class="submenu-item {{Request::is('brand')?'active':''}}">
                            <a href="{{route('brand')}}">Data Brand</a>
                        </li>
                        <li class="submenu-item {{Request::is('cars*')?'active':''}}">
                            <a href="{{route('cars.index')}}">Data Mobil</a>
                        </li>
                        <li class="submenu-item {{Request::is('clients*')?'active':''}}">
                            <a href="{{route('clients.index')}}">Data Penyewa</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="sidebar-item {{Request::is('booking') || Request::is('return*') || Request::is('process') ?'active':''}} has-sub">
                    <a href="#" class='sidebar-link'>
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Transaksi</span>
                    </a>
                    <ul class="submenu {{Request::is('booking') || Request::is('return*') || Request::is('process') ?'active':''}}">
                        <li class="submenu-item {{Request::is('booking') || Request::is('process') ?'active':''}}">
                            <a href="{{route('booking')}}">Booking</a>
                        </li>
                        <li class="submenu-item {{Request::is('return*')?'active':''}}">
                            <a href="{{route('returns')}}">Return</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="sidebar-item {{Request::is('report') ?'active':''}} has-sub">
                    <a href="#" class='sidebar-link'>
                        <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu {{Request::is('report') ?'active':''}}">
                        <li class="submenu-item {{Request::is('report') ?'active':''}}">
                            <a href="{{route('report')}}">Data Transaksi</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
</div>