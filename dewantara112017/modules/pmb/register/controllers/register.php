<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Register extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		redirect('../auth/pmb/register');

	}
	
}

/* End of file register.php */
/* Location: ./ */ ?>