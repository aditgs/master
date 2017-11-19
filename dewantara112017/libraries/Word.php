<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 *  ======================================= 
 *  Author     : Syahroni Wahyu Iriananda
 *  License    : Protected 
 *  Email      : roniwahyu@gmail.com 
 *   
 *  PHPWORD untuk Codeigniter
 * Dilarang merubah, mengganti dan mendistribusikan 
 *  ulang tanpa sepengetahuan Author 
 *  ======================================= 
 */  
require_once APPPATH."/third_party/PHPWord.php"; 

class Word extends PHPWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}