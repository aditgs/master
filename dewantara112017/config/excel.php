<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if($_SERVER['HTTP_HOST']=='localhost'):
$config['excel_url'] = "http://".$_SERVER['HTTP_HOST']."/ci-muria/uploads/";
else:
$config['excel_url'] = "http://sim.muriaps.com/uploads/";
endif;
/* End of file excel.php */
/* Location: ./application/config/excel.php */