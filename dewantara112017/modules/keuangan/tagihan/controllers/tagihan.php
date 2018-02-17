<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tagihan extends MX_Controller {

    function __construct() {
        parent::__construct();
          
        //Load IgnitedDatatables Library
        $this->load->model('tagihan_model','tagihdb',TRUE);
        $this->load->model('tarif/tarif_model','tarifdb',TRUE);
        $this->load->model('mhsmaster/mhsmaster_model','mhsdb',TRUE);
        $this->session->set_userdata('lihat','tagihanmhs');
        if ( !$this->ion_auth->logged_in()): 
            echo pesan_login('siku');
            redirect('auth/login', 'refresh');
        endif;

           
        // echo $this->session->userdata('module');
        $this->template->add_js('datatables.js');
        $this->template->add_js('muria.js');
        // $this->template->add_js('crud.js');
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
        $this->template->add_js('
            var baseurl="'.base_url().'tagihan/";
            var assetsurl="'.assets_url().'/";
             
            ','embed');  
        $this->template->add_js('modules/tagihan.0.3.js');
        $this->template->add_css('forms.css');
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
        $this->template->load_view('tagihanmhs_view',array(
            'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'view'=>'datatagihan',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
            'opt_paket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_detailpaket'=>array(),
            'opt_multipaket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_tahun'=>$tahun,
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
        // print_r ($this->session->userdata('module')); 
    }

    public function data() {
        $this->template->set_title('Kelola Tagihanmhs');
        $this->template->add_js('var baseurl="'.base_url().'tagihan/";','embed');  
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'Tagihanmhs_data',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
    }

    public function checkbox() {
        $this->template->set_title('Kelola Tagihanmhs');
        $this->template->add_js('var baseurl="'.base_url().'tagihan/";','embed'); 
        $this->template->add_js('modules/selectcheckbox.js'); 
        $this->template->load_view('tagihanmhs_view',array(
            'view'=>'formcheckbox',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'breadcrumb'=>array(
            'Tagihanmhs'),
        ));
    }

     public function baru() {
        $this->template->set_title('Kelola Tagihanmhs');
   
        $this->template->add_js('var baseurl="'.base_url().'tagihan/";
            $("#mhs").select2({
                theme: "bootstrap input-md",
                
            });
             
         
            ','embed');  
         $this->template->add_js('modules/tagihan.0.3.js');
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
         $this->template->add_css('forms.css');
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
        $this->template->load_view('tagihanview',array(
            'default'=>array('kode'=>$this->tagihdb->genfaktur()),
            'view'=>'formtagihan',
            'title'=>'Kelola Data Tagihanmhs',
            'subtitle'=>'Pengelolaan Tagihanmhs',
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
            'opt_paket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_detailpaket'=>array(),
            'opt_multipaket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_tahun'=>$tahun,
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
    function get_tarif(){

     //<!-- Start Primary Key -->
    }
    public function gettarif(){

        $idmhs=$this->input->post('id');
        $kdsmster=$this->input->post('kdsmster');
        $smster=$this->input->post('smster');
        $tahun=$this->input->post('tahun');
        $kel=$this->input->post('kelompok');
            

        if(!empty($idmhs)||$idmhs>0){
            $mhs=$this->mhsdb->get_one($idmhs);
            $kode=substr($mhs['nim'],0,4);
        }else{
            $kode=0;
        }
            $this->datatables->select('id,kodetarif,nmjenis,kodetarif as kodeket,tarif,kodemhs,kdsmster,th_akad as tahun,kel')->from('006-view-tarifdetail');

            if(isset($kode)||!empty($kode)||$kode!==null||$kode>0):
    
                $this->datatables->where('kodemhs',$kode);
            endif;

        if(isset($kdsmster)||!empty($kdsmster)||$kdsmster!==0||$kdsmster!==null){
            $this->datatables->where('kdsmster',$kdsmster);
        }
        if(isset($tahun)||!empty($tahun)||$tahun!==0||$tahun!==null){
            $this->datatables->where('th_akad',$tahun);
        }
        if(isset($kel)||!empty($kel)||$kel!==0||$kel!==null){
            $this->datatables->where('kel',$kel);
        }
            $this->datatables->edit_column('id','<div class="text-center checkbox i-checks"><label> <input type="checkbox"  id="tarif" value="$1" name="tarif[]"> <i></i> $1 </label></div>','id');
            $this->datatables->edit_column('tarif','<div class="text-right">$1</div>','rp(tarif)');
            $this->datatables->edit_column('kodeket','<div class="text-left">$1</div>','bacatarif(kodeket)');
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                </div>" , 'id');
            $this->datatables->unset_column('kodemhs,tahun,kdsmster,kel');
        
        echo $this->datatables->generate();
    } 
   public function getvalidation(){
        $id=$this->input->post('id');
       
            $this->datatables->select('id,kodetarif,kodetarif as kodeket,tarif,mhs,tagvalstat,isvalidated,idtagihan')->from('002-view-tagihandetail');
         
            if(isset($id)||!empty($id)||$id!==0||$id!==null){
                $this->datatables->where('idtagihan',$id);
            }
            $this->datatables->where('isvalidated',null);
         
            $this->datatables->edit_column('id','<div class="text-center"><input class="validasi checkbox" type="checkbox" id="valid" value="$1" name="valid[]"></div>','id');
            $this->datatables->edit_column('tarif','<div class="text-right">$1</div>','rp(tarif)');
            $this->datatables->edit_column('kodeket','<div class="text-left">$1</div>','bacatarif(kodeket)');
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                </div>" , 'id');
            $this->datatables->unset_column('idtagihan,valstatus,idvalidasi,mhs,');
        echo $this->datatables->generate();
    } 
   

    public function getdatatables(){
        // if($this->isadmin()==1):
            $this->datatables->select("id,kode,tanggal,mhs,nimmhs,nmmhs,isvalidasi,tglvalidasi,islunas,kodemhs")
                            ->from('001-view-tagihanmhs');
                            // $this->datatables->join('mhsmaster as b','a.mhs=b.id','left');
            $this->datatables->edit_column('tanggal','$1',"thedate(tanggal)");
            $this->datatables->edit_column('tglvalidasi','<div class="label label-primary">$2</div> ($1)',"thedate(tglvalidasi),isvalidasi");
           
            $this->datatables->edit_column('mhs',"<a data-toggle='modal' href='#modal-id' data-mhs='$3'data-load-remote='".base_url('tagihan/gettabeltarif/$1/$4')."' data-remote-target='#modal-id .modal-body' data-kodemhs='$4' class='bymhs btn btn-info btn-xs'><i class='fa fa-info-circle'></i> ".'$2 ($1) </a>',"nimmhs,nmmhs,mhs,kodemhs");
            $this->datatables->add_column('edit',"<div class='btn-group' style=''>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                <a data-toggle='modal' href='#modal-validation' data-load-remote='".base_url('tagihan/formval/$2/')."' data-remote-target='#modal-validation .modal-body' class='btn btn-success btn-xs'><i class='fa fa-check'></i> </a>" 
                ."<a class='edit btn btn-xs btn-warning' data-toggle='modal' href='#modal-form' title='Edit' id='$1'><i class='fa fa-pencil'></i></a>"
                .'<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-eye"></i> Aksi <span class="caret"></span></button>'
                .'<ul class="dropdown-menu" style="position:relative;z-index:10000 !important">
                <li><a href="'.base_url('tagihan/cetakpdf/$2/$3').'"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                <li><a href="'.base_url('tagihan/cetakpdf/$2').'" target="_blank"><i class="fa fa-print"></i> Print</a></li>
                <li role="separator" class="divider"></li>'
                ."<li> <a data-toggle='tooltip' data-placement='top' title='Hapus' class='delete ' id='$1'><i class='fa fa-remove'></i> Hapus</a></li>"
                .'</ul>
</div>' , 'id,base64_encode(id),base64_encode("pdf")');
            $this->datatables->unset_column('id,tgltempo,nimmhs,nmmhs,kodemhs,islunas,isvalidasi');

        /*else:
            $this->datatables->select('id,kode,tanggal,tgltempo,mhs,kodebank,idpaket,status,dateopen,dateclosed,refbank,isbayar,tglbayar,isvalidasi,tglvalidasi,isactive,islocked,isdeleted,datedeleted,userid,datetime,')
                            ->from('tagihanmhs');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihanmhs/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a></div>" , 'id');
            $this->datatables->unset_column('id');
        endif;*/
        echo $this->datatables->generate();
    }
    public function gettagihan($mhs=null){
        // if($this->isadmin()==1):
            $this->datatables->select("id,kode,tanggal,tglvalidasi,mhs,nimmhs,nmmhs,islunas,isvalidasi")
                            ->from('001-view-tagihanmhs');
            $this->datatables->where('mhs',$mhs);
                            // $this->datatables->join('mhsmaster as b','a.mhs=b.id','left');
            $this->datatables->edit_column('tanggal','$1',"thedate(tanggal)");
           
            $this->datatables->edit_column('mhs',"<a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihan/gettagihan/$3/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> ".'$2 ($1) </a>',"nimmhs,nmmhs,mhs");
            $this->datatables->add_column('edit',"<div class='btn-group' style=''>".
               '<a href="'.base_url('tagihan/cetakpdf/$2/$3').'"><i class="fa fa-file-pdf-o"></i> PDF</a>
               <a href="'.base_url('tagihan/cetakpdf/$2').'" target="_blank"><i class="fa fa-print"></i> Print</a></div>' , 'id,base64_encode(id),base64_encode("pdf")');
            $this->datatables->unset_column('id,tgltempo,nimmhs,nmmhs,isvalidasi');

       
        echo $this->datatables->generate();
    }
    public function getalltagihan(){
        $kodemhs=$this->input->post('kodemhs');
        $nim=$this->input->post('nim');
        $istagih=$this->input->post('istagih');

        // if($this->isadmin()==1):
            if($istagih==FALSE||$istagih==null||empty($istagih)){

                $this->datatables->select("idtarif,kodetarif,kodeket,tarif,nim,mhs,kodemhs,tagvalstat")
                            ->from('008-view-tarifisnull');
            }elseif($istagih==TRUE||$istagih!=null||!empty($istagih)){
                if($istagih==1){

                    $this->datatables->select("idtarif,kodetarif,kodeket,tarif,nim,mhs,kodemhs,tagvalstat")
                            ->from('008-view-tarifisnotnull');
                }elseif($istagih==2){
                    $this->datatables->select("idtarif,kodetarif,kodeket,tarif,nim,mhs,kodemhs,tagvalstat")
                            ->from('008-view-tarifisnotnull');
                    $this->datatables->where('tagvalstat','valid');

                }
            
            }
            $this->datatables->where('kodemhs',$kodemhs);
            // $this->datatables->filter('nim',$nim);
                            // $this->datatables->join('mhsmaster as b','a.mhs=b.id','left');
            // $this->datatables->edit_column('tanggal','$1',"thedate(tanggal)");
            $this->datatables->edit_column('kodeket','$1',"bacatarif(kodeket)");
            $this->datatables->edit_column('tarif','<div class="text-right">$1</div>',"rp(tarif)");
           
            // $this->datatables->edit_column('mhs',"<a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihan/gettagihan/$3/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> ".'$2 ($1) </a>',"nimmhs,nmmhs,mhs");
            // $this->datatables->add_column('edit',"<div class='btn-group' style=''>".
               // '<a href="'.base_url('tagihan/cetakpdf/$2/$3').'"><i class="fa fa-file-pdf-o"></i> PDF</a>
               // <a href="'.base_url('tagihan/cetakpdf/$2').'" target="_blank"><i class="fa fa-print"></i> Print</a></div>' , 'id,base64_encode(id),base64_encode("pdf")');
            $this->datatables->unset_column('idtarif,nim,mhs,kodemhs');

       
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
    function getuserinfo(){
        if ($this->ion_auth->logged_in()):
            $user = $this->ion_auth->user()->row();
            if (!empty($user)):
                
                return $user;
            else:
                return array();
            endif;
        endif;
    }
    function forms(){   

        // $this->load->view('tagihanmhs_form_inside');
        $tahun=array(
            '0'=>'-- Pilih Tahun --',
            '2014'=>'2014',
            '2015'=>'2015',
            '2016'=>'2016',
            '2017'=>'2017',
            '2018'=>'2018',
            '2019'=>'2019',
            '2020'=>'2020',
            '2021'=>'2021',
        );
   
        $html=$this->load->view('formtagihan',array(
            'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
            'opt_paket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_detailpaket'=>array(),
            'opt_multipaket'=>$this->tagihdb->get_dropdown_paket(),
            'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_tahun'=>$tahun,
        ),true);
        $this->output->set_output($html);
        // return $html;

           
    }
    function formval($id=null){
        $id=base64_decode($id);
        $tagihan=$this->tagihdb->get_one($id);
        $html=$this->load->view('formval',array('default'=>$tagihan),true);
        $this->output->set_output($html);
        // return $html;
    }
    function formbayar($inv=null,$trf=null){
        $inv=base64_decode($inv);
        $trf=base64_decode($trf);
        // $tagihan=$this->tagihdb->get_one($inv);
        $tagihan=$this->tagihdb->getdetailtagihanmhs($inv,$trf);
        // print_r($tagihan);

        $tagihan['kodetarifcicilan']=$this->tagihdb->genkodecicilan($inv,$trf);
        $html=$this->load->view('formbayarcicilan',array('default'=>$tagihan),true);
        $this->output->set_output($html);
        // return $html;
    }
    function genkodecicilan($inv,$trf){
        $data=$this->tagihdb->getlastcicilan($inv,$trf);

    }
    function formvalpass($id){
        // $id=base64_decode($this->input->post('id'));
        // $password=base64_decode($this->input->post('password'));

        $tagihan=$this->tagihdb->get_one($id);
        $html=$this->load->view('formvalpass',array('default'=>$tagihan),true);
        // $this->output->set_output($html);
        return $html;
    }
    function gettabeltarif($nim,$kodemhs){
        // $id=base64_decode($id);
        // $tagihan=$this->tagihdb->get_one($id);
        $html=$this->load->view('modaltarif',array('kodemhs'=>$kodemhs,'nim'=>$nim),true);
        $this->output->set_output($html);
        // return $html;
    }
    function verval(){

    }
    function verify()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // print_r($this->getuserinfo());

        if ($this->form_validation->run() == true)
        {
            //check to see if the user is logging in
            //check for "remember me"

            $remember = (bool) $this->input->post('remember');
            $userinfo=$this->getuserinfo();
            // print_r($userinfo->username);
            // if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            if ($this->ion_auth->login($userinfo->username, $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $ok=$this->tagihdb->validasitagihan($this->input->post('id'));
                    $tagih=$this->tagihdb->get_one($this->input->post('id'));
                   /* if($this->ion_auth->in_group(1,2,3)){
                        redirect('/', 'refresh');
                    // redirect('/'.$lihat, 'refresh');
                    redirect(base_url('admin/bagian'), 'refresh');
                    }elseif($this->ion_auth->in_group(5)){
                        redirect(base_url('frontend'), 'refresh');
                    }else{
                        redirect('/', 'refresh');
                    }*/
               
                    echo json_encode(array('st'=>1,'msg'=>'<div class="alert alert-success">Verifikasi Berhasil: <strong>'.$tagih['kode'].'</strong></div>'));
            } else {

                echo json_encode(array('st'=>0,'msg'=>'<div class="alert alert-danger">'.$this->ion_auth->errors().'</div>'));
           }
        } else {
                echo json_encode(array('st'=>0,'msg'=>'<div class="alert alert-warning">'.validation_errors().'</div>'));
            
        }
    }
    function validation(){
        $idval=$this->input->post('idval');
        if($this->tagihdb->updvalid($idval)>0){

            $result=json_encode(array('st'=>1,'msg'=>'Validasi Sukses'));
        }else{
            $result=json_encode(array('st'=>0,'msg'=>'Validasi Gagal'));
        }
        echo $result;
    }
    function getmultitem($id,$isdetail=FALSE,$islunas=FALSE,$isprint=FALSE){
        $data=$this->tagihdb->get_one($id);
        if(!empty($data)):
            $multitem=$data['multiitem'];
            if(!empty($data['multiitem']) && $data['multiitem']!=='false'){
                // if($data['multiitem']!==0||$data['multiitem']!==null){
                   
                    $items=json_decode($data['multiitem']);
                    // print_r($items);
                    if($isdetail!==TRUE):
                        foreach ($items as $k => $v) {
                            # code...
                            $dt=$this->tagihdb->gettarifbyid($v);
                            // $dx[$k]['kode']=$dt['kodetarif'];
                            // $dx[$k]['ket']=trim(bacatarif($dt['kodetarif']));
                            // $dx[$k]['tarif']=$dt['tarif'];
                            $dx[$k]="<li class='list-group-item'>(".$dt['kodetarif'].") ".(trim(bacatarif($dt['kodetarif'])))."</li>";
                        }
                        // echo "<ul>".implode("", $dx)."</ul>";
                    else:
                        // print_r($data);
                        $i=1;
                        foreach ($items as $key => $value) {
                            # code...
                            $dt=$this->tagihdb->gettarifbyid($value);
                            $kodej=substr($dt['kodetarif'],4,2);
                            // print_r($data);
                            $ciciln=$this->tagihdb->gettarifcicilan($kodej);
                            $kdciciln=!empty($ciciln)?$ciciln['KodeJ']:'';
                            // print_r($kdciciln);
                            if($islunas==TRUE||$islunas==true):
                                if($kdciciln==$kodej):
                                // if((!empty($kdciciln)&&!empty($kodej))):
                                    // print_r('cicilan');
                                    $dx[]="<li class='list-group-item '><div class='pull-left text-right'>".$i." |  </div>"
                                    .(trim(bacatarif($dt['kodetarif'])))
                                    ."<strong> (".$dt['kodetarif'].")</strong>
                                    <div class='btn-group'>
                                   <a data-toggle='modal' href='#modal-bayar' data-load-remote='".base_url('tagihan/formbayar/'.base64_encode($data['kode']).'/'.base64_encode($dt['kodetarif']))."' data-remote-target='#modal-bayar .modal-body' data-inv='".$data[
                                    'kode']."' data-trf='".$dt['kodetarif']."' data-idmhs='".$data['mhs']."' class='btncicil btn btn-success btn-xs'><i class='fa fa-check'></i> Cicilan</a>
                                    <a class='lunas btn btn-xs btn-primary'>Lunas</a>
                                    </div> <span class='pull-right text-right'> ".rp($dt['tarif'])."</span></li>";
                                    // endif;
                                else:
                                    $dx[]="<li class='list-group-item '><div class='pull-left text-right'>".$i." | </div>".(trim(bacatarif($dt['kodetarif'])))."<strong> (".$dt['kodetarif'].")</strong> <span class='pull-right text-right'> ".rp($dt['tarif'])."</span></li>";
                                endif;     
                            else:
                                    $dx[]="<li class='list-group-item '><div class='pull-left text-right'>".$i." | </div>".(trim(bacatarif($dt['kodetarif'])))."<strong> (".$dt['kodetarif'].")</strong> <span class='pull-right text-right'> ".rp($dt['tarif'])."</span></li>";
                            endif;
                            $i++;
                        }

                    endif;
                
                     $total=$this->getotmultitem($id);
                        if($isprint==FALSE){

                        echo "<ul class='list-group gutter5'>".implode("", $dx)."<li style='border-top:1px solid #333333' class='list-group-item  active  text-right pull-right no-print'><h3>Total Tagihan: Rp".rp($total['total'])."</h3></li></ul>";
                        }else{
                        echo "<ul class='list-group no-gutter'>".implode("", $dx)."<li style='border-top:1px solid #333333' class='list-group-item  active  text-right pull-right no-print'></li></ul>";

                        }
                       
                // }else{
                    // echo $data['multiitem'];
                }else{
                    // echo $data['multiitem'];
                    echo "<h3>Data detail tidak ditemukan</h3>";
                // echo "<pre>";
                // print_r($dx);
                // echo "</pre>";
            }
        endif;
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
        return bacatarif($kode);
    }
    function bacaprodi($kode){
        
        $angkatan=substr($kode,0,2);
        $prodi=substr($kode,2,2);
     
        $bcprodi=$this->tarifdb->bacaprodi($prodi);
        // print_r($bcprodi);
        return ("Angkatan 20".$angkatan.", ".$bcprodi['Prodi']." ");

    }
    public function get($id=null){
        if($id!==null){
            echo json_encode($this->tagihdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('tagihanmhs_data');
    }
    function cetak(){
        $id=$this->input->post('id');
        $this->tagihdb->updcetak($id);

    }
    function cetakpdf($id,$pdf=true){

        $id=base64_decode($id);
        $pdf=base64_decode($pdf);

        if($id!=null){
            $data=$this->tagihdb->get_one($id);
            $this->template->set_layout('cetak');
           
            $html=$this->load->view('template-cetak-pdf',array('data'=>$data,'baseurl'=>base_url(),'total'=>$this->getotmultitem($id)),TRUE);
            if(!empty($pdf)||$pdf!=null){
                $this->load->helper(array('dompdf', 'file'));
                $inv=$data['kode'];
                // savepdf($html1, 'laporan-pembelian-'.date('d-m-Y-H-m-s'));
                cetaktagihan($html, $inv."-".date('d-m-Y-Hms'),TRUE);
            }else{          
                echo ($html);
            }
        }
    }
    function getone($id=null){
        if($id!==null){
            $data=$this->tagihdb->get_one($id);
            // print_r($data);
            $html=$this->load->view('viewdetailtagihan',array(
                'data'=>$data,
                'total'=>$this->getotmultitem($id))
            ,TRUE);
            $this->output->set_output($html);
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
    function getotmultitem($id){
        $data=$this->tagihdb->get_one($id);
        // print_r($data);
        if(!empty($data)){
            if($data['multiitem']!=='false'){
                $multiitem=json_decode($data['multiitem']);
                // print_r($multiitem);
                $total=0;
                // echo "<pre>";
                foreach ($multiitem as $key => $value) {
                    # code...
                    $dx=$this->tagihdb->gettarifbyid($value);
                // print_r($dx);
                    $total=$total+$dx['tarif'];
                }
                $result=array(
                    'id'=>$id,
                    'total'=>$total,
                );
                // print_r($result);
                // echo "</pre>";
                return $result;
            }
        }else{
            return array();
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
    function formtagihan(){
        $html=$this->load->view('formtagihan',true);
        // $html=$this->output->set_output($html);
        return $html;
    }
     function getjumlah(){
        $data=$this->input->post('data');
        $data=json_decode($data);
        // print_r($data);
        $total=0;$jumlah=0;$st=1;$msg='';
        foreach ($data as $key => $value) {
            $jml=$this->tarifdb->getbyid($value);
            $total=$total+$jml['Tarif'];
            $jumlah++;
            if($jumlah>10){
                $st='0';
                $msg='<h3 class="text-center alert-danger alert"><i class="fa fa-warning fa2x" ></i> Maksimal 10 item tarif</h3>';
            }else{
                $st='1';
                $msg='';

            }
            # code...
        }
            echo json_encode(array('total'=>$total,'jml'=>$jumlah,'st'=>$st,'msg'=>$msg));
    }
    function __formvalidation(){
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|xss_clean');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim|xss_clean');
        $this->form_validation->set_rules('mhs','Mahasiswa','required|numeric|is_natural_no_zero|trim|xss_clean');
        $this->form_validation->set_rules('total','Total Tagihan','required|numeric|trim|xss_clean');

       

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
    function __validationtagihan(){
        // $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('total','Total Tagihan','required|numeric|trim|xss_clean');
        // $this->form_validation->set_rules('password','Password','required|numeric|trim|xss_clean');

       

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
    function datacekval(){
        $data['id']=$this->input->post('id');
        $data['kode']=$this->input->post('kode');
        $data['tanggal']=NOW();
        $data['total']=$this->input->post('total');
        $valid=$this->tagihdb->get_one($this->input->post('id'));
        if($data['id']==$valid['id'] && $data['kode']==$valid['kode'] && $data['total']==$valid['total']){

            return array('data'=>$valid,'input'=>$data);
        }else{
            return array();
        }
    }
    function cekval(){
        if($this->__validationtagihan()===TRUE):
            $datavalid=$this->datacekval();
            if(!empty($datavalid)){
                // print_r($datavalid);
                $id=$datavalid['data']['id'];
                // echo json_encode(array('st'=>1, 'msg' => 'Data Valid','data'=>$datavalid));
                echo json_encode(array('st'=>1, 'msg' => 'Data Valid','view'=>$this->formvalpass($id)));
            }else{
                echo json_encode(array('st'=>0, 'msg' => 'Data Tidak Valid'));

            }

        else:
            echo $this->__validationtagihan();
        endif;
    }
    public function submitx(){
        // print_r($this->__formvalidation());
        if($this->__formvalidation()===TRUE):
            $item=$this->input->post('tarif', TRUE);
            // print_r($item);
            $paket=json_encode($item);
            // print_r(count($opt_pakett));
            // print_r(count($item));
            if(count($item)<=10):
                $data = array(
                
                    'kode' => $this->input->post('kode', TRUE),
                    'tanggal' => $this->input->post('tanggal', TRUE),
                    'total' => $this->input->post('total', TRUE),
                    'mhs' => $this->input->post('mhs', TRUE),
                    'multiitem' => $paket,
                    'status' => 'open',
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
                // print_r($dx);
                if ($this->input->post('ajax')){
                  if ($this->input->post('id')){
                    $this->tagihdb->update($this->input->post('id'));
                  // }elseif ($this->input->post('kode')){
                    // $this->tagihdb->updatebykode($this->input->post('kode'));
                  }else{
                    //$this->tagihdb->save();
                    // $this->tagihdb->saveas();
                    $this->tagihdb->savetagihanmhs($data);
                    $this->tagihdb->savedetailbatch($dx);
                  }

                }else{
                  if ($this->input->post('submit')){
                      if ($this->input->post('id')){
                        $this->tagihdb->update($this->input->post('id'));
                      }else{
                        //$this->tagihdb->save();
                        $this->tagihdb->savedetailbatch($dx);
                        $this->tagihdb->savetagihanmhs($data);
                        // $this->tagihdb->saveas();
                      }
                  }
                }
                //validasi backend
                echo json_encode(array('st'=>1, 'msg' => '<h3 class="text-center alert-success alert"><i class="fa fa-check fa2x" ></i> Data tagihan berhasil disimpan</h3>'));
            else:
                echo json_encode(array('st'=>0, 'msg' => '<h3 class="text-center alert-danger alert"><i class="fa fa-warning fa2x" ></i> Maksimal 10 item tarif</h3>'));
            endif;
        else:
            echo $this->__formvalidation();
        endif;
    }public function submit(){
        // print_r($this->__formvalidation());
        if($this->__formvalidation()===TRUE):
            $item=$this->input->post('tarif', TRUE);
            // print_r($item);
            $paket=json_encode($item);
            // print_r(count($opt_pakett));
            // print_r(count($item));
            if(count($item)<=10):
                $data = array(
                
                    'kode' => $this->input->post('kode', TRUE),
                    'tanggal' => $this->input->post('tanggal', TRUE),
                    'total' => $this->input->post('total', TRUE),
                    'mhs' => $this->input->post('mhs', TRUE),
                    'multiitem' => $paket,
                    'status' => 'open',
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
                foreach ($dx as $k => $v) {
                    # code...
                    // cektarif($v[$k]); jika ini cicilan
                }
                // print_r($dx);
                if ($this->input->post('ajax')){
                  if ($this->input->post('id')){
                    $this->tagihdb->update($this->input->post('id'));
                  // }elseif ($this->input->post('kode')){
                    // $this->tagihdb->updatebykode($this->input->post('kode'));
                  }else{
                    //$this->tagihdb->save();
                    // $this->tagihdb->saveas();
                    $this->tagihdb->savetagihanmhs($data);
                    $this->tagihdb->savedetailbatch($dx);
                  }

                }else{
                  if ($this->input->post('submit')){
                      if ($this->input->post('id')){
                        $this->tagihdb->update($this->input->post('id'));
                      }else{
                        //$this->tagihdb->save();
                        $this->tagihdb->savedetailbatch($dx);
                        $this->tagihdb->savetagihanmhs($data);
                        // $this->tagihdb->saveas();
                      }
                  }
                }
                //validasi backend
                echo json_encode(array('st'=>1, 'msg' => '<h3 class="text-center alert-success alert"><i class="fa fa-check fa2x" ></i> Data tagihan berhasil disimpan</h3>'));
            else:
                echo json_encode(array('st'=>0, 'msg' => '<h3 class="text-center alert-danger alert"><i class="fa fa-warning fa2x" ></i> Maksimal 10 item tarif</h3>'));
            endif;
        else:
            echo $this->__formvalidation();
        endif;
    }
    

    
    public function delete(){
        if(isset($_POST['ajax'])){
            if(!empty($this->input->post('id'))){
                $row=$this->tagihdb->get_one($this->input->post('id'));
                $rows=$this->tagihdb->delete($this->input->post('id'));

                if($rows>0){
                    $this->tagihdb->deldetailbykode($row['kode']);
                }
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
