<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
   // set your specific config
   // public $siteTitle                = 'Example.com';       // Site Title, example.com
   // public $adminEmail               = 'admin@example.com'; // Admin Email, admin@example.com
   // public $emailTemplates           = 'App\\Views\\auth\\email\\';
   // ...
   public $identity                 = 'username';

   public $tables = [
      'users'          => 'auth_users',
      'groups'         => 'auth_groups',
      'users_groups'   => 'auth_users_groups',
      'login_attempts' => 'auth_login_attempts',
   ];
}
