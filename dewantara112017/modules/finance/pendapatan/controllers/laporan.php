<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
		$this->load->model('customer_model','csdb',TRUE);     
		$this->load->model('supplier_model','spdb',TRUE);     
		$this->load->model('pendapatan_model','earndb',TRUE);   
		$this->load->model('karyawan_model','empdb',TRUE);   
		$this->template->set_layout('dashboard');

	}
	public function index($type=null)
	{
		$this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        $this->template->add_js('
            var baseurl="'.base_url('pendapatan').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap input-lg"
            });
          ','embed');  
        $this->template->add_js('modules/laporan_pendapatan.js');
        $this->template->add_js('https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css','cdn');
        $this->template->load_view('pendapatan_view',array(
            'opt_vendor'=>$this->earndb->getdropvendor(),
 			'view'=>'form_laporan',
            'title'=>'Laporan Pembelian',
            'subtitle'=>'Laporan Pembelian',
            'action'=>base_url('pendapatan/laporan/get_laporan/pdf')
   			));
	}

	function get_laporan($pdf=null){
		$data['end']=$this->input->post('end');
        $data['start']=$this->input->post('start');
        $lap=$this->input->post('laporan');
        $kode=$this->input->post('vendor');
        if((!empty($kode))&&($kode!==null||$kode!==0||$kode!=='')){

        	$vendor=$this->earndb->getone_vendor($kode);
            // print_r($vendor);
	        if($vendor['tipe']==1){
	        	$vndor=$this->csdb->get_onebykode($kode);
	        }elseif($vendor['tipe']==2){
	        	$vndor=$this->spdb->get_onebykode($kode);
	        }elseif($vendor['tipe']==3){
	        	$vndor=$this->empdb->get_onebykode($kode);
	        }else{

	        }
       		$data['kdvendor']=$kode;
       		$data['vendor'][]=$vndor;
        }else{
       		$data['kdvendor']='';
            // $data['vendor']=$this->earndb->getvendor();
            $data['vendor']=$this->earndb->getrekap_vendor($data);
       		
        	// print_r($data['vendor']);
        }	
        // print_r($vndor);
       
        // print_r($data);
        if(!empty($lap)||$lap>0){
            switch ($lap) {
                case '1':
                    $judul="LAPORAN PENDAPATAN LAIN-LAIN DETAIL ";
                    if(!empty($pdf)||$pdf!=null){
                        $html=$this->getvendorpdf($data,$judul);
                    }else{
                        $html=$this->getvendor($data,$judul);
                    }
                break;
                case '2':
                    $judul="LAPORAN PENDAPATAN LAIN-LAIN REKAP PER VENDOR";
                    if(!empty($pdf)||$pdf!=null){
                        $html=$this->getrekappdf($data,$judul);
                    }else{
                        $html=$this->getrekap($data,$judul);
                    }
                break; 
                case '3':
                    $judul="LAPORAN PENDAPATAN LAIN-LAIN REKAP PER TANGGAL";
                    if(!empty($pdf)||$pdf!=null){
                        $html=$this->getrekaptglpdf($data,$judul);
                    }else{
                        $html=$this->getrekaptgl($data,$judul);
                    }
                break;
                case '4':
                    $judul="LAPORAN RAGAM PENDAPATAN";
                    if(!empty($pdf)||$pdf!=null){
                        $html=$this->getpendapatanpdf($data,$judul);
                    }else{
                        $html=$this->getpendapatan($data,$judul);
                    }
                break;
                
                default:
                    $judul="LAPORAN PENDAPATAN";
            		$html=$this->get404();
                    # code...
                    break;
            }
        }else{
            $html=$this->get404();
            // print_r($data);
        }
        if(!empty($pdf)||$pdf!=null){
            $this->load->helper(array('dompdf', 'file'));
            // $html1=$datax;
            $html2=$this->load->view('template_cetak',array(
                'html'=>$html,
                'title'=>$judul,
                'data'=>$data,

            ),TRUE);
            buildpdf($html2,'A4','portrait', 'laporan-pendapatan-lain-'.date('d-m-Y-Hms'),TRUE);
            // $this->output->set_output($html2);
     
        }else{

            // $html=$this->get_trx($data);
            // $html=$datax;
            $this->output->set_output($html);
        }

	}
    function cekt($noacc){
        $noaccx=str_replace(array('.', ','), '' , $noacc);
        echo substr(trim($noaccx),0,5);
    }
    function getdatarekap(){
        echo $this->__getdatarekap();
    }
    function tabeldatarekap(){
        return $this->__getdatarekap('raw');
    }
    public function __getdatarekap($type=null){
        
            // $this->datatables->select('id,Faktur,Tgl,Jthtmp,Customer,NmCustomer,NoAccCust,Golongan,NoBon,Total,Tunai,Kas,Bank,Hutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,KodeBank,NoAccBank')
            $this->datatables->select('id,NoAccCust as rek,Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,Tgl as Tanggal,')
                            ->from('pendapatan')
                            ->group_by('Customer');
                            // ->order_by('');
            if(!empty($this->input->post('mulai'))){
                $this->datatables->where('Tgl >=',$this->input->post('mulai'));
            }
            if(!empty($this->input->post('akhir'))){
                $this->datatables->where('Tgl <=',$this->input->post('akhir'));
            } 
            // $this->datatables->where('Tgl >=','2017-03-01');
            // $this->datatables->where('Tgl <=','2017-08-01');
            if(!empty($this->input->post('kdvendor'))){
                $this->datatables->where('Customer',$this->input->post('kdvendor'));
            }

            $this->datatables->edit_column('rek','$1',"cektipe('rek')");
            $this->datatables->edit_column('nama','$1 ($2)','nama,kode,noacc');
            $this->datatables->edit_column('totalx','<div class="text-right">$1</div>','rp(totalx)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'Customer');
            $this->datatables->unset_column('id,kode');

        if((!empty($type)||$type!=null)&&$type=="raw"){

            return $this->datatables->generate('raw');
        }elseif((!empty($type)||$type!=null)&&$type=="json"){
            return $this->datatables->generate('json');
        }else{
            return $this->datatables->generate();

        }
    }
    function getdatarekaptgl(){
        echo $this->__getdatarekaptgl();
    }
    function tabeldatarekaptgl(){
        return $this->__getdatarekaptgl('raw');
    }
    public function __getdatarekaptgl($type=null,$data=null){
        
            // $this->datatables->select('id,Faktur,Tgl,Jthtmp,Supplier,NmSupplier,NoAccCust,Golongan,NoBon,Total,Tunai,Kas,Bank,Hutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,KodeBank,NoAccBank')
            $this->datatables->select('id,Customer as kode,Tgl as Tanggal,sum(total) as totalx,NmCustomer as nama,NoAccCust as noacc,')
                            ->from('pendapatan')
                            ->group_by('Tgl');
                            // ->order_by('');
            if(!empty($this->input->post('mulai'))){
                $this->datatables->where('Tgl >=',$this->input->post('mulai'));
            }elseif(!empty($data['mulai'])){
                $this->datatables->where('Tgl >=',$data['mulai']);
            }
            if(!empty($this->input->post('akhir'))){
                $this->datatables->where('Tgl <=',$this->input->post('akhir'));
            }elseif(!empty($data['end'])){
                $this->datatables->where('Tgl <=',$data['end']);
            } 
            // $this->datatables->where('Tgl >=','2017-03-01');
            // $this->datatables->where('Tgl <=','2017-08-01');
            if(!empty($this->input->post('kdvendor'))){
                $this->datatables->where('Customer',$this->input->post('kdvendor'));
            }elseif(!empty($data['kdvendor'])){
                $this->datatables->where('Customer',$data['kdvendor']);
            } 

            $this->datatables->edit_column('Tanggal','<div class="text-center">$1</div>','thedate(Tanggal)');
            $this->datatables->edit_column('totalx','<div class="text-right">$1</div>','rp(totalx)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'Customer');
            $this->datatables->unset_column('id,kode');

        if((!empty($type)||$type!=null)&&$type=="raw"){

            return $this->datatables->generate('raw');
        }elseif((!empty($type)||$type!=null)&&$type=="json"){
            return $this->datatables->generate('json');
        }else{
            return $this->datatables->generate();

        }
    }
    function getdetail(){
        echo $this->__getdetail();
    }
    function tabeldetail(){
        return $this->__getdetail('raw');
    }
    public function __getdetail($type=null){
        
            // $this->datatables->select('id,Faktur,Tgl,Jthtmp,Supplier,NmSupplier,NoAccCust,Golongan,NoBon,Total,Tunai,Kas,Bank,Hutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,KodeBank,NoAccBank')
            $this->datatables->select('id,Faktur,Tgl as tanggal,Jthtmp as jthtempo, NoAccCust as rek,Customer as kode,NmCustomer as nama,NoAccCust as noacc,sum(total) as totalx,')
                            ->from('pendapatan');
                            // ->group_by('Customer');
                            // ->order_by('');
            if(!empty($this->input->post('mulai'))){
                $this->datatables->where('Tgl >=',$this->input->post('mulai'));
            }
            if(!empty($this->input->post('akhir'))){
                $this->datatables->where('Tgl <=',$this->input->post('akhir'));
            } 
            // $this->datatables->where('Tgl >=','2017-03-01');
            // $this->datatables->where('Tgl <=','2017-08-01');
            if(!empty($this->input->post('kdvendor'))){
                $this->datatables->where('Customer',$this->input->post('kdvendor'));
            }

            $this->datatables->edit_column('rek','$1',"cektipe('rek')");
            $this->datatables->edit_column('nama','$1 ($2)','nama,kode,noacc');
            $this->datatables->edit_column('totalx','<div class="text-right">$1</div>','rp(totalx)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'Customer');
            $this->datatables->unset_column('id,kode');

        if((!empty($type)||$type!=null)&&$type=="raw"){

            return $this->datatables->generate('raw');
        }elseif((!empty($type)||$type!=null)&&$type=="json"){
            return $this->datatables->generate('json');
        }else{
            return $this->datatables->generate();

        }
    }
    function getrekappendapatan(){
        echo $this->__getrekappendapatan();
    }
    function tabelrekappendapatan(){
        return $this->__getrekappendapatan('raw');
    }
    public function __getrekappendapatan($type=null,$data=null){
        
            // $this->datatables->select('id,Faktur,Tgl,Jthtmp,Supplier,NmSupplier,NoAccCust,Golongan,NoBon,Total,Tunai,Kas,Bank,Hutang,Lunas,DiscLunas,Sisa,SLunas,SDiscLunas,KodeBank,NoAccBank')
            $this->datatables->select('id,rekening,kode,keterangan,sum(jumlah) as totalx,faktur,tanggal,')
                            ->from('pendapatan_detail')
                            ->group_by('kode');
                            // ->order_by('');
            if(!empty($this->input->post('mulai'))){
                $this->datatables->where('tanggal >=',$this->input->post('mulai'));
            }elseif(!empty($data['start'])){
                $this->datatables->where('tanggal >=',$data['start']);
            }


            if(!empty($this->input->post('akhir'))){
                $this->datatables->where('tanggal <=',$this->input->post('akhir'));
            } elseif(!empty($data['end'])){
                $this->datatables->where('tanggal <=',$data['end']);
            } 
            // $this->datatables->where('Tgl >=','2017-03-01');
            // $this->datatables->where('Tgl <=','2017-08-01');
           /* if(!empty($this->input->post('kdvendor'))){
                $this->datatables->where('Supplier',$this->input->post('kdvendor'));
            }elseif(!empty($data['kdvendor'])){
                $this->datatables->where('Supplier',$data['kdvendor']);
            } */

           
            // $this->datatables->edit_column('keterangan','($1) $2','keterangan,kode');
            $this->datatables->edit_column('totalx','<div class="text-right">$1</div>','rp(totalx)');
            $this->datatables->add_column('edit',"<div class='btn-group'>
                <a data-toggle='modal' href='#modal-id' data-load-remote='".base_url('pendapatan/getone/$1/')."' data-remote-target='#modal-id .modal-body' class='btn btn-info btn-xs'><i class='fa fa-info-circle'></i> </a>

                <a href='#outside' data-toggle='tooltip' data-placement='top' title='Edit' class='edit btn btn-xs btn-success' id='$1'><i class='glyphicon glyphicon-edit'></i></a>
                <button data-toggle='tooltip' data-placement='top' title='Hapus' class='delete btn btn-xs btn-danger'id='$1'><i class='glyphicon glyphicon-remove'></i></button>
                </div>" , 'Supplier');
            $this->datatables->unset_column('id');

        if((!empty($type)||$type!=null)&&$type=="raw"){

            return $this->datatables->generate('raw');
        }elseif((!empty($type)||$type!=null)&&$type=="json"){
            return $this->datatables->generate('json');
        }else{
            return $this->datatables->generate();

        }
    }
    function getrekapdata(){
        $data['start']='2017-01-01';
        $data['end']='2017-08-08';
        $data['kode']='';
        $result=$this->earndb->getrekap_vendor($data);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
    function getsort(){
        $data=ksort($this->__getdropvendor());
        print_r($data);
    }
    function getdropvendor(){
        $data=$this->__getdropvendor();
        $result[0]="-- Pilih Vendor --";
        foreach ($data as $key => $value) {
            # code...
            $id=$value['id'];
            $Nama=$value['Nama'];
            $Kode=$value['Kode'];
            $jenis=$value['nmtipe'];
            
            $result[$Kode]=(strtoupper($jenis)).", ".$Nama." (".$Kode.")";
            // $result[$row->Kode]= strtoupper($row->nmtipe).", ".$row->Nama." (".$row->Kode.")";
        }
        // array_multisort($result, SORT_DESC, $data);
        // echo json_encode($result);
        // print_r($result);
        // echo json_encode($data);
        echo json_encode($result);
    }
    function __getdropvendor(){
        $jenis=$this->input->post('jenis');
        $data=$this->earndb->getvendor_byjenis($jenis);
        return $data;
    }
    function dropdown_customer(){
        $result = array();
        $array_keys_values = $this->db->query('select id,Kode,Nama,Wilayah from `customer` where golongan!="TK" order by id asc');
        $result[0]="-- Pilih Customer --";
        foreach ($array_keys_values->result() as $row)
        {
            $result[$row->id]= $row->Nama." (".$row->Kode.")";
        }
        print_r($result);
    }
	function enkrip(){
        return md5($this->session->userdata('lihat').":".userid()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    function get404(){
        $html=$this->load->view('nodata',array(),TRUE);
        return $html;
    }
    function getvendor($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        $detail=array();
      
        $html=$this->load->view('tabel-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    } 
    
    function getvendorpdf($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        $detail=array();
      
        $html=$this->load->view('tabel-vendorpdf',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getbon($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getbon($data['kdvendor']);
        $detail=array();
        // print_r($data);
      
        $html=$this->load->view('tabel-bon',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getbonpdf($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        $detail=array();
      
        $html=$this->load->view('tabel-bonpdf',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getrekap($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        $detail=array();
      /*  if(count($data['vendor'])>1){
            unset($data['vendor']);
        }*/
        $html=$this->load->view('tabel-rekap-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }

    function getrekappdf($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=array();
 
        $result=$this->tabeldatarekap();
   
        $detail=$result['aaData'];
        $html=$this->load->view('tabel-rekap-vendorpdfx',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        // $html=$this->load->view('tabel-rekap-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getpendapatan($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        $detail=array();
      /*  if(count($data['vendor'])>1){
            unset($data['vendor']);
        }*/
        $html=$this->load->view('tabel-rekap-pendapatan',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }

    function getpendapatanpdf($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=array();
        // print_r($data);
        $result=$this->__getrekappendapatan('raw',$data);
        // print_r($result);
        $detail=$result['aaData'];
        $html=$this->load->view('tabel-rekap-pendapatanpdf',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        // $html=$this->load->view('tabel-rekap-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getrekaptglpdf($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detaipendapatan);
        $data['mulai']=$data['start'];
        $data['akhir']=$data['end'];
        // unset($data['vendor']); 
        // unset($data['start']); 
        // unset($data['end']); 
        // print_r($data);
        $result=$this->__getdatarekaptgl('raw',$data);
   
        $detail=$result['aaData'];
        $html=$this->load->view('tabel-rekap-vendortglpdf',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        // $html=$this->load->view('tabel-rekap-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
   
   function getrekaptgl($data,$judul=null){
        $this->template->set_layout('cetak');
        // $detail=$this->earndb->getvendor($data['kdvendor']);
        // $result=$this->tabeldatarekaptgl();
        $detail=array();
      /*  if(count($data['vendor'])>1){
            unset($data['vendor']);
        }*/
        // $detail=$result['aaData'];
        $html=$this->load->view('tabel-rekap-vendortgl',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
     
}

/* End of file laporan.php */
/* Location: ./ */ ?>