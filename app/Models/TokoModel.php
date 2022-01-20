<?php namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
   protected $table = 'toko';
   protected $primaryKey = 'toko_id';
   // protected $useTimestamps = true;
   protected $allowedFields = ['toko_id', 'toko_nama', 'alamat', 'tested', 'active'];

   public function getToko($toko_id = false)
   {
      if ($toko_id == false) {
         return $this->where(['active' => 1])
            ->findAll();
      }
      return $this->where(['toko_id' => $toko_id])->first();
   }

   public function getTokoNotActive()
   {
      return $this->where(['active' => 0])->get()->getResultArray();
   }
}
