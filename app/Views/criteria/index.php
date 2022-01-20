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
               <!-- <div class="card-header"> -->
               <!-- <h4>Simple Table</h4> -->
               <!-- </div> -->
               <div class="card-body">
                  <!-- <a href="/criteria/add" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Add Criteria</a> -->

                  <div class="table-responsive">
                     <table class="table table-bordered table-md" id="trainingTable">
                        <tr class="text-center">
                           <th>#</th>
                           <th>ID Kriteria</th>
                           <th>Nama Kriteria</th>
                           <th>Atribut</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($criteria as $c) : ?>
                           <tr class="text-center">
                              <td><?= $i++; ?></td>
                              <td><?= $c['criteria_id']; ?></td>
                              <td class="text-left"><?= $c['criteria_name']; ?></td>
                              <td>
                                 <a href="/criteria/atribut/<?= $c['criteria_id']; ?>" class="btn btn-primary btn-icon icon-left">
                                    Atribut <span class="badge badge-transparent"></span>
                                 </a>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>
<?= $this->endSection(); ?>