<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class tagihanmhs extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('tagihanmhs_model','tagihdb',TRUE);
        $this->load->model('tarif/tarif_model','tarifdb',TRUE);
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
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js'); //tanggal
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_js('plugins/switchery/switchery.min.js');
        $this->template->add_js('switchtoggle.js');
        // $this->template->add_js('plugins/bootstrap-switch-master/bootstrap-switch.min.js');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        // $this->template->add_css('plugins/bootstrap-switch-master/bootstrap-switch.min.css');
        $this->template->add_css('plugins/switchery/switchery.min.css');
        $this->template->add_css('switchtoggle.css');
         
    

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
             $("#mhs,#paket").select2({
                theme: "bootstrap input-md",
                dropdownParent: "#modal-form"
                
            });
           
  
            $("#multipaket").select2({
                theme: "bootstrap input-md",
                tags: true,
                tokenSeparators: [",", ""],
                closeOnSelect: false,
                dropdownParent: "#modal-form"
            });
            $("body").on("click",".bukaform ",function(e){
                e.preventDefault();
                $.post(baseurl+"forms",function(data,status){
                    if(status=="success"){
                        $("body #modal-form modal-body").html(data);

                    }
                })
            });
            ','embed');  
       
        $this->template->load_view('tagihanmhs_view',array(
            'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'view'=>'datatagihan',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
            'opt_paket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_multipaket'=>$this->tagihdb->get_dropdown_paket(),
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
            $("#mhs,#paket").select2({
                theme: "bootstrap input-md",
                
            });
             
            $("#multipaket").select2({
                theme: "bootstrap input-md",
                tags: true,
                tokenSeparators: [",", ""]
            });
            ','embed');  
        $this->template->add_js(" 
            $('input.input-toggle').change(function(){
                id=$(this).prop('id');
                if($(this).is(':checked')==true){
                    // alert('benar');
                    $.post(baseurl+'updstatus',{id:id,stat:'open'},function(data,status){
                        if(status=='success'){
                            alert('buka sukses');
                        }
                    });
                }else{
                    $.post(baseurl+'updstatus',{id:id,stat:'close'},function(data,status){
                        if(status=='success'){
                            alert('tutup sukses');
                        }
                    });
                }
            });
             
            
            ",'embed');
        $this->template->load_view('tagihanview',array(
            'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'view'=>'formtagihan',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
            'opt_paket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_multipaket'=>$this->tagihdb->get_dropdown_paket(),
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
        
    }
    function updstatus(){
        $status=$this->input->post('stat');
        $id=$this->input->post('id');
        $this->tagihdb->updatestatus($id,$status);
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
            $faktur=$null['faktur']; //nama field perlu menyesuaikan tabel
            $id=$null['id'];
            $this->__updatestatproses($faktur);
        }else{

            $faktur=$this->tagihdb->genfaktur();
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

       $this->db->insert('tagihanmhs',$data);
       return $this->db->insert_id();
    }
     function __updatestatproses($faktur){
        $data=array(
            
            // 'status'=>'Proses',
            'islocked'=>1,
            );
        $this->db->where('Faktur',$faktur); //nama field perlu menyesuaikan tabel
        $this->db->update('tagihanmhs',$data);
    }
     
     //<!-- Start Primary Key -->
    

    public function getdatatables(){
        // if($this->isadmin()==1):
            $this->datatables->select("id,kode,tanggal,tgltempo,mhs,nimmhs,nmmhs,id as idmultipaket,multipaket,status,islunas")
                            ->from('001-view-tagihanmhs');
                            // $this->datatables->join('mhsmaster as b','a.mhs=b.id','left');
            $this->datatables->edit_column('tanggal','<label class="label label-primary">$1</label><br><label class="label label-info label-xs">$1</label>',"thedate(tanggal),thedate(tgltempo)");
            $this->datatables->edit_column('status','$1',"getstatus(id)");
            $this->datatables->edit_column('mhs','$2 ($1)',"nimmhs,nmmhs");
            $this->datatables->edit_column('idmultipaket','$1',"getmultipaket(id)");
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihanmhs/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                <a href='".base_url('tagihanmhs/cetakpdf/$2/$3')."' class='btn btn-warning btn-xs'><i class='fa fa-download'></i> PDF</a>
                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger' id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'id,base64_encode(id),base64_encode("pdf")');
            $this->datatables->unset_column('id,tgltempo,nimmhs,nmmhs,multipaket');

        /*else:
            $this->datatables->select('id,kode,tanggal,tgltempo,mhs,kodebank,idpaket,status,dateopen,dateclosed,refbank,isbayar,tglbayar,isvalidasi,tglvalidasi,isactive,islocked,isdeleted,datedeleted,userid,datetime,')
                            ->from('tagihanmhs');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihanmhs/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;*/
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

        // $this->load->view('tagihanmhs_form_inside');
        $html=$this->load->view('formtagihan',true);
        $this->output->set_output($html);

           
    }
    function getmultipaket($id=null){
        echo getmultipaket($id);
       /* $data=$this->tagihdb->getmultipaket($id);
        // if($data['multipaket']!=='false'||is_null($data['multipaket'])||!empty($data['multipaket'])){
        if(!empty($data['multipaket'])){
            if($data['multipaket']!=='false'){
                $multi=json_decode($data['multipaket']);
                foreach ($multi as $value) {
                    # code...
                    $datapaket=$this->tagihdb->getpaket($value);
                    $paket[]="<li>".$datapaket['nama']. "(".$datapaket['kode'].")</li>";
                }
                $output=implode("",$paket);
                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";
                return"<ul>".$output."</ul>";
            }
        }*/
    }
    function bacatarif($kode){
        
        $angkatan=substr($kode,0,2);
        // print_r($angkatan);
        $prodi=substr($kode,2,2);
        // print_r($prodi);
        /*$jenis=substr($kode,4,2);
        // print_r($jenis);
        $kelompok=substr($kode,6,1);
        // print_r($kelompok);
        $tahun=substr($kode,7,4);
        // print_r($tahun);
        $semester=substr($kode,-1);
        // print_r($semester);

        $bcjenis=$this->tarifdb->bacajenis($jenis);
        // print_r($jenis);
        $bckelompokmhs=$this->tarifdb->bacakelompokmhs($kelompok);
        */
        $bcprodi=$this->tarifdb->bacaprodi($prodi);
        // $angkat="2000".$ang
        // print_r($bcjenis[]);
        // return ($bcjenis['Jenis']." ".$bcprodi['Prodi']." ".$bckelompokmhs['Kelompok']);
        return ("Angkatan 20".$angkatan.", ".$bcprodi['Prodi']." ");

    }
    function testarray($num){
        $data=$this->tagihdb->get_one($num  );
        $paket=serialize($data['multipaket']);
        print_r($paket);
    }
    public function get($id=null){
        if($id!==null){
            echo json_encode($this->tagihdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('tagihanmhs_data');
    }
    function cetakpdf($id,$pdf){
        // $enkrip=$this->enkrip();
        $id=base64_decode($id);
        $pdf=base64_decode($pdf);
        print_r($id);
        print_r($pdf);
        if($id!=null){
            $data=$this->tagihdb->get_one($id);
          
            $this->template->set_layout('cetak');
            $html=$this->load->view('detailtagihan',array('data'=>$data,'total'=>$this->getotmultipaket($id)),TRUE);

          /*  $html=$this->load->view('cetak_po_baru-pdf',array(
                // 'supplier'=>$this->podb->get_onesp($supplier),
                'data'=>$data,
                'detail'=>$detail,
                ),TRUE);*/
        
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                // $html1=$datax;
                /*$html2=$this->load->view('template_cetak',array(
                    'html'=>$html1,
                    'title'=>$judul
                ),TRUE);*/
                // savepdf($html1, 'laporan-pembelian-'.date('d-m-Y-H-m-s'));
                buildpdf($html, 'tagihan-'."-".date('d-m-Y-Hms'),TRUE);
                        // }
            }else{          
                
                echo ($html);
                
            }
        }
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->tagihdb->get_one($id);
            // print_r($data);
            $html=$this->load->view('detailtagihan',array('data'=>$data,'total'=>$this->getotmultipaket($id)),TRUE);
            return $this->output->set_output($html);
        }else{
            return "<h1>Data tidak ditemukan</h1>";
        }
        
    }
    function getotpaket($id){
        $data=$this->tagihdb->gettotalpaket($id);
        if(!empty($data)){
            return $data;
        }else{
            return array();
        }
    }
    function getotmultipaket($id){
        $data=$this->tagihdb->get_one($id);
        if(!empty($data)){
            if($data['multipaket']!=='false'){
                $multipaket=json_decode($data['multipaket']);
                $total=0;
                foreach ($multipaket as $key => $value) {
                    # code...
                    $data=$this->getotpaket($value);
                    $total=$total+$data['totalbiaya'];
                }
                $result=array(
                    'id'=>$id,
                    'total'=>$total,
                );
                // print_r($result);
                return $result;
            }
        }else{
            return array();
        }
    }
    function getonex($id=null){
        if($id!==null){
            $data=$this->tagihdb->get_one($id);
            $jml=count($data);
            // print_r($jml);
            // print_r($data);
            $div='';
            $div.="<table class='table table-condensed table-striped table-bordered'>";
            $i=0;
            foreach ($data as $key => $value) {
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
    function getkodeakad($id){
        $data=$this->tagihdb->getmultipaket($id);
        $multipaket=json_decode($data['multipaket']);
        $kode=$this->__getkodeakad($multipaket);
        // print_r($kode);
        return $kode;
    }
    function __getkodeakad($array=array()){
        foreach ($array as $key => $value) {
            $dt=$this->tagihdb->getkodepaket($value);
            $data[]=$dt['kode'];

        }
        // print_r($data);
        return $data;
    }
    public function submit(){
        $data = array(
        
            'kode' => $this->input->post('kode', TRUE),
            'tanggal' => $this->input->post('tanggal', TRUE),
            'tgltempo' => $this->input->post('tgltempo', TRUE),
            'total' => $this->input->post('total', TRUE),
            'multipaket' => json_encode($this->input->post('multipaket', TRUE)),
            'mhs' => $this->input->post('mhs', TRUE),
            'idpaket' => $this->input->post('idpaket', TRUE),
            'status' => 'open',
            'isactive' =>1,
            'islocked' =>1,
            'isdeleted' =>0,
            'userid' => userid(),
            'datetime' => NOW(),
        );
        if ($this->input->post('ajax')){
          if ($this->input->post('id')){
            $this->tagihdb->update($this->input->post('id'));
          }else{
            //$this->tagihdb->save();
            // $this->tagihdb->saveas();
            $this->tagihdb->savetagihanmhs($data);
          }

        }else{
          if ($this->input->post('submit')){
              if ($this->input->post('id')){
                $this->tagihdb->update($this->input->post('id'));
              }else{
                //$this->tagihdb->save();
                $this->tagihdb->savetagihanmhs($data);
                // $this->tagihdb->saveas();
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
    
    

}

/** Module tagihanmhs Controller **/
/** Build & Development By Syahroni Wahyu - roniwahyu@gmail.com */
