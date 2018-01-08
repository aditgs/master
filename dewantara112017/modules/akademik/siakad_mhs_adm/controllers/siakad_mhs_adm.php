<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class siakad_mhs_adm extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('siakad_mhs_adm_model','siakad_mhs_admdb',TRUE);
        $this->session->set_userdata('lihat','siakad_mhs_adm');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

        /*UNTUK KEPERLUAN FORM*/
        /*$this->template->add_js('accounting.min.js');
        $this->template->add_js('jquery.maskMoney.min.js');   
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js'); //tanggal
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');*/
        
        /*ONLINE CDN*/
        /*$this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js','cdn');
        $this->template->add_js('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css','cdn');
        $this->template->add_css('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/jquery.maskmoney/3.0.2/jquery.maskMoney.min.js','cdn');
        $this->template->add_js('https://cdn.jsdelivr.net/accounting.js/0.3.2/accounting.min.js','cdn');
        */
    }

    public function index() {
        $this->template->set_title('Kelola Siakad_mhs_adm');
        $this->template->add_js('var baseurl="'.base_url().'siakad_mhs_adm/";','embed');  
        $this->template->load_view('siakad_mhs_adm_view',array(
            'view'=>'',
            'title'=>'Kelola Data Siakad_mhs_adm',
            'subtitle'=>'Pengelolaan Siakad_mhs_adm',
            'breadcrumb'=>array(
            'Siakad_mhs_adm'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Siakad_mhs_adm');
        $this->template->add_js('var baseurl="'.base_url().'siakad_mhs_adm/";','embed');  
        $this->template->load_view('siakad_mhs_adm_view',array(
            'view'=>'Siakad_mhs_adm_data',
            'title'=>'Kelola Data Siakad_mhs_adm',
            'subtitle'=>'Pengelolaan Siakad_mhs_adm',
            'breadcrumb'=>array(
            'Siakad_mhs_adm'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Siakad_mhs_adm');
        $this->template->add_js('var baseurl="'.base_url().'siakad_mhs_adm/";','embed');  
        $this->template->load_view('siakad_mhs_adm_view',array(
            'view'=>'',
            'title'=>'Kelola Data Siakad_mhs_adm',
            'subtitle'=>'Pengelolaan Siakad_mhs_adm',
            'breadcrumb'=>array(
            'Siakad_mhs_adm'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->siakad_mhs_admdb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->siakad_mhs_admdb->genfaktur();
            $data['Faktur']=$faktur; //nama field perlu menyesuaikan tabel
            $data['userid']=userid();
            $data['datetime']=date('Y-m-d H:m:s');
            $data['islocked']=1;
            $id=$this->__submitnomor($data);
        }
       
        $session=array('new'=>false,'edit'=>true);
        $nopo=array('faktur'=>$faktur,'idx'=>$id);
        $default['faktur']=$faktur;
    
        return (json_encode($nopo));
        // return base64_encode(json_encode($nopo));
        // echo base64_encode(json_encode($nopo));
    }
    function __submitnomor($data){

       $this->db->insert('siakad_mhs_adm',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('siakad_mhs_adm',$data);
    }
     
     //<!-- Start Primary Key -->
    

}

/** Module siakad_mhs_adm Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
