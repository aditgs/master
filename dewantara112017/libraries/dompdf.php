<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// require APPPATH . 'libraries/Ion_auth/Ion_auth.php';
// require APPPATH.'third_party/dompdf/dompdf_config.inc.php';//dompdflawas

// require APPPATH.'third_party/dompdf/vendor/autoload.php'; //dompdf baru via composer
require APPPATH.'third_party/dompdf/autoload.inc.php'; //dompdf baru via composer
use Dompdf\Dompdf;
class pdf extends Dompdf {
	public function __construct($config = array()) {
        parent::__construct($config);

        log_message('info', 'Dompdf Class Initialized');
    }

}

/* End of file Authentication.php */
/* Location: ./application/libraries/Authentication.php */