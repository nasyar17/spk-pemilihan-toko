<?php namespace App\Controllers;

use App\Models\TokoModel;
use App\Models\CriteriaModel;
use App\Models\AtributModel;
use App\Models\NilaiModel;
use App\Models\TestingModel;

class Toko extends BaseController
{
   public function __construct()
   {
      $this->tokoModel = new TokoModel();
      $this->criteriaModel = new CriteriaModel();
      $this->atributModel = new AtributModel();
      $this->nilaiModel = new NilaiModel();
      $this->testingModel = new TestingModel();
   }

   public function index($not_active = false)
   {
      $data = [
         'title' => 'Data Toko',
         'toko' => $this->tokoModel->getToko()
      ];

      return view('/toko/index', $data);
   }

   public function index2()
   {
      $data = [
         'title' => 'Data Toko Tidak Aktif',
         'toko' => $this->tokoModel->getTokoNotActive()
      ];
      return view('/toko/index2', $data);
   }

   public function add()
   {
      // session();
      $data = [
         'title' => 'Tambah Toko',
         'jenis_toko' => $this->atributModel->getAtributByCriteria('C0001'),
         'lokasi' => $this->atributModel->getAtributByCriteria('C0002'),
         'ukuran_toko' => $this->atributModel->getAtributByCriteria('C0003'),
         'keramaian_toko' => $this->atributModel->getAtributByCriteria('C0004'),
         'keramaian_sekitar' => $this->atributModel->getAtributByCriteria('C0005'),
         'jam_operasional' => $this->atributModel->getAtributByCriteria('C0006'),
         'validation' => \Config\Services::validation()
      ];

      return view('toko/add', $data);
   }

   public function generateKodeToko()
   {
      $jumlahData = count($this->tokoModel->getToko());
      if ($jumlahData == 0) {
         $jumlahData = 1;
      }
      $kode = 'T' . sprintf("%04d", $jumlahData);
      while ($this->tokoModel->getToko($kode) >= 1) {
         $jumlahData += 1;
         $kode = 'T' . sprintf("%04d", $jumlahData);
      }
      return $kode;
   }

   public function save($from)
   {
      // validasi data
      if (!$this->validate([
         'toko_nama' => [
            'rules' => 'required|is_unique[toko.toko_nama]',
            'errors' => [
               'required' => 'Field harus diisi',
               'is_unique' => 'Nama toko sudah ada'
            ]
         ],
         'alamat' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Field harus diisi'
            ]
         ]
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/toko/add')->withInput()->with('validation', $validation);
      }

      $toko_id = $this->generateKodeToko();
      $data = [
         'toko_id' => $toko_id,
         'toko_nama' => $this->request->getVar('toko_nama'),
         'alamat' => $this->request->getVar('alamat'),
         'tested' => 0,
         'active' => 1
      ];

      // if ($from == 'fromTesting') {
      //    $data['tested'] = 1;
      // }

      $this->tokoModel->insert($data);

      $nilai = [
         [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0001',
            'atribut_id' => $this->request->getVar('jenis_toko')
         ], [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0002',
            'atribut_id' => $this->request->getVar('lokasi')
         ], [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0003',
            'atribut_id' => $this->request->getVar('ukuran_toko')
         ], [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0004',
            'atribut_id' => $this->request->getVar('keramaian_toko')
         ], [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0005',
            'atribut_id' => $this->request->getVar('keramaian_sekitar')
         ], [
            'toko_id' => $toko_id,
            'criteria_id' => 'C0006',
            'atribut_id' => $this->request->getVar('jam_operasional')
         ],
      ];

      $this->nilaiModel->insertBatch($nilai);

      session()->setFlashdata(['message' => 'Data added successfully !', 'icon' => 'success']);

      if ($from == 'fromToko') {
         return redirect()->to('/toko');
      } else {
         return redirect()->to('/testing/calculate/' . $toko_id);
      }
   }

   public function edit($toko_id)
   {
      $data = [
         'title' => 'Edit Toko',
         'jenis_toko' => $this->atributModel->getAtributByCriteria('C0001'),
         'lokasi' => $this->atributModel->getAtributByCriteria('C0002'),
         'ukuran_toko' => $this->atributModel->getAtributByCriteria('C0003'),
         'keramaian_toko' => $this->atributModel->getAtributByCriteria('C0004'),
         'keramaian_sekitar' => $this->atributModel->getAtributByCriteria('C0005'),
         'jam_operasional' => $this->atributModel->getAtributByCriteria('C0006'),
         'toko' => $this->tokoModel->getToko($toko_id),
         'nilai' => $this->nilaiModel->getJoin($toko_id),
         'validation' => \Config\Services::validation()
      ];

      return view('toko/edit', $data);
   }

   public function update($toko_id)
   {
      $toko = $this->tokoModel->getToko($toko_id);

      // validasi data
      if ($toko['toko_nama'] == $this->request->getVar('toko_nama')) {
         $rules = 'required';
      } else {
         $rules = 'required|is_unique[toko.toko_nama]';
      }

      if (!$this->validate([
         'toko_nama' => [
            'rules' => $rules,
            'errors' => [
               'required' => 'Field harus diisi',
               'is_unique' => 'Nama toko sudah ada'
            ]
         ],
         'alamat' => [
            'rules' => 'required',
            'errors' => [
               'required' => 'Field harus diisi'
            ]
         ]
      ])) {
         $validation = \Config\Services::validation();
         return redirect()->to('/toko/' . $toko_id)->withInput()->with('validation', $validation);
      }

      $data = [
         'toko_id' => $toko_id,
         'toko_nama' => $this->request->getVar('toko_nama'),
         'alamat' => $this->request->getVar('alamat')
      ];

      $this->tokoModel->save($data);

      $nilai_id_awal = $this->request->getVar('nilai_id_awal');
      $nilai = [
         [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('jenis_toko')
         ], [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('lokasi')
         ], [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('ukuran_toko')
         ], [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('keramaian_toko')
         ], [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('keramaian_sekitar')
         ], [
            'nilai_id' => $nilai_id_awal++,
            'atribut_id' => $this->request->getVar('jam_operasional')
         ],
      ];
      $this->nilaiModel->updateBatch($nilai, 'nilai_id');

      session()->setFlashdata(['message' => 'Data updated successfully !', 'icon' => 'success']);

      return redirect()->to('/toko');
   }

   public function delete($toko_id)
   {
      $this->tokoModel->delete($toko_id);
      $this->nilaiModel->deleteByToko($toko_id);
      $this->testingModel->deleteByToko($toko_id);

      session()->setFlashdata(['message' => 'Data deleted successfully !', 'icon' => 'success']);
      return redirect()->to('/toko');
   }

   public function toActive($active, $toko_id)
   {
      if ($active == 1) {
         $data = [
            'toko_id' => $toko_id,
            'active' => 0
         ];
         session()->setFlashdata(['message' => 'Data deleted successfully !', 'icon' => 'success']);
      } else {
         $data = [
            'toko_id' => $toko_id,
            'active' => 1
         ];
         session()->setFlashdata(['message' => 'Data activated successfully !', 'icon' => 'success']);
      }

      $this->tokoModel->save($data);
      return redirect()->to('/toko');
   }
}
