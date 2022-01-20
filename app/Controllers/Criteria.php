<?php namespace App\Controllers;


use App\Models\CriteriaModel;
use App\Models\TokoModel;
use App\Models\AtributModel;

class Criteria extends BaseController
{

   protected $criteriaModel;

   public function __construct()
   {
      $this->criteriaModel = new CriteriaModel();
      $this->atributModel = new AtributModel();
      $this->tokoModel = new TokoModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Criteria',
         'criteria' => $this->criteriaModel->getCriteria()
      ];

      return view('criteria/index', $data);
   }

   public function detail($criteria_id)
   {
      $criteria = $this->criteriaModel->getCriteria($criteria_id);
      $data = [
         'title' => 'Detail Criteria',
         'validation' => \Config\Services::validation(),
         'criteria' => $this->criteriaModel->getCriteria($criteria_id)
      ];

      // jika criteria tidak ada
      if (empty($data['criteria'])) {
         throw new \CodeIgniter\Exceptions\PageNotFoundException('Criteria dengan ID ' . $criteria_id . ' tidak ditemukan');
      }
      return view('criteria/detail', $data);
   }

   // TAMBAH KRITERIA
   public function add()
   {
      // session();
      $data = [
         'title' => 'Add Criteria Data',
         'validation' => \Config\Services::validation()
      ];
      return view('criteria/add', $data);
   }

   public function save()
   {
      // validasi data
      if (!$this->validate([
         'criteria_name' => 'required|is_unique[criteria.criteria_name]'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/criteria/add')->withInput()->with('validation', $validation);
      }
      $criteria_name = $this->request->getVar('criteria_name');

      // $this->tokoModel->addField($criteria_name, $criteria_type);

      $this->criteriaModel->save([
         // 'criteria_id' => $this->request->getVar('criteria_id'),
         'criteria_name' => $criteria_name
      ]);

      session()->setFlashdata(['message' => 'Data added successfully !', 'icon' => 'success']);

      return redirect()->to('/criteria');
   }

   public function delete($criteria_id)
   {
      // dd($criteria_id);
      // $criteria_name = $this->criteriaModel->getCriteria($criteria_id);
      // $criteria_name = preg_replace('/\s+/', '', $criteria_name['criteria_name']);

      // $this->tokoModel->dropField($criteria_name);
      $this->criteriaModel->delete($criteria_id);

      $this->atributModel->deleteAllSub($criteria_id);

      session()->setFlashdata(['message' => 'Data deleted successfully !', 'icon' => 'success']);
      return redirect()->to('/criteria');
   }

   public function update($criteria_id)
   {
      // validasi data
      if (!$this->validate([
         'criteria_name' => 'required'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/criteria/' . $criteria_id)->withInput()->with('validation', $validation);
      }

      $this->criteriaModel->save([
         'criteria_id' => $criteria_id,
         'criteria_name' => $this->request->getVar('criteria_name')
      ]);

      session()->setFlashdata(['message' => 'Data updated successfully !', 'icon' => 'success']);

      return redirect()->to('/criteria');
   }

   public function generateKodeAtribut()
   {
      $jumlahData = count($this->atributModel->getAtribut());
      if ($jumlahData == 0) {
         $jumlahData = 1;
      }
      $kode = 'A' . sprintf("%04d", $jumlahData);
      while ($this->atributModel->getAtribut($kode) >= 1) {
         $jumlahData += 1;
         $kode = 'A' . sprintf("%04d", $jumlahData);
      }

      return $kode;
   }

   public function atribut($id)
   {
      $data = [
         'title' => 'Atribut',
         'criteria_id' => $id,
         'atribut' => $this->atributModel->getAtributByCriteria($id),
         'criteria_name' => $this->criteriaModel->getCriteriaName($id)
      ];
      // dd($this->generateKodeAtribut());

      return view('/criteria/atribut', $data);
   }

   public function addAtribut($id)
   {
      if (!$this->validate([
         'atribut_name' => 'required'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/criteria/atribut/' . $id)->withInput();
      }

      // dd($this->generateKodeAtribut());
      $this->atributModel->insert([
         'atribut_id' => $this->generateKodeAtribut(),
         'criteria_id' => $id,
         'atribut_name' => $this->request->getVar('atribut_name'),
      ]);

      session()->setFlashdata(['message' => 'Data added successfully !', 'icon' => 'success']);

      return redirect()->to('/criteria/atribut/' . $id);
   }

   public function deleteAtribut($id, $criteria_id)
   {
      $this->atributModel->delete($id);

      session()->setFlashdata(['message' => 'Data deleted successfully !', 'icon' => 'success']);
      return redirect()->to('/criteria/atribut/' . $criteria_id);
   }

   public function editAtribut($id)
   {
      $data = [
         'title' => 'Edit Atribut',
         'atribut' => $this->atributModel->getAtribut($id),
         'validation' => \Config\Services::validation()
      ];

      return view('criteria/atribut_edit', $data);
   }

   public function updateAtribut($id, $criteria_id)
   {
      // validasi data
      if (!$this->validate([
         'atribut_name' => 'required'
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/criteria/editSub/' . $id)->withInput();
      }

      $this->atributModel->save([
         'atribut_id' => $id,
         'criteria_id' => $criteria_id,
         'atribut_name' => $this->request->getVar('atribut_name')
      ]);

      session()->setFlashdata(['message' => 'Data updated successfully !', 'icon' => 'success']);

      return redirect()->to('/criteria/atribut/' . $criteria_id);
   }
}
