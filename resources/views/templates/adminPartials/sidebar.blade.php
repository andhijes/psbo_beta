<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
          <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron"></span></a>
          </li>
				<ul class="nav side-menu">
          <li><a><i class="fa fa-graduation-cap"></i> Beasiswa <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('scholarship.read') }}">Daftar Beasiswa</a></li>
              <li><a href="{{ route('addScholarship.create') }}">Tambah Beasiswa</a></li>
            </ul>
          </li>
        <ul class="nav side-menu">
          <li><a href="{{ route('tags.index') }} "><i class="fa fa-tags"></i> Tags</a>
          </li>
				<ul class="nav side-menu">
          <li><a href="{{ route('student') }} "><i class="fa fa-edit"></i> Mahasiswa</a>
          </li>
        
    </div>
              
</div>
<!-- /sidebar menu -->