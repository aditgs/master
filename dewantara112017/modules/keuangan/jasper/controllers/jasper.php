<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Jasper extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->template->load_view('jasperview');
	}
}

/* End of file jasper.php */
/* Location: ./ */ ?>