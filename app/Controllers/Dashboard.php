<?php namespace App\Controllers;

use App\Models\TrainingModel;
use App\Models\AtributModel;
use App\Models\CriteriaModel;
use App\Models\TokoModel;
use App\Models\TestingModel;

class Dashboard extends BaseController
{

   public function __construct()
   {
      // dd($_SESSION);
      $this->trainingModel = new TrainingModel();
      $this->atributModel = new AtributModel();
      $this->criteriaModel = new CriteriaModel();
      $this->testingModel = new TestingModel();
      $this->tokoModel = new TokoModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Dashboard',
         'jmlToko' => count($this->tokoModel->getToko()),
         'jmlTraining' => count($this->trainingModel->getTraining()),
         'jmlTesting' => count($this->testingModel->getTesting()),
         'recapTraining' => $this->trainingModel->getRecapData(),
         'recapTesting' => $this->testingModel->getRecapData(),
         'testing' => $this->testingModel->getLatestTesting()
      ];

      return view('dashboard', $data);
   }
}
