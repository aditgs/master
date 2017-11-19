<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class auth_ajax extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->render('views/auth_ajax');
	}	
}

/* End of file auth_ajax.php */
/* Location: ./ */
 ?>