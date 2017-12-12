<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class tarif extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('tarif_model','tarifdb',TRUE);
        $this->session->set_userdata('lihat','tarif');
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
        $this->template->set_title('Kelola Tarif');
        $this->template->add_js('var baseurl="'.base_url().'tarif/";','embed');  
        $this->template->add_js('modules/tarif.js');  
        
        $this->template->load_view('tarif_view',array(
            'view'=>'tarif_data',
            'opt_jenis'=>$this->tarifdb->dropdown_jenis(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_angkatan'=>$this->tarifdb->dropdown_angkatan(),
            'title'=>'Kelola Data Tarif',
            'subtitle'=>'Pengelolaan Tarif',
            'breadcrumb'=>array(
            'Tarif'),
        ));
    }
    public function data() {
        $this->template->set_title('Kelola Tarif');
        $this->template->add_js('var baseurl="'.base_url().'tarif/";','embed');  
        $this->template->load_view('tarif_view',array(
            'view'=>'tarif_data',
            'title'=>'Kelola Data Tarif',
            'subtitle'=>'Pengelolaan Tarif',
            'opt_jenis'=>$this->tarifdb->dropdown_jenis(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_angkatan'=>$this->tarifdb->dropdown_angkatan(),
            'breadcrumb'=>array(
            'Tarif'),
        ));
    }
     public function baru() {
        $this->template->set_title('Kelola Tarif');
        $this->template->add_js('var baseurl="'.base_url().'tarif/";','embed');  
        $this->template->load_view('tarif_view',array(
            'view'=>'',
            'title'=>'Kelola Data Tarif',
            'subtitle'=>'Pengelolaan Tarif',
            'breadcrumb'=>array(
            'Tarif'),
        ));
        
    }

    function getnewfaktur(){
        // echo base64_encode($this->genfaktur());
        echo $this->__getnewfaktur();
    }
    function __getnewfaktur(){
        // cek jika ada po yang belum tersimpan atau tidak terjadi pembatalan, gunakan nomor ponya
        // jika tidak ada, gunakan genfaktur_po
        $null=$this->tarifdb->ceknomornull();
        // print_r($null);
        if($null!=null||!empty($null)){
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->tarifdb->genfaktur();
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

       $this->db->insert('tarif',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('tarif',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        // if($this->isadmin()==1):
            // $this->datatables->select('id,KodeT,Tarif')
                            // ->from('tarif');
           /* $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

               
                </div>" , 'id');*/

        // else:
            $this->datatables->select('id,KodeT,Tarif,')
                            ->from('tarif');
            $this->datatables->add_column('tambah','$1','bacatarif(KodeT)');
            $this->datatables->edit_column('Tarif','<div class="text-right">$1</div>','rp(Tarif)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a href='#modal-form'  data-toggle='modal' data-placement='top' title='Edit' class='edite btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a> <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id');
            $this->datatables->unset_column('id');
            // $this->datatables->unset_column('id');
        // endif;
        echo $this->datatables->generate();
    }
    function enkrip(){
        return md5($this->session->userdata('lihat').":".$this->getuser()."+".date('H:m'));
        // echo $this->session->userdata('tarif');
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

        $this->load->view('tarif_form_inside');
           
    }

    // public function get($id=null){
    public function getx(){
        $id=$this->input->post('id');
        if($id!==null){
            echo json_encode($this->tarifdb->get_one($id));
        }else{
            echo "data tidak ditemukan";
        }
    }
    public function getxx(){
        $id=$this->input->post('id');
        if($id!==null){ 
            $data=$this->tarifdb->get_one($id);
            $kode=$data['KodeT'];
            $default=$this->bacakode($kode);
            $html=$this->load->view('form_settarif',
                array(
                    'opt_jenis'=>$this->tarifdb->dropdown_jenis(),
                    'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
                    'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
                    'opt_angkatan'=>$this->tarifdb->dropdown_angkatan(),
                    'default'=>$default,
            ),TRUE);
            $this->output->set_output($html);
            // echo json_encode($this->tarifdb->get_one($id));
        }else{
            echo "data tidak ditemukan";
        }
    }
    public function get(){
        $id=$this->input->post('id');
        if($id!==null){
            $data=$this->tarifdb->get_one($id);
            $kode=$data['KodeT'];
            // 166102120161    

            $default=$this->bacakode($kode);
            $default['Tarif']=$data['Tarif'];
            $default['id']=$data['id'];
            $datax=$default;
            echo json_encode($datax);
        }else{
            echo "data tidak ditemukan";
        }
    }
    function tables(){
        $this->load->view('tarif_data');
    }

    function getone($id=null){
        if($id!==null){
            $data=$this->tarifdb->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";

            $i=0;
           
            $div.="<tr><th>Kode Tarif</th><td>".$data['KodeT']."</td></tr>";
            $div.="<tr><th>Keterangan</th><td>".bacatarif($data['KodeT'])."</td></tr>";
            $div.="<tr><th>Tarif</th><td>".rp($data['Tarif'])."</td></tr>";
            $div.="</table>";
           echo $div;
      
        }
      
    }
    function bacatarif($kode){
        echo bacatarif($kode);
    }
    function bacatarifx($kode){

        $angktn=substr($kode,0,2);
        // print_r($angktn);
        $prodi=substr($kode,2,2);
        // print_r($prodi);
        $jenis=substr($kode,4,2);
        // print_r($jenis);
        $kel=substr($kode,6,1);
        // print_r($kel);
        $thn=substr($kode,7,4);
        // print_r($thn);
        $smt=substr($kode,-1);
        // print_r($smt);

        $bcjenis=$this->tarifdb->bacajenis($jenis);
        $bckelmhs=$this->tarifdb->bacakelompokmhs($kel);
        $bcprodi=$this->tarifdb->bacaprodi($prodi);
        // print_r($bcjenis[]);
        return ($bcjenis['Jenis']." ".$bcprodi['Prodi']." ".$bckelmhs['Kelompok']);

    }
    function bacakode($kode){
        // 166102120161    

        $angktn=substr($kode,0,2);
        // print_r($angktn);
        $prodi=substr($kode,2,2);
        // print_r($prodi);
        $jenis=substr($kode,4,2);
        // print_r($jenis);
        $kel=substr($kode,6,1);
        // print_r($kel);
        $thn=substr($kode,7,4);
        // print_r($thn);
        $smt=substr($kode,-1);
        // print_r($smt);

        $bcjenis=$this->tarifdb->bacajenis($jenis);
        $bckelmhs=$this->tarifdb->bacakelompokmhs($kel);
        $bcprodi=$this->tarifdb->bacaprodi($prodi);
        // print_r($bcjenis);
        // print_r($bckelmhs);
        // print_r($bcprodi);
        if((!empty($bcjenis) || $bcjenis!=null) && (!empty($bcprodi) || $bcprodi!=null) && (!empty($bckelmhs) || $bckelmhs!=null)){
            if(array_key_exists('Jenis', $bcjenis) && array_key_exists('Prodi',$bcprodi) && array_key_exists('Kelompok',$bckelmhs)){

                $ket=$bcjenis['Jenis']." ".$bcprodi['Prodi']." ".$bckelmhs['Kelompok'];
            }else{
                $ket='';
                $ket.=!empty($bcjenis['Jenis'])?$bcjenis['Jenis']:'';
                $ket.=!empty($bcprodi['Prodi'])?$bcprodi['Prodi']:'';
                $ket.=!empty($bckelmhs['Kelompok'])?$bckelmhs['Kelompok']:'';

            }
        }else{
            // $ket="Kode tidak lengkap atau tidak dapat dikenali";
            $ket='';
                $ket.=!empty($bcjenis['Jenis'])?$bcjenis['Jenis']:'';
                $ket.=!empty($bcprodi['Prodi'])?$bcprodi['Prodi']:'';
                $ket.=!empty($bckelmhs['Kelompok'])?$bckelmhs['Kelompok']:'';
        }
        $data=array(
            'angkatan'=>"20".$angktn,
            'prodi'=>$prodi,
            'jenis'=>$jenis,
            'kelompok'=>$kel,
            'tahun'=>$thn,
            'semester'=>$smt,
            'keterangan'=>$ket,
        );
        print_r($data);
        return $data;

    }
    function submit_settarif(){
        $angktn=substr($this->input->post('angkatan'),-2);
        $prodi=$this->input->post('prodi');
        $jenis=$this->input->post('jenis');
        $kel=$this->input->post('kelompok');
        $thn=$this->input->post('tahun');
        $smt=$this->input->post('semester');
        $tarif=$this->input->post('Tarif');
        // print_r($prodi." ".$jenis." ".$kel);
        $kode=$angktn.$prodi.$jenis.$kel.$thn.$smt;
        $data=array(
            'KodeT'=>$kode,
            'Tarif'=>$tarif,
        );
        // $this->db->insert('tarif',$data);
        return $data;
    }
    public function submit(){
        $datatarif=$this->submit_settarif();
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $datatarif['id']=$this->input->post('id');
            // $this->tarifdb->update($this->input->post('id'));
            $this->tarifdb->updatetarif($datatarif);
          }else{
            //$this->tarifdb->save();
            $this->tarifdb->savetarif($datatarif);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $datatarif['id']=$this->input->post('id');
                $this->tarifdb->updatetarif($datatarif);
                // $this->tarifdb->update($this->input->post('id'));
              }else{
                //$this->tarifdb->save();
                $this->tarifdb->savetarif($datatarif);
              }
          }
        }
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->tarifdb->delete($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    }
    public function delete_detail(){
        if(isset($_POST['ajax'])){
            if(!empty($_POST['id'])){
                $this->tarifdb->upddel_detail($this->input->post('id'));
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
                $this->tarifdb->delete_detail($this->input->post('id'));
                $this->session->set_flashdata('notif','Succeed, Data Has Deleted');
            }else {
                $this->session->set_flashdata('notif', 'Failed! No Data Deleted');
            }
        }
    } 
    private function gen_faktur(){
        $last=$this->tarifdb->get_last_pt();
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

        $thn=substr($left,0,2);
        $bulan=substr($left,2,4);
        
            if($thn<>date('y')):
                $thn=date('y');
                if($bulan==date('m')):
                    $gen=strval($first.$thn.$bulan."00001");
                elseif($bulan<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$thn.$bulan."00001");
                endif;
            elseif($thn==date('y')):
                if(intval($bulan)<>date('m')):
                    $bulan=date('m');
                    $gen=strval($first.$thn.$bulan."00001"); 
                elseif($bulan==date('m')):
                    $gen=strval($first.$thn.$bulan.$newpo2);
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

/** Module tarif Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
