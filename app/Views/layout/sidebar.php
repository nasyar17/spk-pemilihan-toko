<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
         <a href="/">SPK PENENTUAN TOKO</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
         <a href="/">St</a>
      </div>
      <ul class="sidebar-menu">
         <li class="menu-header">Dashboard</li>
         <li class='<?= ($title == 'Dashboard' ? 'active' : ''); ?>'><a class="nav-link" href="/"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

         <li class="menu-header">Data</li>
         <li class='<?= ($title == 'Data Toko' || $title == 'Data Toko Tidak Aktif' || $title == 'Tambah Toko' || $title == 'Edit Toko' ? 'active' : ''); ?>'><a class="nav-link" href="/toko"><i class="fas fa-store"></i> <span>Data Toko</span></a></li>
         <li class='<?= ($title == 'Criteria' || $title == 'Atribut' || $title == 'Edit Atribut' ? 'active' : ''); ?>'><a class="nav-link" href="/criteria"><i class="fas fa-list-ol"></i> <span>Criteria & Atribut</span></a></li>
         <li class='<?= ($title == 'Data Training' || $title == 'Add Data Training' || $title == 'Edit Training' ? 'active' : ''); ?>'><a class="nav-link" href="/training"><i class="fas fa-running"></i> <span>Data Training</span></a></li>

         <li class="menu-header">SPK</li>
         <li class='<?= ($title == 'Data Testing' || $title == 'Hasil Hitung' ? 'active' : ''); ?>'><a class="nav-link" href="/testing"><i class="fas fa-calculator"></i> <span>Perhitungan (Testing)</span></a></li>
         <li class='<?= ($title == 'History Perhitungan' ? 'active' : ''); ?>'><a class="nav-link" href="/testing/history"><i class="fas fa-history"></i> <span>History Perhitungan</span></a></li>
      </ul>

   </aside>
</div>