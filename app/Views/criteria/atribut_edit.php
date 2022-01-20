<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h4>Edit Atribut</h4>
         </div>
         <div class="card-body">
            <form action="/criteria/updateAtribut/<?= $atribut['atribut_id']; ?>/<?= $atribut['criteria_id']; ?>" method="post">
               <?= csrf_field(); ?>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="atribut_name">Nama Atribut</label>
                  <div class="col-sm-12 col-md-7">
                     <input type="text" class="form-control <?= ($validation->hasError('atribut_name') ? 'is-invalid' : ''); ?>" name="atribut_name" id="atribut_name" autofocus value="<?= $atribut['atribut_name'] ?>">
                     <div class="invalid-feedback">
                        <?= $validation->getError('atribut_name'); ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                     <button class="btn btn-warning" type="submit">Update</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</div> <?= $this->endSection(); ?>