<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div class="header">
    <div class="list-item">
      <a href="/dashboard">
        <i class="fa-solid fa-check-to-slot"></i>
        <span class="title">e-Lection</span>
      </a>
    </div>
  </div>
  <hr class="border border-light border-1 opacity-50 mt-3">
  <div class="main">
    <a href="/dashboard">
      <div class="list-item @if($title == "Dashboard") active @endif">
        <i class="fa-solid fa-house-user"></i>
        <span class="title">Dashboard</span>
      </div>
    </a>
    <a href="/siswa">
      <div class="list-item @if($title == "Siswa") active @endif">
        <i class="fa-solid fa-user"></i>
        <span class="title">Pemilih</span>
      </div>
    </a>
    <a href="/calon">
      <div class="list-item @if($title == "Calon") active @endif">
        <i class="fa-solid fa-users"></i>
        <span class="title">Calon</span>
      </div>
    </a>
  </div>
</div>
<!-- End Sidebar -->
