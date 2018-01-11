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
            redirect('auth/login', 'refresh');
        endif;

           
        
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
        $this->template->add_js('var baseurl="'.base_url().'tagihan/";
             
            ','embed');  
        $this->template->add_js('modules/tagihan.0.1.js');
        $this->template->add_css('forms.css');
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
         $this->template->add_js('modules/tagihan.0.1.js');
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
            

        // if(isset($idmhs)||!empty($idmhs)){
            $mhs=$this->mhsdb->get_one($idmhs);
            $kode=substr($mhs['nim'],0,4);
            $this->datatables->select('id,kodetarif,kodeket,tarif,kodemhs,kdsmster,tahun,kel')->from('004-view-tarif');
            // $this->datatables->filter(array('kodemhs'=>$kode,'tahun'=>$tahun,'kdsmster'=>$kdsmster,'kel'=>$kel));
            $this->datatables->filter(array('kodemhs'=>$kode));
            // $this->datatables->where('kodemhs',$kode);
            // print_r($mhs);
            // if(!empty($mhs)||$mhs!==''){
                
        // $this->datatables->select('id,kodetarif,tarif,kodemhs,kdsmster,tahun');
                
        // }
        // }else{
            // $this->datatables->select('id,kodetarif,tarif,kodemhs')->from('004-view-tarif');
        // }
        if(isset($kdsmster)||!empty($kdsmster)||$kdsmster!==0||$kdsmster!==null){
            $this->datatables->where('kdsmster',$kdsmster);
        }
        if(isset($tahun)||!empty($tahun)||$tahun!==0||$tahun!==null){
            $this->datatables->where('tahun',$tahun);
        }
        if(isset($kel)||!empty($kel)||$kel!==0||$kel!==null){
            $this->datatables->where('kel',$kel);
        }
            $this->datatables->edit_column('id','<div class="text-center"><input class="checkbox" type="checkbox" id="tarif" value="$1" name="tarif[]"></div>','id');
            $this->datatables->edit_column('tarif','<div class="text-right">$1</div>','rp(tarif)');
            $this->datatables->edit_column('kodeket','<div class="text-left">$1</div>','bacatarif(kodeket)');
         
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tarif/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>
                </div>" , 'id');
            $this->datatables->unset_column('kodemhs,tahun,kdsmster,kel');
        echo $this->datatables->generate();
    }

    public function getdatatables(){
        // if($this->isadmin()==1):
            $this->datatables->select("id,kode,tanggal,tgltempo,mhs,nimmhs,nmmhs,id as idmultipaket,multipaket,status,islunas")
                            ->from('001-view-tagihanmhs');
                            // $this->datatables->join('mhsmaster as b','a.mhs=b.id','left');
            $this->datatables->edit_column('tanggal','<label class="label label-primary">$1</label><br><label class="label label-info label-xs">$1</label>',"thedate(tanggal),thedate(tgltempo)");
            $this->datatables->edit_column('status','$1',"getstatus(id)");
            $this->datatables->edit_column('mhs','$2 ($1)',"nimmhs,nmmhs");
            $this->datatables->edit_column('idmultipaket','$1',"getmultipaket(id)");
            $this->datatables->add_column('edit',"<div class='btn-group' style=''>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('tagihan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>"
                .'
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-eye"></i> Aksi <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" style="position:relative;z-index:10000 !important">
    <li><a href="#">Lihat</a></li>
    <li><a href="'.base_url('tagihan/cetakpdf/$2/$3').'"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
    <li><a href="'.base_url('tagihan/cetakpdf/$2').'" target="_blank"><i class="fa fa-print"></i> Print</a></li>
     <li role="separator" class="divider"></li>'
     ."<li><a href='#' class='edit' title='Edit' id='$1'><i class='fa fa-edit'></i> Edit</a></li>
               <li> <a data-toggle='tooltip' data-placement='top' title='Hapus' class='delete ' id='$1'><i class='fa fa-remove'></i> Hapus</a></li>".'</ul>
</div>' , 'id,base64_encode(id),base64_encode("pdf")');
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
    function getmultitem($id,$isdetail=FALSE){
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
                            $dx[$k]="<li>(".$dt['kodetarif'].") ".(trim(bacatarif($dt['kodetarif'])))."</li>";
                        }
                        // echo "<ul>".implode("", $dx)."</ul>";
                    else:
                        // print_r($data);
                        foreach ($items as $key => $value) {
                            # code...
                            $dt=$this->tagihdb->gettarifbyid($value);
                            
                            $dx[]="<li>(".$dt['kodetarif'].") ".(trim(bacatarif($dt['kodetarif'])))."<span class='pull-right text-right'> ".rp($dt['tarif'])."</span></li>";
                            
                        }

                    endif;
                    $total=$this->getotmultitem($id);
                        echo "<ul>".implode("", $dx)."<span style='border-top:1px solid #333333' class='pull-right text-right'>".rp($total['total'])."</span></ul>";
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
    function getmultipaketx($id,$isdetail=FALSE){
 // function getmultipaket($id=null){
        // $ci = & get_instance(); 
        // $data=$ci->tagihdb->getmultipaket($id);
        // if($data['multipaket']!=='false'||is_null($data['multipaket'])||!empty($data['multipaket'])){
        if(!empty($data['multipaket'])){
            if($data['multipaket']!=='false'){
                $multi=json_decode($data['multipaket']);
                // print_r($multi);
                $total=0;
                foreach ($multi as $value) {
                    # code...
                    $datapaket=$ci->tagihdb->getpaket($value);
                    $paket[]="";
                    $paket[].="<li>".$datapaket['nama']. "(".$datapaket['kode'].")";
                    if($isdetail==TRUE){
                        $detail=$ci->tagihdb->getdetailmultipaket($datapaket['id']);
                        $paket[].="<ul>";
                        $biaya=0;
                        foreach ($detail as $k => $v) {
                            $paket[].="<li>".$v['nm_tagihan']." (".rp($v['nominal_biaya']).")</li>";
                            $biaya=$biaya+$v['nominal_biaya'];
                        }

                        $paket[].="</ul>";
                        // $paket[].="<h4 class='text-right'>".rp($biaya)."</h4>";

                        $total=$total+$biaya;
                    }
                    $paket[].="</li>";
                    // $paket[].="<h3 class='text-right'>".rp($total)."</h3>";
                }
                $output=implode(" ",$paket);
                if($isdetail==TRUE){
                    return "<ul>".$output."</ul><h3 class='text-right'>".rp($total)."</h3>";
                }else{
                    return "<ul>".$output."</ul>";
                }
                // echo "<pre>";
                // print_r($output);
                // echo "</pre>";
            }else{
                return " ";
            }
                return " ";
        }
    // }

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
    public function get($id=null){
        if($id!==null){
            echo json_encode($this->tagihdb->get_one($id));
        }
    }
    function tables(){
        $this->load->view('tagihanmhs_data');
    }
    function cetakpdf($id,$pdf=true){
        // $enkrip=$this->enkrip();
        $id=base64_decode($id);
        $pdf=base64_decode($pdf);
        // print_r($id);
        // print_r($pdf);
        if($id!=null){
            $data=$this->tagihdb->get_one($id);
          
            $this->template->set_layout('cetak');
            $html=$this->load->view('template-cetak-pdf',array('data'=>$data,'total'=>$this->getotmultitem($id)),TRUE);

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
                $inv=$data['kode'];
                // savepdf($html1, 'laporan-pembelian-'.date('d-m-Y-H-m-s'));
                buildpdf($html, $inv."-".date('d-m-Y-Hms'),TRUE);
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
    function formtagihan(){
        $html=$this->load->view('formtagihan',true);
        // $html=$this->output->set_output($html);
        return $html;
    }
     function getjumlah(){
        $data=$this->input->post('data');
        $data=json_decode($data);
        // print_r($data);
        $total=0;
        foreach ($data as $key => $value) {
            $jml=$this->tarifdb->getbyid($value);
            $total=$total+$jml['Tarif'];
            # code...
        }
            echo json_encode($total);
    }
    function __formvalidation(){
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim|xss_clean');
        $this->form_validation->set_rules('kode', 'Kode', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|xss_clean');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tarif[]','Item Tarif Tagihan ','required|numeric|trim|xss_clean');
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
    public function submit(){
        // print_r($this->__formvalidation());
        if($this->__formvalidation()===TRUE):
            $item=$this->input->post('tarif', TRUE);
            // print_r($item);
            $paket=json_encode($item);
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
            echo json_encode(array('st'=>1, 'msg' => 'Data tagihan sukses disimpan'));
        else:
            echo $this->__formvalidation();
        endif;
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
