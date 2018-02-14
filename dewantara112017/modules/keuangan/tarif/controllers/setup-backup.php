<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Setup extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('tarif_model','tarifdb',TRUE);
		$this->load->model('tarif/setup_model','setdb',TRUE);
		$this->load->model('jenis/jenis_model','jenisdb',TRUE);
		if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('siku');
			redirect('auth/login', 'refresh');
		endif;
		
		 $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        // $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

        /*UNTUK KEPERLUAN FORM*/
        // $this->template->add_js('accounting.min.js');
        // $this->template->add_js('jquery.maskMoney.min.js');   
        // $this->template->add_css('plugins/datapicker/datepicker3.css');
        // $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        // $this->template->add_js('datepicker.js'); //tanggal
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        
        /*ONLINE CDN*/
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js','cdn');
        // $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js','cdn');
        // $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css','cdn');
        // $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/jquery.maskmoney/3.0.2/jquery.maskMoney.min.js','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/accounting.js/0.3.2/accounting.min.js','cdn');
	}
	public function index() {
        $this->template->set_title('Kelola Tarif');
        $this->template->add_js('var baseurl="'.base_url().'tarif/setup/";','embed');  
        $this->template->add_js('modules/setuptarif.js');  
        $tahun=array(
            '0'=>'-- Pilih Tahun --',
			'2013'=>'2013',
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
    function getdata(){

    }
    function genkode(){
    	// $data=json_decode($this->input->post('data'));
    	$data=($this->input->post('data',true));
    	$detail=($this->input->post('detail',true));
    	// foreach ($data as $key => $value) {
    		$dx=array(
    			'angkatan'=>(isset($data[0]['value'])?substr($data[0]['value'],2,2):'00'),
    			'prodi'=>(isset($data[1]['value'])?$data[1]['value']:'00'),
    			'jenis'=>'00',
    			'kelompok'=>(isset($data[2]['value'])?$data[2]['value']:'0'),
    			'tahun'=>(isset($data[3]['value'])?$data[3]['value']:'0000'),
    			'smster'=>(isset($data[10]['value'])?$data[10]['value']:'0'),
    		);
    		echo implode("", $dx);
    		# code...
    	// }
    	// print_r(array_search('angkatan',$data[1]));
    	// $dx['id']=$data[0]['value'];
    	// $ang=($data[1]['value']$data[1]['value']);
    	// $prodi=($data[2]['value']);
    	// $kel=($data[3]['value']);
    
    	
    	// print_r($data);
    	
    }
   function __formvalidation(){
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim|xss_clean');
        // $this->form_validation->set_rules('kodeT[]', 'Kode Tarif', 'required|trim|xss_clean');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|xss_clean');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim|xss_clean');
        // $this->form_validation->set_rules('tarif[]','Item Tarif Tagihan ','required|numeric|trim|xss_clean');

       

        if ($this->form_validation->run() == FALSE)
            {
                // $this->session->set_flashdata(validation_errors());             
                return json_encode(array('st'=>0, 'msg' => validation_errors()));
                // return FALSE;
            }
        else{
            return TRUE;
        }
        // return $status;
    }
    function __submit(){
        $angktn=$this->input->post('angkatan');
        $prodi=$this->input->post('prodi');
        $kodet=$this->input->post('KodeT[]');
        $tarif=$this->input->post('Tarif[]');
        // print_r($this->input->post('KodeT[]'));
    	// print_r($kodet);
    	// print_r($tarif);
    	$smster=$this->input->post('semester');
    	$kel=$this->input->post('kelompok');
    	$tahun=$this->input->post('tahun');
    	$datasetup=array(
    		'angktn'=>$angktn,
    		'prodi'=>$prodi,
    		'idprodi'=>$prodi,
    		'idkel'=>$kel,
    		'thn'=>$tahun,
    		'userid'=>userid(),
    		'datetime'=>NOW(),
    	);
       /* foreach ($kodet as $k => $v) {
            # code...
            // $data['KodeT']=$
            print_r($v);
        }
        foreach ($tarif as $ky => $val) {
            # code...
            print_r($val);
        }*/

    		// 'kodet'=>$kodet,
        // return array('setup'=>$datasetup);
    	return (array('setup'=>$datasetup));
    	/*foreach ($kodet as $k => $v) {
    		print_r($v);
    		# code...
    	}*/
    }
    function submit(){
    	
    	if($this->__formvalidation()===TRUE):
    		$x=($this->__submit());
    		 if ($this->input->post('ajax')){
              if ($this->input->post('id')){
                $this->tagihdb->update($this->input->post('id'));
              // }elseif ($this->input->post('kode')){
                // $this->tagihdb->updatebykode($this->input->post('kode'));
              }else{
                //$this->tagihdb->save();
                // $this->tagihdb->saveas();
                $idx=$this->setdb->savesetup($x['setup']);
                // $this->setdb->savetarifbatch($dx);
              }

            }else{
              if ($this->input->post('submit')){
                  if ($this->input->post('id')){
                    $this->tagihdb->update($this->input->post('id'));
                  }else{
                    //$this->tagihdb->save();
                    $this->setdb->savesetup($x['setup']);
                    // $this->setdb->savetarifbatch($dx);
                    // $this->tagihdb->saveas();
                  }
              }
            }
    		echo json_encode(array('st'=>1, 'msg' => "<i class='fa fa-check'></i> Setup Tarif Berhasil Disimpan"));
  		else:
            echo $this->__formvalidation();
        endif;
    	// print_r();

    }
}

/* End of file setup.php */
/* Location: ./ */

 ?>