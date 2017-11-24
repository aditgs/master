<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class tagihanmhs extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('tagihanmhs_model','tagihdb',TRUE);
        $this->session->set_userdata('lihat','tagihanmhs');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
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
        $this->template->set_title('Kelola Tagihanmhs');
        $this->template->add_js('var baseurl="'.base_url().'tagihanmhs/";
            $("#mhs").select2({
                 theme: "input-md"
            });
            $("#data").DataTable({
            "ajax": {
              
                "url": baseurl + "gettagihan/",
                "dataType": "json",
                
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": true,
            "lengthChange": true,
            "SortClasses": true,
            "bscrollCollapse": true,
            "paging": false,
            "deferRender": true,
            "bFilter": false,
            "ordering": false,
            "responsive": true,
        });
            ','embed');  
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'tagihanmhs_data',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_drop_array('mhsmaster','nim','nama'),
             'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Tagihanmhs');
        $this->template->add_js('var baseurl="'.base_url().'tagihanmhs/";','embed');  
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'Tagihanmhs_data',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Tagihanmhs');
        $this->template->add_js('var baseurl="'.base_url().'tagihanmhs/";
            $("#mhs").select2({
                theme: "bootstrap input-md",
                tags: true,
                tokenSeparators: [",", ""]
            });
             $("#data").DataTable({
            "ajax": {
              
                "url": baseurl + "gettagihan/",
                "dataType": "json",
                
            },
            "sServerMethod": "POST",
            "bServerSide": true,
            "bAutoWidth": true,
            "lengthChange": true,
            "SortClasses": true,
            "bscrollCollapse": true,
            "paging": false,
            "deferRender": true,
            "bFilter": false,
            "ordering": false,
            "responsive": true,
        });
            ','embed');   
        // $this->template->add_js('modules/form.js');
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'formtagihan',
            'title'=>'Kelola Data Tagihanmhs',
            'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),

            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->tagihdb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $kode=$null['kode']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($kode);
        }else{

            $kode=$this->tagihdb->genfaktur();
            $data['kode']=$kode; //nama field perlu menyesuaikan tabel
            $data['userid']=userid();
            $data['islocked']=1;
            $data['datetime']=date('Y-m-d H:m:s');
            
            $id=$this->__submitnomor($data);
        }
       
        $session=array('new'=>false,'edit'=>true);
        $data=array('kode'=>$kode,'idx'=>$id);
        $default['kode']=$kode;
    
        return (json_encode($data));
        // return base64_encode(json_encode($data));
        // echo base64_encode(json_encode($data));
    }
    function __submitnomor($data){

       $this->db->insert('tagihanmhs',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($kode){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('kode',$kode); //nama field perlu menyesuaikan tabel
        $this->db->update('tagihanmhs',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,kode,tanggal,mhs,kodebank,refbank,isbayar,tglbayar,isvalidasi,tglvalidasi,isactive,isdeleted,datedeleted,userid,datetime,')
                            ->from('tagihanmhs');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihanmhs/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,kode,tanggal,mhs,kodebank,refbank,isbayar,tglbayar,isvalidasi,tglvalidasi,isactive,isdeleted,datedeleted,userid,datetime,')
                            ->from('tagihanmhs');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihanmhs/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    public function gettagihan(){
            $this->datatables->select('id,KodeT,Tarif,')
                            ->from('tarif');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

      
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('tagihanmhs');
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

        $this->load->view('tagihanmhs_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->tagihdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('tagihanmhs_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->tagihdb->get_one($id);
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
            $this->tagihdb->update($this->input->post('id'));
          }else{
            //$this->tagihdb->save();
            $this->tagihdb->saveas();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->tagihdb->update($this->input->post('id'));
              }else{
                //$this->tagihdb->save();
                $this->tagihdb->saveas();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->tagihdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->tagihdb->upddel_detail($this->input->post('id'));
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
                $this->tagihdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->tagihdb->get_last_pt();
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

/** Module tagihanmhs Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
