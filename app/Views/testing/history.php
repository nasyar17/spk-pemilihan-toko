<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">

   <div class="section-header">
      <h1><?= $title; ?></h1>
   </div>

   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <!-- <div class="card-header">
                  <h4>History</h4>
               </div> -->
               <div class="card-body">
                  <form action="/testing/laporan">
                     <div class="form-row">
                        <div class="form-group col-lg-4 col-md-5 col-sm-12">
                           <label for="tgl_awal">Tanggal Awal</label>
                           <input type="date" class="form-control" placeholder="Tanggal Awal" id="tgl_awal" name="tgl_awal">
                        </div>
                        <div class="form-group col-lg-4 col-md-5 col-sm-12">
                           <label for="tgl_akhir">Tanggal Akhir</label>
                           <input type="date" class="form-control" placeholder="Tanggal Akhir" id="tgl_akhir" name="tgl_akhir">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="col-2">
                           <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                     </div>
                  </form>

                  <?php
                  $today = date('Y-m-d H:m:s');
                  ?>
                  <ul class="nav nav-tabs mt-4">
                     <li class="nav-item">
                        <a class="nav-link <?= ($active == 'all' ? 'active' : ''); ?>" href="/testing/history">Semua</a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= ($active == 'month' ? 'active' : ''); ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bulan</a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="/testing/history/month/2021-01-01">Januari</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-02-01">Februari</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-03-01">Maret</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-04-01">April</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-05-01">Mei</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-06-01">Juni</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-07-01">Juli</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-08-01">Agustus</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-09-01">September</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-10-01">Oktober</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-11-01">November</a>
                           <a class="dropdown-item" href="/testing/history/month/2021-12-01">Desember</a>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($active == 'thisweek' ? 'active' : ''); ?>" href="/testing/history/thisweek">7 Hari</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link <?= ($active == 'today' ? 'active' : ''); ?>" href="/testing/history/today">Hari Ini</a>
                     </li>
                  </ul>

                  <div class="table-responsive mt-4">
                     <table class="table table-striped table-sm" id="historyTable">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>Test ID</th>
                              <th>Toko ID</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Result</th>
                              <th>Created at</th>
                              <th>Updated at</th>
                           </tr>
                        </thead>
                        <tbody class="text-center">
                           <?php $i = 1 ?>
                           <?php foreach ($testing as $row) : ?>
                              <tr class="text-center">
                                 <td><?= $i++; ?></td>
                                 <td><?= $row['testing_id']; ?></td>
                                 <td>
                                    <a href="/toko/<?= $row['toko_id']; ?>" class="font-weight-bold"><?= $row['toko_id']; ?></a>
                                 </td>
                                 <td><?= $row['toko_nama']; ?></td>
                                 <td><?= $row['alamat']; ?></td>
                                 <td>
                                    <div class="badge <?= ($row['result'] == 'Profit' ? 'badge-success' : 'badge-danger'); ?>">
                                       <?= $row['result']; ?>
                                    </div>
                                 </td>
                                 <?php
                                 $created = strtotime($row['created_at']);
                                 $updated = strtotime($row['updated_at']);
                                 ?>
                                 <td><?= date('d M Y H:m:s', $created); ?></td>
                                 <td><?= date('d M Y H:m:s', $updated); ?></td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?= $this->endSection(); ?>