<?php namespace App\Controllers;

use \App\Models\TrainingModel;
use App\Models\CriteriaModel;
use App\Models\AtributModel;
use App\Models\TokoModel;
use App\Models\NilaiModel;
use App\Models\TestingModel;
use mikehaertl\wkhtmlto\Pdf;

class Testing extends BaseController
{
	public function __construct()
	{
		$this->trainingModel = new TrainingModel();
		$this->criteriaModel = new CriteriaModel();
		$this->atributModel = new AtributModel();
		$this->tokoModel = new TokoModel();
		$this->nilaiModel = new NilaiModel();
		$this->testingModel = new TestingModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Testing',
			'criteria' => $this->criteriaModel->getCriteria(),
			'atribut' => $this->atributModel->getAtribut(),
			'validation' => \Config\Services::validation(),
			'toko' => $this->tokoModel->getToko()
		];
		return view('testing/index', $data);
	}

	public function addCriteria($toko_id = false)
	{
		if ($toko_id == false) {
			$data = [
				'title' => 'Input Nilai Kriteria',
				'validation' => \Config\Services::validation(),
				'jenis_toko' => $this->atributModel->getAtributByCriteria('C0001'),
				'lokasi' => $this->atributModel->getAtributByCriteria('C0002'),
				'ukuran_toko' => $this->atributModel->getAtributByCriteria('C0003'),
				'keramaian_toko' => $this->atributModel->getAtributByCriteria('C0004'),
				'keramaian_sekitar' => $this->atributModel->getAtributByCriteria('C0005'),
				'jam_operasional' => $this->atributModel->getAtributByCriteria('C0006'),
			];
			return view('testing/addCriteria1', $data);
		} else {
			$data = [
				'title' => 'Input Kriteria',
				'nilai' => $this->nilaiModel->getJoin($toko_id),
				'toko' => $this->tokoModel->getToko($toko_id)
			];

			return view('testing/addCriteria2', $data);
		}
	}

	public function calculate($toko_id)
	{
		$data = [
			'title' => 'Hasil Hitung',
			'toko' => $this->tokoModel->getToko($toko_id),
			'nilai' => $this->nilaiModel->getJoin($toko_id),
			'criteria' => $this->criteriaModel->getCriteria()
		];

		$data['selectedCriteria'] = [
			'jenis_toko' 			=> $data['nilai'][0]['atribut_name'],
			'lokasi' 				=> $data['nilai'][1]['atribut_name'],
			'ukuran_toko' 			=> $data['nilai'][2]['atribut_name'],
			'keramaian_toko' 		=> $data['nilai'][3]['atribut_name'],
			'keramaian_sekitar' 	=> $data['nilai'][4]['atribut_name'],
			'jam_operasional' 	=> $data['nilai'][5]['atribut_name'],
		];

		$data['valueCriteria'] = $this->trainingModel->getEachCriteria($data['selectedCriteria']);
		// print_r($data['valueCriteria']);
		// ambil total data class rugi dan profit dan total data
		$data['quantityByLabel'] = [
			'Profit' => $this->trainingModel->getProfit(),
			'Rugi' => $this->trainingModel->getRugi(),
			'Total' => $this->trainingModel->getProfit() + $this->trainingModel->getRugi()
		];
		// dd($data['quantityByLabel']);

		$data['qJenisToko'] = $this->trainingModel->getJenisToko($this->atributModel->getAtributByCriteria('C0001'));
		$data['qLokasi'] = $this->trainingModel->getLokasi($this->atributModel->getAtributByCriteria('C0002'));
		$data['qUkuranToko'] = $this->trainingModel->getUkuranToko($this->atributModel->getAtributByCriteria('C0003'));
		$data['qKeramaianToko'] = $this->trainingModel->getKeramaianToko($this->atributModel->getAtributByCriteria('C0004'));
		$data['qKeramaianSekitar'] = $this->trainingModel->getKeramaianSekitar($this->atributModel->getAtributByCriteria('C0005'));
		$data['qJamOperasional'] = $this->trainingModel->getJamOperasional($this->atributModel->getAtributByCriteria('C0006'));


		// BAGI PER ATRIBUT
		for ($i = 0; $i < count($data['selectedCriteria']); $i++) {

			foreach ($data['valueCriteria'] as $key => $value) {

				$rekapNilai[$key][array_keys($value)[$i]] = number_format($value[array_keys($value)[$i]] / $data['quantityByLabel'][$key], 3, '.', '.');
			}
		}

		$rekapNilai['Profit']['prior'] = number_format($data['quantityByLabel']['Profit'] / $data['quantityByLabel']['Total'], 3, '.', '.');
		$rekapNilai['Rugi']['prior'] = number_format($data['quantityByLabel']['Rugi'] / $data['quantityByLabel']['Total'], 3, '.', '.');

		// Hitung Hasil Akhir
		$rekapNilai['Profit']['nilaiakhir'] = number_format(array_product($rekapNilai['Profit']), 5, '.', '.');
		$rekapNilai['Rugi']['nilaiakhir'] = number_format(array_product($rekapNilai['Rugi']), 5, '.', '.');
		$data['rekapNilai'] = $rekapNilai;

		if ($rekapNilai['Profit']['nilaiakhir'] > $rekapNilai['Rugi']['nilaiakhir']) {
			$result = 'Profit';
		} else {
			$result = 'Rugi';
		}

		$update = [
			'result' => $result
		];

		if ($data['toko']['tested'] == 1) {
			$saveTesting = [
				'testing_id' 	=> $this->generateKodeTesting(),
				'toko_id' 		=> $toko_id,
				'result' 		=> $result
			];
			$this->testingModel->insert($saveTesting);
		}
		$this->tokoModel->save([
			'toko_id' => $toko_id,
			'tested' => 1
		]);
		return view('testing/result', $data);
	}

	public function generateKodeTesting()
	{
		$jumlahData = count($this->testingModel->getTesting());
		if ($jumlahData == 0) {
			$jumlahData = 1;
		}
		$kode = 'TS' . sprintf("%03d", $jumlahData);
		while ($this->testingModel->getTesting($kode) >= 1) {
			$jumlahData += 1;
			$kode = 'TS' . sprintf("%03d", $jumlahData);
		}
		return $kode;
	}

	public function history($type = false, $month = false)
	{
		$data = [
			'title' => 'History Perhitungan',
		];

		if ($type == false) {
			$data['testing'] = $this->testingModel->getHistory();
			$data['active'] = 'all';
		} elseif ($type == 'today') {
			$data['testing'] = $this->testingModel->getHistory(date('Y-m-d'), false);
			$data['active'] = 'today';
		} elseif ($type == 'thisweek') {
			$data['testing'] = $this->testingModel->getHistory(date('Y-m-d'), date('Y-m-d', strtotime('-7 days')));
			$data['active'] = 'thisweek';
		} elseif ($type == 'month') {
			$data['testing'] = $this->testingModel->getHistory(date("Y-m-t", strtotime($month)), $month);
			$data['active'] = 'month';
		}
		return view('testing/history', $data);
	}

	public function laporan()
	{
		$tgl_awal = $this->request->getVar('tgl_awal');
		$tgl_akhir = $this->request->getVar('tgl_akhir');
		if ($tgl_awal == '') {
			$tgl_awal = '1999-01-01';
		}
		if ($tgl_akhir == '') {
			$tgl_akhir = date('Y-m-d');
		}

		$data = [
			'title' => 'Preview Laporan',
			'testing' => $this->testingModel->getTestingByTanggal($tgl_awal, $tgl_akhir),
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir
		];

		return view('testing/laporan', $data);
	}

	function htmlToPDF($tgl_awal, $tgl_akhir)
	{
		$data = [
			'title' => 'Preview Laporan',
			'testing' => $this->testingModel->getTestingByTanggal($tgl_awal, $tgl_akhir),
			'tgl_awal' => $tgl_awal,
			'tgl_akhir' => $tgl_akhir
		];

		$html = view('/testing/laporan_print', $data);
		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream('laporan-' . date('Y-m-d'));
	}

	public function cetak($toko_id)
	{
		$data = [
			'title' => 'Hasil Hitung',
			'toko' => $this->tokoModel->getToko($toko_id),
			'nilai' => $this->nilaiModel->getJoin($toko_id),
			'criteria' => $this->criteriaModel->getCriteria()
		];

		$data['selectedCriteria'] = [
			'jenis_toko' 			=> $data['nilai'][0]['atribut_name'],
			'lokasi' 				=> $data['nilai'][1]['atribut_name'],
			'ukuran_toko' 			=> $data['nilai'][2]['atribut_name'],
			'keramaian_toko' 		=> $data['nilai'][3]['atribut_name'],
			'keramaian_sekitar' 	=> $data['nilai'][4]['atribut_name'],
			'jam_operasional' 	=> $data['nilai'][5]['atribut_name'],
		];

		$data['valueCriteria'] = $this->trainingModel->getEachCriteria($data['selectedCriteria']);

		// ambil total data class rugi dan profit dan total data
		$data['quantityByLabel'] = [
			'Profit' => $this->trainingModel->getProfit(),
			'Rugi' => $this->trainingModel->getRugi(),
			'Total' => $this->trainingModel->getProfit() + $this->trainingModel->getRugi()
		];

		$data['qJenisToko'] = $this->trainingModel->getJenisToko($this->atributModel->getAtributByCriteria('C0001'));
		$data['qLokasi'] = $this->trainingModel->getLokasi($this->atributModel->getAtributByCriteria('C0002'));
		$data['qUkuranToko'] = $this->trainingModel->getUkuranToko($this->atributModel->getAtributByCriteria('C0003'));
		$data['qKeramaianToko'] = $this->trainingModel->getKeramaianToko($this->atributModel->getAtributByCriteria('C0004'));
		$data['qKeramaianSekitar'] = $this->trainingModel->getKeramaianSekitar($this->atributModel->getAtributByCriteria('C0005'));
		$data['qJamOperasional'] = $this->trainingModel->getJamOperasional($this->atributModel->getAtributByCriteria('C0006'));

		// BAGI PER ATRIBUT
		for ($i = 0; $i < count($data['selectedCriteria']); $i++) {
			foreach ($data['valueCriteria'] as $key => $value) {
				$rekapNilai[$key][array_keys($value)[$i]] = number_format($value[array_keys($value)[$i]] / $data['quantityByLabel'][$key], 3, '.', '.');
			}
		}
		$rekapNilai['Profit']['prior'] = number_format($data['quantityByLabel']['Profit'] / $data['quantityByLabel']['Total'], 3, '.', '.');
		$rekapNilai['Rugi']['prior'] = number_format($data['quantityByLabel']['Rugi'] / $data['quantityByLabel']['Total'], 3, '.', '.');

		// Hitung Hasil Akhir
		$rekapNilai['Profit']['nilaiakhir'] = number_format(array_product($rekapNilai['Profit']), 5, '.', '.');
		$rekapNilai['Rugi']['nilaiakhir'] = number_format(array_product($rekapNilai['Rugi']), 5, '.', '.');
		$data['rekapNilai'] = $rekapNilai;

		if ($rekapNilai['Profit']['nilaiakhir'] > $rekapNilai['Rugi']['nilaiakhir']) {
			$result = 'Profit';
		} else {
			$result = 'Rugi';
		}

		$html = view('/testing/result_print', $data);
		$dompdf = new \Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$options = $dompdf->getOptions();
		$options->setDefaultFont('arial');
		$dompdf->setOptions($options);
		$dompdf->render();
		$dompdf->stream('perhitungan-' . $toko_id);
	}
}
