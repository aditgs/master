<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Auth extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('Datatables','Ion_auth/Ion_auth'));

	}

	public function logout(){
		redirect('../auth/logout','refresh');
	}
	public function index(){
		$this->template->set_layout('dashboard');
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
        {
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else{
		redirect('../auth','refresh');
		}
	}
	public function login()
	{
		redirect('../auth/login/','refresh');
	}
	public function register(){
		redirect('../auth/create_user','refresh');
	}
}

/* End of file auth.php */
/* Location: ./ */
 ?>