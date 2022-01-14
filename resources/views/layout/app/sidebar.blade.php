<div id="app">
  <div id="sidebar" class="active">
      <div class="sidebar-wrapper active">
<div class="sidebar-header">
    <div class="d-flex justify-content-between">
        <div class="logo">
            <a href="index.html"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
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
            class="sidebar-item {{Request::is('brand')?'active':''}} has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu {{Request::is('brand')?'active':''}}">
                <li class="submenu-item {{Request::is('brand')?'active':''}}">
                    <a href="brand">Data Brand</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-input-group.html">Input Group</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-select.html">Select</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-radio.html">Radio</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-checkbox.html">Checkbox</a>
                </li>
                <li class="submenu-item ">
                    <a href="form-element-textarea.html">Textarea</a>
                </li>
            </ul>
        </li>
        
        <li
            class="sidebar-item  ">
            <a href="form-layout.html" class='sidebar-link'>
                <i class="bi bi-file-earmark-medical-fill"></i>
                <span>Form Layout</span>
            </a>
        </li>
    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
  </div>