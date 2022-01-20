<?php namespace App\Controllers;

class Laporan extends BaseController
{
   public function index()
   {
      $data = [
         'title' => 'Menu Laporan'
      ];
      return view('laporan/index', $data);
   }

   //--------------------------------------------------------------------

}
