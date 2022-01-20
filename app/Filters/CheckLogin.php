<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use IonAuth\Libraries\IonAuth;

/**
 * Description of AuthFilter
 *
 * @author christian
 */
class CheckLogin implements FilterInterface
{

   public function before(RequestInterface $request, $arguments = null)
   {
      $ionAuth = new IonAuth();
      if (!$ionAuth->loggedIn()) {
         return redirect()->to('/auth/login');
      }
   }

   //--------------------------------------------------------------------

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
