<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class pendapatan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('pendapatan_model','pendapatandb',TRUE);
        $this->session->set_userdata('lihat','pendapatan');
        if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;

           
        
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        $this->template->add_js('crud.js');
        $this->template->set_layout('dashboard');
    }

    public function index() {
        $this->template->set_title('Kelola Pendapatan');
        $this->template->add_js('var baseurl="'.base_url().'pendapatan/";','embed');  
        $this->template->load_view('pendapatan_view',array(
            'view'=>'form_pendapatan',
            'title'=>'Kelola Data Pendapatan',
            'subtitle'=>'Pengelolaan Pendapatan',
            'breadcrumb'=>array(
            'Pendapatan'),
        ));
    }
     public function data() {
        $this->template->set_title('Kelola Pendapatan');
        $this->template->add_js('var baseurl="'.base_url().'pendapatan/";','embed');  
        $this->template->load_view('pendapatan_view',array(
            'view'=>'pendapatan_data',
            'title'=>'Kelola Data Pendapatan',
            'subtitle'=>'Pengelolaan Pendapatan',
            'breadcrumb'=>array(
            'Pendapatan'),
        ));
        
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        if($this->isadmin()==1):
            $this->datatables->select('id,Faktur,Tgl,Jthtmp,Customer,NmCustomer,StCust,Alamat,NoAccCust,Total,Tunai,Piutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,Status,Kas,Bank,KodeBank,NoAccBank,JenisBayar,NoBukti,JthTmpGiro,cNoJrn,lVoid,lPosted,isdeleted,datedeleted,islocked,isactive,userid,User,datetime,Time,')
                            ->from('pendapatan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');

        else:
            $this->datatables->select('id,Faktur,Tgl,Jthtmp,Customer,NmCustomer,StCust,Alamat,NoAccCust,Total,Tunai,Piutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,Status,Kas,Bank,KodeBank,NoAccBank,JenisBayar,NoBukti,JthTmpGiro,cNoJrn,lVoid,lPosted,isdeleted,datedeleted,islocked,isactive,userid,User,datetime,Time,')
                            ->from('pendapatan');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('pendapatan');
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
        
       

        $this->load->view('pendapatan_form_inside');
           
    }

    public function get($id=null){
        if($id!==null){
            echo json_encode($this->pendapatandb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('pendapatan_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->pendapatandb->get_one($id);
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
            $this->pendapatandb->update($this->input->post('id'));
          }else{
            $this->pendapatandb->save();
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->pendapatandb->update($this->input->post('id'));
              }else{
                $this->pendapatandb->save();
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pendapatandb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
     public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->pendapatandb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->pendapatandb->get_last_pt();
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

/** Module pendapatan Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
