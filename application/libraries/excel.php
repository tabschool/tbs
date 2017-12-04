<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed'); 
$Path=base_url().'wordpress/wp-load.php';	
require_once $Path;

class Excel extends PHPExcel {

 public function __construct() {

 parent::__construct();

 }

}

?>