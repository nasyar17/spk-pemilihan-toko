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
               <!-- <div class="card-header">
                  <h4>Simple Table</h4>
               </div> -->
               <div class="card-body">
                  <div class="row">
                     <div class="col">
                        <a href="/toko/add" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Add Toko</a>
                     </div>
                     <div class="col">
                        <a href="/toko/index2" class="btn btn-outline-info btn-lg float-right">Toko Tidak Aktif</a>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="tokoTable">
                        <thead>
                           <tr class="text-center">
                              <th>#</th>
                              <th>Toko ID</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Sudah Pernah Diuji ?</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1 ?>
                           <?php foreach ($toko as $row) : ?>
                              <tr class="text-center">
                                 <td class="align-middle"><?= $i++; ?></td>
                                 <td class="align-middle"><?= $row['toko_id']; ?></td>
                                 <td class="text-left align-middle"><?= $row['toko_nama']; ?></td>
                                 <td class="text-left align-middle"><?= $row['alamat']; ?></td>
                                 <td class="align-middle">
                                    <?php if ($row['tested'] == 1) : ?>
                                       <div class="badge badge-success">Sudah</div>
                                    <?php else : ?>
                                       <div class="badge badge-danger">Belum</div>
                                    <?php endif; ?>
                                 </td>
                                 <td class="align-middle">
                                    <a href="/toko/<?= $row['toko_id']; ?>" class="btn btn-warning"><i class="fas fa-edit test"></i> Edit</a>
                                    <a href="/toko/toActive/1/<?= $row['toko_id']; ?>" class="btn btn-danger active-btn"><i class="fas fa-trash"></i> Delete</a>
                                 </td>

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