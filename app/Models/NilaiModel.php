<?php namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
   protected $table = 'nilai';
   protected $primaryKey = 'nilai_id';
   // protected $useTimestamps = true;
   protected $allowedFields = ['toko_id', 'criteria_id', 'atribut_id'];

   public function getNilai($nilai_id = false)
   {
      if ($nilai_id == false) {
         return $this->findAll();
      }

      return $this->where(['nilai_id' => $nilai_id])->first();
   }

   public function deleteByToko($toko_id)
   {
      return $this->db->table('nilai')
         ->where(['toko_id' => $toko_id])
         ->delete();
   }

   public function getNilaiByToko($toko_id)
   {
      return $this->where(['toko_id' => $toko_id])->findAll();
   }

   public function getJoin($toko_id)
   {
      return $this->db->table('nilai')
         ->join('atribut', 'atribut.atribut_id = nilai.atribut_id')
         ->join('criteria', 'criteria.criteria_id = nilai.criteria_id')
         ->where(['toko_id' => $toko_id])
         ->get()->getResultArray();
   }
}
