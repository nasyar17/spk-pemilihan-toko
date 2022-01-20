<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h4>Atribut</h4>
         </div>
         <div class="card-body">
            <table class="table table-bordered table-md text-center" id="trainingTable">
               <div class="row">
                  <div class="col"><button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAdd">
                        <i class="fas fa-plus-circle"></i> Add Atribut</a>
                     </button>
                  </div>
                  <div class="col">
                     <h3 class="text-right"><?= $criteria_name['criteria_name']; ?></h3>
                  </div>
               </div>

               <tr class="text-center">
                  <th>#</th>
                  <th>ID Atribut</th>
                  <th>Nama Atribut</th>
                  <th>Aksi</th>
               </tr>
               <?php $i = 1; ?>
               <?php foreach ($atribut as $a) : ?>
                  <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $a['atribut_id']; ?></td>
                     <td><?= $a['atribut_name']; ?></td>
                     <td>
                        <a href="/criteria/editAtribut/<?= $a['atribut_id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/criteria/deleteAtribut/<?= $a['atribut_id']; ?>/<?= $a['criteria_id']; ?>" method="POST" class="d-inline" name="form<?= $a['atribut_id']; ?>" id="<?= $a['atribut_id']; ?>">
                           <?= csrf_field(); ?>
                           <input type="hidden" name="_method" value="DELETE">
                           <button type="submit" class="btn btn-danger delete-btn" id="<?= $a['atribut_id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </div>
      </div>
   </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Tambah Atribut</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <form action="/criteria/addAtribut/<?= $criteria_id; ?>" method="POST" class="needs-validation" novalidate="">
            <div class="modal-body">
               <div class="form-group">
                  <label for="atribut">Nama Atribut</label>
                  <input type="text" class="form-control" id="atribut" name="atribut_name" required="" autofocus>
                  <div class="invalid-feedback">
                     required field
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
         </form>

      </div>
   </div>
</div>
<?= $this->endSection(); ?>