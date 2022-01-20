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
               <div class="card-header">
                  <h4>Update Criteria</h4>
               </div>
               <div class="card-body">
                  <form action="/criteria/update/<?= $criteria['criteria_id']; ?>">
                     <?= csrf_field(); ?>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control <?= ($validation->hasError('criteria_id') ? 'is-invalid' : ''); ?>" value="<?= $criteria['criteria_id']; ?>" name="criteria_id" id="criteria_id" disabled>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Criteria Name</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control <?= ($validation->hasError('criteria_name') ? 'is-invalid' : ''); ?>" value="<?= (old('criteria_name')) ? old('criteria_name') : $criteria['criteria_name'] ?>" name="criteria_name" id="criteria_name">
                        </div>
                        <div class="invalid-feedback">
                           <?= $validation->getError('criteria_name'); ?>
                        </div>
                     </div>

                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Created at</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control" value="<?= $criteria['created_at']; ?>" disabled>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Updated at</label>
                        <div class="col-sm-12 col-md-7">
                           <input type="text" class="form-control" value="<?= $criteria['updated_at']; ?>" disabled>
                        </div>
                     </div>
                     <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                           <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>