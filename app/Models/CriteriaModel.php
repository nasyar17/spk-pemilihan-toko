<?php namespace App\Models;

use CodeIgniter\Model;

class CriteriaModel extends Model
{
   protected $table = 'criteria';
   protected $primaryKey = 'criteria_id';
   // protected $useTimestamps = true;
   protected $allowedFields = ['criteria_code', 'criteria_name'];

   public function getCriteria($criteria_id = false)
   {
      if ($criteria_id == false) {
         return $this->findAll();
      }

      return $this->where(['criteria_id' => $criteria_id])->first();
   }

   public function getCriteriaName($id)
   {
      return $this->where(['criteria_id' => $id])->first();
   }
}
