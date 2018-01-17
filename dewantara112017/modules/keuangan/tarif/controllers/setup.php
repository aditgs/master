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
        $this->template->add_js('modules/setuptarif.0.1.js');  
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
            // 'opt_angkatan'=>$this->tarifdb->dropdown_angkatan(),
            'opt_angkatan'=>$tahun,
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
            $kode=implode("", $dx);
            $paket=$dx;
            unset($paket['jenis']);
            
    		$paket=implode("", $paket);
            $pakettarif=$this->tarifdb->getpakettarif($paket);

            if(count($pakettarif)>0):
                echo json_encode(array('kode'=>$kode,'paket'=>$paket,'st'=>0,'msg'=>'<h3 class="text-center alert-danger alert"><i class="fa fa-warning fa2x" ></i> Kode sudah pernah digenerasi, proses generasi tidak dapat dilanjutkan</h3>'));
            else:
                echo json_encode(array('kode'=>$kode,'paket'=>$paket,'st'=>1,'msg'=>'Kode dapat digenerasi'));
            endif;
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
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required|trim|numeric|greater_than[0]|xss_clean');
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim|numeric|greater_than[0]|xss_clean');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim|numeric|greater_than[0]|xss_clean');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|numeric|greater_than[0]|xss_clean');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim|numeric|greater_than[0]|xss_clean');

       

        if ($this->form_validation->run() == FALSE)
            {
                return json_encode(array('st'=>0, 'msg' => validation_errors()));

            }
        else{
            return TRUE;
        }

    }
    function __datasetup(){
        $angktn=$this->input->post('angkatan');
        $idprodi=$this->input->post('prodi');
        $kel=$this->input->post('kelompok');
        $thn=$this->input->post('tahun');
        $smster=$this->input->post('semester');
        $prodi=$this->tarifdb->bacaprodi($idprodi);
        $data=array(
            'angktn'=>$angktn,
            'prodi'=>$prodi['Prodi'],
            'idprodi'=>$prodi['id'],
            'idkel'=>$kel,
            'smster'=>$smster,
            'thn'=>$thn,
            'userid'=>userid(),
            'datetime'=>NOW(),
        );
        return $data;
    }
    function __detailtarif($setid=null){
        $kode=$this->input->post('kode');
        $tarif=$this->input->post('tarif');
        foreach ($kode as $key => $value) {
            # code...
            // print_r($value)
            $data[]=array(
                'KodeT'=>$value['value'],
                'Tarif'=>$tarif[$key]['value'],
                'isactive'=>1,
                'parent'=>0,
                'setupid'=>$setid,
                'userid'=>userid(),
                'datetime'=>NOW(),
            );
        }
        return $data;

    }
    function submit(){
        if($this->__formvalidation()===true):
            $x=$this->__datasetup();
          
            
            if ($this->input->post('ajax')){
              if ($this->input->post('id')){
                $this->tagihdb->update($this->input->post('id'));
              }else{
                $idx=$this->setdb->savesetup($x);
                $y=$this->__detailtarif($idx);
                $this->setdb->savetarifbatch($y);
              }
            }else{
              if ($this->input->post('submit')){
                  if ($this->input->post('id')){
                    $this->tagihdb->update($this->input->post('id'));

                  }else{
                    $idx=$this->setdb->savesetup($x);
                    $y=$this->__detailtarif($idx);
                    $this->setdb->savetarifbatch($y);
                    // $this->setdb->savetarifbatch($idx);
                  }
              }
            }
            echo json_encode(array('st'=>1, 'msg' => '<h3 class="text-center alert-success alert"><i class="fa fa-check fa2x" ></i> Generasi Tarif Sukses!, Setup Tarif Berhasil Disimpan</h3>'));
        else:
            echo $this->__formvalidation();
        endif;
    }
}

/* End of file setup.php */
/* Location: ./ */

 ?>