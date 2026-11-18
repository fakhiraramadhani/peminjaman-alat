 <!-- Sidebar Menu -->
 <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Menu Utama
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('alat.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Alat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('peminjaman.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Peminjaman</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pengembalian.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Data Pengembalian</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
