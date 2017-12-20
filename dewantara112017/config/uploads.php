<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if($_SERVER['HTTP_HOST']=='localhost'):
$config['uploads_url'] = "http://".$_SERVER['HTTP_HOST']."/uploads/";
else:
$config['uploads_url'] = "http://dev.jurnalstiedewantara.com/uploads/";
endif;
/* End of file uploads.php */
/* Location: ./application/config/uploads.php */