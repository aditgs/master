<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Umum extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		echo "this is global";
	}
}

/* End of file global.php */
/* Location: ./ */

 ?>