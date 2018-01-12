<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Setup extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('tarif_model','tarifdb',TRUE);
		$this->load->model('jenis/jenis_model','jenisdb',TRUE);
		if ( !$this->ion_auth->logged_in()): 
			redirect('auth/login', 'refresh');
		endif;
		$this->template->set_layout('dashboard');
	}
	public function index() {
        $this->template->set_title('Kelola Tarif');
        $this->template->add_js('var baseurl="'.base_url().'tarif/";','embed');  
        $this->template->add_js('modules/tarif.js');  
        $tahun=array(
            '0'=>'-- Pilih Tahun --',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2020',
            '2021'=>'2021',
        );
        $this->template->load_view('tarif_view',array(
            'view'=>'form_setup_tarif',
            'opt_jenis'=>$this->tarifdb->dropdown_jenis(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_angkatan'=>$this->tarifdb->dropdown_angkatan(),
            'jenis'=>$this->jenisdb->getall(),
            'opt_tahun'=>$tahun,
            'title'=>'Setup Tarif Dasar',
            'subtitle'=>'Setup Tarif',
            'breadcrumb'=>array(
            'Tarif'),
        ));
    }
    function __form_validation(){}
    function submit(){

    }
}

/* End of file setup.php */
/* Location: ./ */

 ?>