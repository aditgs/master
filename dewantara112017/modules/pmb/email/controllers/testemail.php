<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Testemail extends MX_Controller {
	function __construct(){
		parent::__construct();
	}
	public function index()
	{
		
	}


 
    function sendMail() {
        $ci = get_instance();
        $ci->load->library('email');
        // $config['protocol'] = "smtp";
        // $config['smtp_host'] = "ssl://smtp.gmail.com";
        // $config['smtp_port'] = "465";
        // $config['smtp_user'] = "opickgm@gmail.com";
        // $config['smtp_pass'] = "latansa876";   
        $config['protocol'] = "smtp";

        /*$config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "roniwahyu@gmail.com";
        $config['smtp_pass'] = "qwe987asd654";  
        */
        $config['smtp_host'] = "ssl://mail.jurnalstiedewantara.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "sika@jurnalstiedewantara.com";
        $config['smtp_pass'] = "@n3363aaz";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from($config['smtp_user'], 'oke');
        $list = array('roniwahyu@gmail.com');
        $ci->email->to($list);
        $ci->email->subject('Ini tstasda');
        $ci->email->message('Coba email');
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}

/* End of file testemail.php */
/* Location: ./ */ ?>