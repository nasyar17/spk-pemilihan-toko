<?php namespace App\Models;

use CodeIgniter\Model;

class AtributModel extends Model
{
   protected $table = 'atribut';
   protected $primaryKey = 'atribut_id';
   // protected $useTimestamps = true;
   protected $allowedFields = ['atribut_id', 'criteria_id', 'atribut_name'];

   public function getAtribut($atribut_id = false)
   {
      if ($atribut_id == false) {
         return $this->findAll();
      }
      return $this->where(['atribut_id' => $atribut_id])->first();
   }

   public function getAtributByCriteria($id)
   {
      return $this->where(['criteria_id' => $id])->findAll();
   }

   // public function deleteAllSub($criteria_id)
   // {
   //    return $this->db->table($this->table)->delete(['criteria_id' => $criteria_id]);
   // }
}
