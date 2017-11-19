<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if($_SERVER['HTTP_HOST']=='localhost'):
$config['uploads_url'] = "http://".$_SERVER['HTTP_HOST']."/ci-muria/uploads/";
else:
$config['uploads_url'] = "http://sim.muriaps.com/uploads/";
endif;
/* End of file uploads.php */
/* Location: ./application/config/uploads.php */