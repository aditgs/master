<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class pmbgel extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('pmb_gelombang_model','pmbgeldb',TRUE);
        $this->session->set_userdata('lihat','pmb_gelombang');
         if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('pmb');
            redirect('auth/login', 'refresh');
        else:
            if(!$this->ion_auth->in_group(array(10,1,2))){
            // redirect('../site', 'refresh');
            redirect('../auth/pmb/logout', 'refresh');

            }
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');

        /*UNTUK KEPERLUAN FORM*/
        $this->template->add_js('accounting.min.js');
        $this->template->add_js('jquery.maskMoney.min.js');   
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js'); //tanggal
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        
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
        $this->template->set_title('Kelola Gelombang PMB');
        $this->template->add_js('var baseurl="'.base_url().'pmbgel/";','embed');  
        $this->template->add_js('modules/pmbgel.js');
        $this->template->add_css('forms.css');
        $this->template->load_view('pmb_gelombang_view',array(
            'view'=>'pmb_gelombang_data',
            'title'=>'Kelola Data Gelombang PMB',
            'subtitle'=>'Pengelolaan Gelombang PMB',
            'breadcrumb'=>array(
            'Pmb_gelombang'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Gelombang PMB');
        $this->template->add_js('var baseurl="'.base_url().'pmbgel/";','embed');  
        $this->template->load_view('pmb_gelombang_view',array(
            'view'=>'Pmb_gelombang_data',
            'title'=>'Kelola Data Gelombang PMB',
            'subtitle'=>'Pengelolaan Gelombang PMB',
            'breadcrumb'=>array(
            'Pmb_gelombang'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Gelombang PMB');
        $this->template->add_js('var baseurl="'.base_url().'pmbgel/";','embed');  
        $this->template->load_view('pmb_gelombang_view',array(
            'view'=>'',
            'title'=>'Kelola Data Gelombang PMB',
            'subtitle'=>'Pengelolaan Gelombang PMB',
            'breadcrumb'=>array(
            'Pmb_gelombang'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->pmbgeldb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->pmbgeldb->genfaktur();
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

       $this->db->insert('pmb_gelombang',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('pmb_gelombang',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        
            $this->datatables->select('id,kodegel,th_akad,keterangan,date_start,kodetarifdaftar,date_end,date_seleksi_start,date_seleksi_end,date_her_start,date_her_end,date_pengumuman,statusgel')
                            ->from('001-view-gelpmb');
            $this->datatables->edit_column('date_start','<label class="badge badge-success">Periode: $1 - $2 </label></br> <label class="badge badge-primary">Seleksi: $3 - $4 </label></br> <label class="badge badge-info">Pengumuman: $7</label><label class="badge badge-warning">Daftar Ulang: $5 - $6 </label> ','thedate(date_start),thedate(date_end),thedate(date_seleksi_start),thedate(date_seleksi_end),thedate(date_her_start),thedate(date_her_end),thedate(date_pengumuman)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pmbgel/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#modal-form' data-toggle='modal' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id,date_end,kodetarifdaftar,date_seleksi_start,date_seleksi_end,date_her_start,date_her_end,date_pengumuman');
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('pmb_gelombang');
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

        $this->load->view('pmb_gelombang_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->pmbgeldb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('pmb_gelombang_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->pmbgeldb->get_one($id);
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
          if ($this->input->post('id')){
            $this->pmbgeldb->update($this->input->post('id'));
          }else{
            //$this->pmbgeldb->save();
            $this->pmbgeldb->saveas();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->pmbgeldb->update($this->input->post('id'));
              }else{
                //$this->pmbgeldb->save();
                $this->pmbgeldb->saveas();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pmbgeldb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pmbgeldb->upddel_detail($this->input->post('id'));
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
            if(!empty($_POST['id'])){
                $this->pmbgeldb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    

    

}

/** Module pmb_gelombang Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
