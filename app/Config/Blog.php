<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Blog extends BaseConfig
{
   /** In this file you can write "variables" that you think take up too much **/

   /* Will assign role at the moment of create a new user to deafult will be admin */
   public $defaultGroupUsers  = 'admin';

   /* Register limit */
   public $regPerPage  = 10;

}