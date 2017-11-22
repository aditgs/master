<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class siakad_keu_paket_komp extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('siakad_keu_paket_komp_model','siakad_keu_paket_kompdb',TRUE);
        $this->session->set_userdata('lihat','siakad_keu_paket_komp');
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
        $this->template->set_title('Kelola Paket Tagihan Biaya');
        $this->template->add_js('var baseurl="'.base_url().'siakad_keu_paket_komp/";','embed');  
        $this->template->load_view('siakad_keu_paket_komp_view',array(
            'view'=>'datapakettagihan',
            'title'=>'Kelola Data Paket Tagihan Biaya',
            'subtitle'=>'Pengelolaan Paket Tagihan Biaya',
            'breadcrumb'=>array(
            'Siakad_keu_paket_komp'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Paket Tagihan Biaya');
        $this->template->add_js('var baseurl="'.base_url().'siakad_keu_paket_komp/";','embed');  
        $this->template->load_view('siakad_keu_paket_komp_view',array(
            'view'=>'Siakad_keu_paket_komp_data',
            'title'=>'Kelola Data Paket Tagihan Biaya',
            'subtitle'=>'Pengelolaan Paket Tagihan Biaya',
            'breadcrumb'=>array(
            'Siakad_keu_paket_komp'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Paket Tagihan Biaya');
        $this->template->add_js('var baseurl="'.base_url().'siakad_keu_paket_komp/";','embed');  
        $this->template->load_view('siakad_keu_paket_komp_view',array(
            'view'=>'',
            'title'=>'Kelola Data Paket Tagihan Biaya',
            'subtitle'=>'Pengelolaan Paket Tagihan Biaya',
            'breadcrumb'=>array(
            'Siakad_keu_paket_komp'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->siakad_keu_paket_kompdb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->siakad_keu_paket_kompdb->genfaktur();
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

       $this->db->insert('siakad_keu_paket_komp',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('siakad_keu_paket_komp',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        // if($this->isadmin()==1):
            $this->datatables->select('a.id_siakad_keu_paket_komp,b.nm_paket,c.nm_tagihan,c.nominal_biaya')
                            ->from('siakad_keu_paket_komp as a')
                            ->join('siakad_keu_paket as b','a.id_siakad_keu_paket=b.id_siakad_keu_paket','left')
                            ->join('siakad_keu_master as c','a.id_siakad_keu_master=c.id_siakad_keu_master','left');
             $this->datatables->edit_column('nominal_biaya','<div class="text-right">$1</div>','rp(nominal_biaya)');                
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('siakad_keu_paket_komp/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id_siakad_keu_paket_komp');
            // $this->datatables->unset_column('id_siakad_keu_paket_komp');

       /* else:
            $this->datatables->select('id_siakad_keu_paket_komp,id_siakad_keu_paket,id_siakad_keu_master,')
                            ->from('siakad_keu_paket_komp');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('siakad_keu_paket_komp/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id_siakad_keu_paket_komp');
            $this->datatables->unset_column('id_siakad_keu_paket_komp');
        endif;*/
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('siakad_keu_paket_komp');
    }
    function isadmin(){
       return $this->ion_auth->is_admin();
    }
    function getuser(){
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
            if (!empty($user)):
                $userid=$user->id;
                return $userid;
            else:
                return array();
            endif;
        endif;
    }
    function forms(){   

        $this->load->view('siakad_keu_paket_komp_form_inside');
           
    }

    public function get($id_siakad_keu_paket_komp=null){
        if($id_siakad_keu_paket_komp!==null){
            echo json_encode($this->siakad_keu_paket_kompdb->get_one($id_siakad_keu_paket_komp));
        }
    }
    function tables(){
        $this->load->view('siakad_keu_paket_komp_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->siakad_keu_paket_kompdb->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";
            $i=0;
            foreach ($data as $key => $value) {
                # code...
                
                
                    $div.="<tr>";
                
                $div.="<td>".$key."</td>";
                $div.="<td>".$value."</td>";
                    $div.="</tr>";
                
                $i++;

            }
            $div.="</table>";
           echo $div;
      
        }
      
    }

    public function submit(){
        if ($this->input->post('ajax')){
          if ($this->input->post('id_siakad_keu_paket_komp')){
            $this->siakad_keu_paket_kompdb->update($this->input->post('id_siakad_keu_paket_komp'));
          }else{
            //$this->siakad_keu_paket_kompdb->save();
            $this->siakad_keu_paket_kompdb->saveas();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id_siakad_keu_paket_komp')){
                $this->siakad_keu_paket_kompdb->update($this->input->post('id_siakad_keu_paket_komp'));
              }else{
                //$this->siakad_keu_paket_kompdb->save();
                $this->siakad_keu_paket_kompdb->saveas();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->siakad_keu_paket_kompdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id_siakad_keu_paket_komp'])){
                $this->siakad_keu_paket_kompdb->upddel_detail($this->input->post('id_siakad_keu_paket_komp'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Delete Detail!</strong> Sukses...
            </div>';
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
            
        }
    } 
     public function delete_detailxx(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id_siakad_keu_paket_komp'])){
                $this->siakad_keu_paket_kompdb->delete_detail($this->input->post('id_siakad_keu_paket_komp'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->siakad_keu_paket_kompdb->get_last_pt();
        // print_r($last);
        if(!empty($last)):
            $first=substr($last['faktur_pt'],0,2);
            if($first==''||$first==null){
                $first=' ';
            }
            $left=substr($last['faktur_pt'],2,4);
            $right=substr($last['faktur_pt'],-5);
            $nopt=number_format($right); 
            
            
            $newpo=strval($nopt+1);
            $newpo2=substr(strval("00000$newpo"),-5);

        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($tahun<>date('y')):
                $tahun=date('y');
                if($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001");
                endif;
            elseif($tahun==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$tahun.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen=strval($first.$tahun.$bulan.$newpo2);
                endif;
            endif;
        else:
            // $gen="PT151100001";
            $gen=" ".date('ym')."00001";
        endif;
        return $gen;
    }
     function get_new_faktur(){
        echo $this->gen_faktur();
    }

    

}

/** Module siakad_keu_paket_komp Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
