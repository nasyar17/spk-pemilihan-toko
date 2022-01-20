<?php namespace App\Controllers;

use App\Models\TrainingModel;
use App\Models\AtributModel;
use App\Models\CriteriaModel;

class Training extends BaseController
{

   protected $criteriaModel;

   public function __construct()
   {
      $this->trainingModel = new TrainingModel();
      $this->atributModel = new AtributModel();
      $this->criteriaModel = new CriteriaModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Data Training',
         'criteria' => $this->criteriaModel->getCriteria(),
         'training' => $this->trainingModel->getTraining(),
      ];
      return view('training/index', $data);
   }

   public function add()
   {
      // session();
      $data = [
         'title' => 'Add Data Training',
         'jenis_toko' => $this->atributModel->getAtributByCriteria('C0001'),
         'lokasi' => $this->atributModel->getAtributByCriteria('C0002'),
         'ukuran_toko' => $this->atributModel->getAtributByCriteria('C0003'),
         'keramaian_toko' => $this->atributModel->getAtributByCriteria('C0004'),
         'keramaian_sekitar' => $this->atributModel->getAtributByCriteria('C0005'),
         'jam_operasional' => $this->atributModel->getAtributByCriteria('C0006'),
         'validation' => \Config\Services::validation()
      ];

      return view('training/add', $data);
   }

   public function generateKodeTraining()
   {
      $jumlahData = count($this->trainingModel->getTraining());
      if ($jumlahData == 0) {
         $jumlahData = 1;
      }
      $kode = 'TR' . sprintf("%03d", $jumlahData);
      while ($this->trainingModel->getTraining($kode) >= 1) {
         $jumlahData += 1;
         $kode = 'TR' . sprintf("%03d", $jumlahData);
      }
      return $kode;
   }

   public function save()
   {
      // validasi data
      if (!$this->validate([
         'jenis_toko' => 'required',
         'lokasi' => 'required',
         'ukuran_toko' => 'required',
         'keramaian_toko' => 'required',
         'keramaian_sekitar' => 'required',
         'jam_operasional' => 'required',
         'label' => 'required'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/training/add')->withInput()->with('validation', $validation);
      }

      $this->trainingModel->insert([
         'dt_id' => $this->generateKodeTraining(),
         'jenis_toko' => $this->request->getVar('jenis_toko'),
         'lokasi' => $this->request->getVar('lokasi'),
         'ukuran_toko' => $this->request->getVar('ukuran_toko'),
         'keramaian_toko' => $this->request->getVar('keramaian_toko'),
         'keramaian_sekitar' => $this->request->getVar('keramaian_sekitar'),
         'jam_operasional' => $this->request->getVar('jam_operasional'),
         'label' => $this->request->getVar('label'),
      ]);

      session()->setFlashdata(['message' => 'Data added successfully !', 'icon' => 'success']);

      return redirect()->to('/training');
   }

   public function delete($dt_id)
   {
      // dd($dt_id);
      $this->trainingModel->delete($dt_id);
      session()->setFlashdata(['message' => 'Data deleted successfully !', 'icon' => 'success']);
      return redirect()->to('/training');
   }

   public function edit($dt_id)
   {
      $training = $this->trainingModel->getTraining($dt_id);
      $data = [
         'title' => 'Edit Training',
         'validation' => \Config\Services::validation(),
         'training' => $this->trainingModel->getTraining($dt_id),
         'jenis_toko' => $this->atributModel->getAtributByCriteria('C0001'),
         'lokasi' => $this->atributModel->getAtributByCriteria('C0002'),
         'ukuran_toko' => $this->atributModel->getAtributByCriteria('C0003'),
         'keramaian_toko' => $this->atributModel->getAtributByCriteria('C0004'),
         'keramaian_sekitar' => $this->atributModel->getAtributByCriteria('C0005'),
         'jam_operasional' => $this->atributModel->getAtributByCriteria('C0006')
      ];

      // jika training tidak ada
      if (empty($data['training'])) {
         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data training dengan ID ' . $dt_id . ' tidak ditemukan');
      }
      return view('training/edit', $data);
   }

   public function update($dt_id)
   {
      // validasi data
      if (!$this->validate([
         'jenis_toko' => 'required',
         'lokasi' => 'required',
         'ukuran_toko' => 'required',
         'keramaian_toko' => 'required',
         'keramaian_sekitar' => 'required',
         'jam_operasional' => 'required',
         'label' => 'required'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/training/edit/' . $this->request->getVar('dt_id'))->withInput();
      }


      $this->trainingModel->save([
         'dt_id' => $dt_id,
         'jenis_toko' => $this->request->getVar('jenis_toko'),
         'lokasi' => $this->request->getVar('lokasi'),
         'ukuran_toko' => $this->request->getVar('ukuran_toko'),
         'keramaian_toko' => $this->request->getVar('keramaian_toko'),
         'keramaian_sekitar' => $this->request->getVar('keramaian_sekitar'),
         'jam_operasional' => $this->request->getVar('jam_operasional'),
         'label' => $this->request->getVar('label'),
      ]);

      session()->setFlashdata(['message' => 'Data updated successfully !', 'icon' => 'success']);

      return redirect()->to('/training');
   }
}
