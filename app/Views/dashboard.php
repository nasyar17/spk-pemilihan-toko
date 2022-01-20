<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="section">
   <div class="section-header">
      <h1><?= $title; ?></h1>
   </div>
   <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
         <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
               <i class="fas fa-store"></i>
            </div>
            <div class="card-wrap">
               <div class="card-header">
                  <h4>Total Toko</h4>
               </div>
               <div class="card-body">
                  <?= $jmlToko; ?>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
         <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
               <i class="fas fa-running"></i>
            </div>
            <div class="card-wrap">
               <div class="card-header">
                  <h4>Total Training</h4>
               </div>
               <div class="card-body">
                  <?= $jmlTraining; ?>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
         <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
               <i class="fas fa-calculator"></i>
            </div>
            <div class="card-wrap">
               <div class="card-header">
                  <h4>Total Testing</h4>
               </div>
               <div class="card-body">
                  <?= $jmlTesting; ?>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
         <div class="card card-statistic-1">
            <div class="card-icon bg-success">
               <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
               <div class="card-header">
                  <h4>Total Users</h4>
               </div>
               <div class="card-body">
                  3
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
         <div class="card">
            <div class="card-header">
               <h4>Data Testing Terbaru</h4>
               <div class="card-header-action">
                  <a href="/testing" class="btn btn-primary">View All</a>
               </div>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive">
                  <table class="table table-striped mb-0">
                     <thead>
                        <tr class="text-center">
                           <th>#</th>
                           <th>Test ID</th>
                           <th>Toko ID</th>
                           <th>Result</th>
                           <th>Created at</th>
                           <th>Updated at</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($testing as $row) : ?>
                           <tr class="text-center">
                              <td class="align-middle"><?= $i++; ?></td>
                              <td class="text-center"><?= $row['testing_id']; ?></td>
                              <td class="text-center">
                                 <a href="/toko/<?= $row['toko_id']; ?>" class="font-weight-bold"><?= $row['toko_id']; ?></a>
                              </td>
                              <td class="text-center">
                                 <div class="badge <?= ($row['result'] == 'Profit' ? 'badge-success' : 'badge-danger'); ?>">
                                    <?= $row['result']; ?>
                                 </div>
                              </td>
                              <td class="text-center"><?= $row['created_at']; ?></td>
                              <td class="text-center"><?= $row['updated_at']; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="section-body">
   </div>
</section>



<?= $this->endSection(); ?>