      <!-- Navbar -->
      <nav class="navbar">
        <button class="nav-item btn btn-transparent" id="sidebar-toggle">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="dropdown">
          <i class="fa-solid fa-id-card"></i>
          <div class="drop-menu btn-group">
            <button type="button" class="drop-menu btn dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
              {{ auth()->guard('admin')->user()->nama }}
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
              <li><button class="dropdown-item" type="button">Profile</button></li>
              <hr>
              <li><a href="/logout_admin" class="dropdown-item" type="button">Logout</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
