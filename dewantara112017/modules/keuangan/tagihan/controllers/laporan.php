
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan extends MX_Controller {
	function __construct(){
		parent::__construct();

		if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
	}
	public function index()
	{
        $this->template->set_layout('dashboard');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        $this->template->add_js('
            var baseurl="'.base_url('tagihan').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap input-lg"
            });
          ','embed');  
        $this->template->add_js('modules/tagihan.02.js');
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'form_laporan',
            'title'=>'Laporan Tagihan',
            'subtitle'=>'Laporan Tagihan',
            'action'=>base_url('tagihan/laporan/get_laporan/pdf')
   			));
		
	}
	 function enkrip(){
        return md5($this->session->userdata('lihat').":".userid()."+".date('H:m'));
        // echo $this->session->userdata('tagihanmhs');
    }
}

/* End of file laporan.php */
/* Location: ./ */
 ?>