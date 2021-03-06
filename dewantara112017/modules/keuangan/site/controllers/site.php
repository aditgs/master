<?php 

class Site extends MX_Controller{
	function __construct(){
		parent::__construct();
		 if ($this->session->userdata("login") != TRUE) {
            $this->session->set_flashdata('login_notif','<p>You must be logged in</p>');
            //redirect('login', 'refresh');
        }
        //Load IgnitedDatatables Library
        $this->load->library(array('Datatables','template','Ion_auth/Ion_auth'));
        $this->load->model('site_model','sitedb',TRUE);
        $this->load->library('form_validation');
        $this->load->helper('url','form');
        
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->helper('language');
        
        // if(isset($this->session->userdata('modules')))

        if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('siku');
            redirect('auth/login', 'refresh');
        else:
            if(!$this->ion_auth->in_group(array(1,2,3,11))){
            // redirect('../site', 'refresh');
            redirect('../auth/logout', 'refresh');
            }
        endif;


	}
    function index(){
        $this->session->set_userdata("module",'siku');
        redirect('dashboard','refresh');
    }
	function indexx    (){
        // echo frontend_url();
        $this->template->set_layout('default');
        $this->template->load_view('site',array());

	}

}

 ?>