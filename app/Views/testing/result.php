<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<section class="section">
   <div class="section-header">
      <h1><?= $title; ?></h1>
   </div>
   <div class="section-body">
      <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header bg-warning text-dark text-uppercase">
                  <h4>Input Testing</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md">
                     <tr class="bg-dark text-white">
                        <th>Nama Toko</th>
                        <th>Alamat</th>
                     </tr>
                     <tr class="bg-white">
                        <td><?= $toko['toko_nama']; ?></td>
                        <td><?= $toko['alamat']; ?></td>
                     </tr>
                  </table>
                  <table class="table table-bordered table-md text-center table-responsive">
                     <tr class="bg-dark text-white">
                        <th>Jenis Toko</th>
                        <th>Lokasi</th>
                        <th>Ukuran Toko</th>
                        <th>Keramaian Toko</th>
                        <th>Keramaian Sekitar</th>
                        <th>Jam Operasional</th>
                     </tr>
                     <tr class="bg-white">
                        <?php foreach ($selectedCriteria as $st) : ?>
                           <td class="font-weight-bold"><?= $st; ?></td>
                        <?php endforeach; ?>
                     </tr>
                  </table>
                  <h6 class="badge badge-warning">
                     <a href="#kesimpulan" class="text-dark">Menuju Kesimpulan &darr;</a>
                  </h6>
               </div>
            </div>

         </div>
      </div>
      <div class="row">
         <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Class</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>PROFIT</th>
                        <th>RUGI</th>
                        <th>TOTAL DATA</th>
                     </tr>
                     <tr class="bg-white font-weight-bold">
                        <td><?= $quantityByLabel['Profit']; ?></td>
                        <td><?= $quantityByLabel['Rugi']; ?></td>
                        <td><?= $quantityByLabel['Total']; ?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Jenis Toko</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>JENIS TOKO</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qJenisToko as $atribut => $jt) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $jt['Profit']; ?></td>
                           <td><?= $jt['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Lokasi</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>LOKASI</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qLokasi as $atribut => $l) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $l['Profit']; ?></td>
                           <td><?= $l['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Ukuran Toko</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>UKURAN TOKO</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qUkuranToko as $atribut => $ut) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $ut['Profit']; ?></td>
                           <td><?= $ut['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Keramaian Toko</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>KERAMAIAN TOKO</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qKeramaianToko as $atribut => $kt) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $kt['Profit']; ?></td>
                           <td><?= $kt['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Keramaian Sekitar</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>KERAMAIAN SEKITAR</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qKeramaianSekitar as $atribut => $ks) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $ks['Profit']; ?></td>
                           <td><?= $ks['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Frekuensi Jam Operasional</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center">
                     <tr class="bg-dark text-white">
                        <th>JAM OPERASIONAL</th>
                        <th>PROFIT</th>
                        <th>RUGI</th>
                     </tr>
                     <?php foreach ($qJamOperasional as $atribut => $jo) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $atribut; ?></td>
                           <td><?= $jo['Profit']; ?></td>
                           <td><?= $jo['Rugi']; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Tabel Perhitungan</h4>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center table-responsive">
                     <tr class="bg-dark text-white">
                        <th></th>
                        <?php foreach ($criteria as $c) : ?>
                           <th><?= $c['criteria_name']; ?></th>
                        <?php endforeach; ?>
                        <th>Prior</th>
                     </tr>
                     <?php $label = ['Profit', 'Rugi']; ?>
                     <?php foreach ($label as $l) : ?>
                        <?php foreach ($valueCriteria as $key => $vc) : ?>
                           <?php if ($key == $l) : ?>
                              <tr class="bg-white font-weight-600">
                                 <td><?= $key; ?></td>
                                 <?php foreach ($criteria as $c) : ?>
                                    <td><?= $vc[$c['criteria_code']]; ?> / <?= $quantityByLabel[$l]; ?></td>
                                 <?php endforeach; ?>
                                 <td><?= $quantityByLabel[$l] . ' / ' . $quantityByLabel['Total']; ?></td>
                              </tr>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     <?php endforeach; ?>
                  </table>
               </div>
               <div class="card-body bg-light">
                  <table class="table table-bordered table-md text-center table-responsive">
                     <tr class="bg-dark text-white">
                        <th></th>
                        <?php foreach ($criteria as $c) : ?>
                           <th><?= $c['criteria_name']; ?></th>
                        <?php endforeach; ?>
                        <th>Prior</th>
                        <th>Nilai Akhir</th>
                     </tr>
                     <?php $label = ['Profit', 'Rugi']; ?>
                     <?php foreach ($label as $l) : ?>
                        <?php foreach ($rekapNilai as $key => $rn) : ?>
                           <?php if ($key == $l) : ?>
                              <tr class="bg-white font-weight-600">
                                 <td><?= $key; ?></td>
                                 <?php foreach ($criteria as $c) : ?>
                                    <td><?= $rn[$c['criteria_code']]; ?></td>
                                 <?php endforeach; ?>
                                 <td><?= $rn['prior']; ?></td>
                                 <td><?= $rn['nilaiakhir']; ?></td>
                              </tr>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card" id="kesimpulan">
               <div class="card-header bg-dark text-white text-uppercase">
                  <h4 class="text-warning">Kesimpulan</h4>
               </div>
               <div class="card-body bg-light">
                  <h4 class="mb-4 text-dark">Berdasarkan tabel perhitungan diatas maka data uji dengan kriteria sebagai berikut :</h4>
                  <table class="table table-bordered table-md col-lg-8">
                     <tr class="bg-dark text-white">
                        <th>KRITERIA</th>
                        <th>ATRIBUT</th>
                     </tr>
                     <?php foreach ($criteria as $c) : ?>
                        <tr class="bg-white font-weight-600">
                           <td><?= $c['criteria_name']; ?></td>
                           <td><?= $selectedCriteria[$c['criteria_code']]; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </table>
                  <h4 class="mb-4 text-dark">memiliki nilai akhir sebesar :</h4>
                  <table class="table table-bordered table-md col-lg-8">
                     <tr class="bg-dark text-white">
                        <th class="bg-success text-dark">PROFIT</th>
                        <th class="bg-danger text-dark">RUGI</th>
                     </tr>
                     <tr class="bg-white font-weight-600">
                        <td><?= $rekapNilai['Profit']['nilaiakhir']; ?></td>
                        <td><?= $rekapNilai['Rugi']['nilaiakhir']; ?></td>
                     </tr>
                  </table>

                  <?php if ($rekapNilai['Profit']['nilaiakhir'] > $rekapNilai['Rugi']['nilaiakhir']) : ?>
                     <h4 class="mb-4 text-dark">sehingga dapat disimpulkan bahwa data uji tersebut mendapatkan label <div class="badge badge-success text-dark">Profit</div>
                     </h4>
                  <?php else : ?>
                     <h4 class="mb-4 text-dark">sehingga dapat disimpulkan bahwa data uji tersebut mendapatkan label <div class="badge badge-danger text-dark">Rugi</div>
                     </h4>
                  <?php endif; ?>

                  <a href="/testing/cetak/<?= $toko['toko_id']; ?>" class="btn btn-lg btn-primary">Cetak</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?= $this->endSection(); ?>