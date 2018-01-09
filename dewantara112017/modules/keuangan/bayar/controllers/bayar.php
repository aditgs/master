<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class bayar extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('bayar_model','paydb',TRUE);
        $this->load->model('tagihan/tagihan_model','tagihdb',TRUE);
        $this->load->model('tarif/tarif_model','tarifdb',TRUE);
        $this->load->model('bayar_detail/bayar_detail_model','detaildb',TRUE);
        $this->load->model('mhsmaster/mhsmaster_model','mhsdb',TRUE);

        $this->session->set_userdata('lihat','bayar');
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
        $this->template->set_title('Kelola Bayar');
        $this->template->add_js('var baseurl="'.base_url().'bayar/";','embed');  
        $this->template->add_js('modules/bayar.js');
        $this->template->add_css('forms.css');

        $this->template->load_view('bayar_view',array(
            'default'=>array('kode'=>$this->paydb->genfaktur()),
            'opt_mhs'=>$this->paydb->get_dropdown_mhs(),
            'opt_inv'=>$this->paydb->getdropinvoice(),
            'view'=>'databayar',
            'title'=>'Kelola Data Bayar',
            'subtitle'=>'Pengelolaan Bayar',
            'breadcrumb'=>array(
            'Bayar'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Bayar');
        $this->template->add_js('var baseurl="'.base_url().'bayar/";','embed');  
        $this->template->load_view('bayar_view',array(
            'view'=>'Bayar_data',
            'title'=>'Kelola Data Bayar',
            'subtitle'=>'Pengelolaan Bayar',
            'breadcrumb'=>array(
            'Bayar'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Bayar');
        $this->template->add_js('var baseurl="'.base_url().'bayar/";','embed');  
        $this->template->load_view('bayar_view',array(
            'view'=>'',
            'title'=>'Kelola Data Bayar',
            'subtitle'=>'Pengelolaan Bayar',
            'breadcrumb'=>array(
            'Bayar'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->paydb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->paydb->genfaktur();
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

       $this->db->insert('bayar',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('bayar',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getinvoice($mhs=null){
          
            $this->datatables->select('id,kode,tanggal,multiitem,total,mhs')
                            ->from('001-view-tagihan');
            if(!empty($mhs)||$mhs!=null){

                $this->datatables->where('mhs',$mhs);
            }
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bayar/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        echo $this->datatables->generate();
    }
    public function gettagihdetail(){

        $id=$this->input->post('id');
        $idmhs=$this->input->post('mhs');

            $mhs=$this->mhsdb->get_one($idmhs);
            $detail=$this->tagihdb->get_one($id);
            $this->datatables->select('id,nim,kodetagihan,kodetarif,kodetarif as kodeket,tarif,isactive,isvalidated')->from('tagihan_detail');
            if(!empty($detail)||$detail!=null){
                $this->datatables->where('kodetagihan',$detail['kode']);
            }
            if(!empty($mhs)||$mhs!=null){
                $this->datatables->where('nim',$mhs['nim']);
            }
            $this->datatables->edit_column('id','<div class="text-center"><input class="checkbox" type="checkbox" id="bayar" value="$1" name="bayar[]"></div>','id');
            $this->datatables->edit_column('tarif','<div class="text-right">$1</div>','rp(tarif)');
            $this->datatables->edit_column('kodeket','<div class="text-left">($2) $1</div>','bacatarif(kodeket),kodetarif');
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                </div>" , 'id');
            $this->datatables->unset_column('nim,isactive,isvalidated,kodetarif');
        echo $this->datatables->generate();
    }
    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,kode,invoice,itembayar,tanggal,bank,refbank,tglbank,totalbayar,sisabayar,totaltagihan,sisatagihan,isvalidasi,tglvalidasi,isactive,islocked,isdeleted,datedeleted,userid,datetime,')
                            ->from('bayar');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bayar/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,kode,invoice,itembayar,tanggal,bank,refbank,tglbank,totalbayar,sisabayar,totaltagihan,sisatagihan,isvalidasi,tglvalidasi,isactive,islocked,isdeleted,datedeleted,userid,datetime,')
                            ->from('bayar');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('bayar/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('bayar');
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
         // $this->template->add_js('modules/bayar.js');
        $html=$this->load->view('formbayar',array(
             'default'=>array('kode'=>$this->paydb->genfaktur()),
            'opt_mhs'=>$this->paydb->get_dropdown_mhs(),
        ),TRUE);
        // $this->output->set_output($html);
        return $html;
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->paydb->get_one($id));
        }
    }
    function getdropinvoice(){

        $result = array();
        $mhs=$this->input->post('mhs');
        if(!empty($mhs)||$mhs!==null){

            $array_keys_values = $this->db->query('select id,kode,tanggal,mhs,total from `001-view-tagihan` where mhs='.$mhs.'  group by id order by id asc');
        }else{

            $array_keys_values = $this->db->query('select id,kode,tanggal,mhs,total from `001-view-tagihan` group by id order by id asc ');
        }
        $result[0]="-- Pilih Tagihan --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->kode." (".thedate($row->tanggal).")" ;
        }
        echo json_encode($result);
    }
    function tables(){
        $this->load->view('bayar_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->paydb->get_one($id);
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
    function __formvalidation(){
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|xss_clean');
        $this->form_validation->set_rules('invoice', 'Invoice', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('itembayar', 'Item Pembayaran', 'required|trim|xss_clean');
        $this->form_validation->set_rules('bayar[]','Item Pembayaran','required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('totaltagihan','Total Tagihan','required|numeric|trim|xss_clean');
        $this->form_validation->set_rules('totalbayar','Total Tagihan','required|numeric|trim|xss_clean');

       

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

    public function submit(){
         if($this->__formvalidation()===TRUE):
            $item=$this->input->post('bayar', TRUE);
            // print_r($item);
            $bayar=json_encode($item);
            $data = array(
            
                'kode' => $this->input->post('kode', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'total' => $this->input->post('total', TRUE),
                'mhs' => $this->input->post('mhs', TRUE),
                'itembayar' => $bayar,
                'isactive' =>1,
                'islocked' =>1,
                'isdeleted' =>0,
                'userid' => userid(),
                'datetime' => NOW(),
            );
            foreach ($item as $key => $value) {
                # code...
                $dx[$key]['kodetagihan']=$this->input->post('kode', TRUE);
                $tarif=$this->tarifdb->getviewtarif($value);
                $mhs=$this->tagihdb->getmhs($this->input->post('mhs', TRUE));
                $dx[$key]['kodetarif']=$tarif['kodetarif'];
                $dx[$key]['nim']=$mhs['nim'];
                $dx[$key]['tarif']=$tarif['tarif'];
                $dx[$key]['datetime']=NOW();
                $dx[$key]['istagihan']=1;
                $dx[$key]['isactive']=1;
            }
            if ($this->input->post('ajax')){
              if ($this->input->post('id')){
                $this->paydb->update($this->input->post('id'));
              }else{
                //$this->paydb->save();
                // $this->paydb->saveas();
                $this->paydb->savebayar($data);
                $this->paydb->savedetailbatch($dx);
              }

            }else{
              if ($this->input->post('submit')){
                  if ($this->input->post('id')){
                    $this->paydb->update($this->input->post('id'));
                  }else{
                    //$this->paydb->save();
                    // $this->paydb->saveas();
                    $this->paydb->savebayar($data);
                    $this->paydb->savedetailbatch($dx);
                  }
              }
            }
        else:
            echo $this->__formvalidation();
        endif;
        
        
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->paydb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->paydb->upddel_detail($this->input->post('id'));
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
                $this->paydb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    

    

}

/** Module bayar Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
