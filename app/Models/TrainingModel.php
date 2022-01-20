<?php namespace App\Models;

use CodeIgniter\Model;

class TrainingModel extends Model
{
   protected $table = 'datatraining';
   protected $primaryKey = 'dt_id';
   // protected $useTimestamps = true;
   protected $allowedFields = ['dt_id', 'jenis_toko', 'lokasi', 'ukuran_toko', 'keramaian_toko', 'keramaian_sekitar', 'jam_operasional', 'label'];

   public $label = ['Profit', 'Rugi'];

   public function getTraining($dt_id = false)
   {
      if ($dt_id == false) {
         return $this->findAll();
      }
      return $this->where(['dt_id' => $dt_id])->first();
   }

   public function getProfit()
   {
      return $this->where('label', 'Profit')->countAllResults();
   }

   public function getRugi()
   {
      return $this->where('label', 'Rugi')->countAllResults();
   }

   public function getJenisToko($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qJenisToko[$a['atribut_name']][$l] = $this->where(['jenis_toko' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qJenisToko;
   }

   public function getLokasi($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qLokasi[$a['atribut_name']][$l] = $this->where(['lokasi' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qLokasi;
   }

   public function getUkuranToko($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qUkuranToko[$a['atribut_name']][$l] = $this->where(['ukuran_toko' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qUkuranToko;
   }

   public function getKeramaianToko($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qKeramaianToko[$a['atribut_name']][$l] = $this->where(['keramaian_toko' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qKeramaianToko;
   }

   public function getKeramaianSekitar($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qKeramaianSekitar[$a['atribut_name']][$l] = $this->where(['keramaian_sekitar' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qKeramaianSekitar;
   }

   public function getJamOperasional($atribut)
   {
      foreach ($atribut as $a) {
         foreach ($this->label as $l) {
            $qJamOperasional[$a['atribut_name']][$l] = $this->where(['jam_operasional' => $a['atribut_name'], 'label' => $l])->countAllResults();
         }
      }
      return $qJamOperasional;
   }

   public function getEachCriteria($selectedCriteria)
   {
      foreach ($selectedCriteria as $key => $sc) {
         $nVar['Profit'][$key] = $this->where([$key => $sc, 'label' => 'Profit'])->countAllResults();
         $nVar['Rugi'][$key] = $this->where([$key => $sc, 'label' => 'Rugi'])->countAllResults();
      }
      return $nVar;
   }

   public function getRecapData()
   {
      $data = [
         $this->getProfit(), $this->getRugi()
      ];

      return json_encode($data);
   }
}
