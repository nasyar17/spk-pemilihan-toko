<?php namespace App\Models;

use CodeIgniter\Model;

class TestingModel extends Model
{
   protected $table = 'datatesting';
   protected $primaryKey = 'testing_id';
   protected $useTimestamps = true;
   protected $allowedFields = ['testing_id', 'toko_id', 'result'];


   public function getTesting($testing_id = false)
   {
      if ($testing_id == false) {
         return $this->findAll();
      }

      return $this->where(['testing_id' => $testing_id])->first();
   }

   public function getLatestTesting()
   {
      return $this->orderBy('created_at', 'DESC')
         ->limit(5)
         ->get()->getResultArray();
   }

   public function getTestingByToko($toko_id = false)
   {
      return $this->where(['toko_id' => $toko_id])->first();
   }

   public function getTestingByTanggal($tgl_awal, $tgl_akhir)
   {
      return $this->db->table('datatesting')
         ->join('toko', 'toko.toko_id = datatesting.toko_id')
         ->where(['updated_at >=' => $tgl_awal])
         ->where(['updated_at <=' => $tgl_akhir . ' 23:59:59'])
         ->where(['active' => 1])
         ->get()->getResultArray();
   }

   public function getHistory($tgl_awal = false, $tgl_akhir = false)
   {
      if ($tgl_awal == false && $tgl_akhir == false) {
         return $this->db->table('datatesting')
            ->join('toko', 'toko.toko_id = datatesting.toko_id')
            ->where(['active' => 1])
            ->get()->getResultArray();
      } else if ($tgl_awal != false && $tgl_akhir != false) {
         return $this->db->table('datatesting')
            ->join('toko', 'toko.toko_id = datatesting.toko_id')
            ->where(['active' => 1])
            ->where(['DATE(created_at) <=' => $tgl_awal])
            ->where(['DATE(created_at) >=' => $tgl_akhir])
            ->get()->getResultArray();
      } else if ($tgl_awal != false) {
         return $this->db->table('datatesting')
            ->join('toko', 'toko.toko_id = datatesting.toko_id')
            ->where(['active' => 1])
            ->where(['DATE(created_at) =' => $tgl_awal])
            ->get()->getResultArray();
      }
   }

   public function deleteByToko($toko_id)
   {
      return $this->db->table('datatesting')
         ->where(['toko_id' => $toko_id])
         ->delete();
   }

   public function updateTest($toko_id, $data)
   {
      return $this->db->table('datatesting')
         ->where(['toko_id' => $toko_id])
         ->update($data);
   }

   public function getRecapData()
   {
      $profit = $this->where('result', 'Profit')->countAllResults();
      $rugi = $this->where('result', 'Rugi')->countAllResults();
      $data = [$profit, $rugi];

      return json_encode($data);
   }
}
