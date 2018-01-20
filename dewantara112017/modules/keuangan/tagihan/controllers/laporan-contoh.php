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
		$this->load->model('sales_trx_model','salesdb',TRUE);      
        $this->load->model('kartustok_model','stokdb',TRUE);
        $this->load->model('gudang_model','gddb',TRUE);  
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
            var baseurl="'.base_url('sales_trx').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap input-lg"
            });
          ','embed');  
        $this->template->add_js('modules/salesreport.01.js');
        $this->template->load_view('sales_trx_view',array(
            'opt_customer'=>$this->csdb->dropdown_customer(),
            'opt_mitra'=>$this->csdb->dropdown_mitra(),
 			'opt_supplier'=>$this->spdb->dropdown_supplier(),
 			'view'=>'form_laporan',
            'title'=>'Laporan Penjualan',
            'subtitle'=>'Laporan Penjualan',
            'action'=>base_url('sales_trx/laporan/get_laporan/pdf')
   			));
	}
	function get_laporan($pdf=null){
		$data['end']=$this->input->post('end');
        $data['start']=$this->input->post('start');
        $data['id_customer']=$this->input->post('id_customer');
        $data['id_supplier']=$this->input->post('id_supplier');
        // $data['id_mitra']=$this->input->post('id_mitra');
        $cs=$this->csdb->get_one($data['id_customer']);
        $lap=$this->input->post('laporan');
        // print_r($data);
        if(!empty($lap)||$lap>0){
            switch ($lap) {
                case '1':
                    // print_r($data);
                    $judul="LAPORAN PER FAKTUR DETAIL ";
                    $html=$this->get_trx($data,$judul);
                break;
                case '2':
                    $judul="LAPORAN PER FAKTUR REKAP";
                    $html=$this->get_trx_rekap($data,$judul);
                break;
                case '3':
                    $judul="LAPORAN HARIAN DETAIL";
                    $html=$this->get_trx_harian($data,$judul);
                break;
                case '4':
                    $judul="LAPORAN HARIAN REKAP";
                    $html=$this->get_trx_harian_rekap($data,$judul);
                break;
                case '5':
                    $judul="LAPORAN PER GOLONGAN BARANG DETAIL";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get_golongan_detail($data,$judul);
                    // $html=$this->get404();
                break;
                case '6':
                    $judul="LAPORAN PER GOLONGAN BARANG REKAP";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get_golongan_rekap($data,$judul);
                    // $html=$this->get404();
                break;
                case '7':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break;
                case '8':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break;
                case '9':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break;
                case '10':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break;
                case '11':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break; 
                case '12':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break; 
                case '13':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break; 
                case '14':
                    // $judul="LAPORAN KARTU HUTANG";
                    // $html=$this->getjatuhtempo($data,$judul);
                    $html=$this->get404();
                break;
                
                default:
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
            buildpdf($html2, 'laporan-hutang-'.date('d-m-Y-Hms'),TRUE);
            
     
        }else{

            // $html=$this->get_trx($data);
            // $html=$datax;
            $this->output->set_output($html);
        }

	}
	function enkrip(){
        return md5($this->session->userdata('lihat').":".userid()."+".date('H:m'));
        // echo $this->session->userdata('purchase_order');
    }
    function get404(){
        $html=$this->load->view('nodata',array(),TRUE);
        return $html;
    }
    function get_trx($datax,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->salesdb->getlaporan_faktur($datax);
        $judul='LAPORAN';
        $html=$this->load->view('tabel_jual',array('data'=>$data,'judul'=>$judul),TRUE);
        return $html;
    }
    function get_trx_rekap($datax,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->salesdb->getlaporan_faktur($datax);
        $html=$this->load->view('tabel_trx_rekap',array('data'=>$data,'judul'=>$judul),TRUE);
        return $html;
    }
    function get_trx_harian($datax,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->gen_daterange($datax);
        $html=$this->load->view('tabel_trx_harian',array('data'=>$data,'datax'=>$datax,'judul'=>$judul),TRUE);
        return $html;
    } 
    function get_trx_harian_rekap($datax,$judul=null){
        $this->template->set_layout('cetak');
        
        $data=$this->gen_daterange($datax);
        $html=$this->load->view('tabel_trx_harian_rekap',array('data'=>$data,'datax'=>$datax,'judul'=>$judul),TRUE);
        return $html;
    } 
    function get_golongan_detail($datax,$judul=null){
        $this->template->set_layout('cetak');
        $gol=$this->salesdb->get_golonganbarang(); 
        $data=$this->salesdb->getlaporan_faktur($datax,4);
        $html=$this->load->view('tabel_trx_golongan',array('golongan'=>$gol,'data'=>$data,'datax'=>$datax,'judul'=>$judul),TRUE);
        return $html;
    }  
    function get_golongan_rekap($datax,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->gen_daterange($datax);
        $html=$this->load->view('tabel_golongan_rekap',array('data'=>$data,'datax'=>$datax,'judul'=>$judul),TRUE);
        return $html;
    } 
    function getjual($data,$judul=null){
        $this->template->set_layout('cetak');
        $detail=$this->salesdb->getrekap_hutang($data);
        $html=$this->load->view('tabel-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getcustomer($data,$judul=null){
        $this->template->set_layout('cetak');
        // $data=$this->salesdb->getlaporan_hutang($data);
        $detail=$this->salesdb->getrekap_hutang($data);
        // print_r($detail);
        // $judul='LAPORAN HUTANG';
        $html=$this->load->view('tabel-vendor',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function getrekap($data,$judul=null){
        $this->template->set_layout('cetak');
        // $data=$this->salesdb->getlaporan_hutang($data);
        $detail=$this->salesdb->getrekap_hutang($data);
        
        // $judul='LAPORAN HUTANG';
        $html=$this->load->view('tabel-vendor-detail',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function gethutang($data,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->salesdb->getlaporan_hutang($data);
        // $datax=$this->csdb->getcustomer($data);
        // $judul='LAPORAN HUTANG';
        $html=$this->load->view('tabel-hutang',array('data'=>$data,'judul'=>$judul),TRUE);
        return $html;
    }
    function getsummary($data,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->salesdb->getsummary();
        // $datax=$this->csdb->getcustomer($data);
        // $judul='LAPORAN HUTANG';
        $html=$this->load->view('tabel-summary',array('data'=>$data,'judul'=>$judul),TRUE);
        return $html;
    }
    function getjatuhtempo($data,$judul=null){
        $this->template->set_layout('cetak');
        $detail=$this->salesdb->getcustomertempo($data);
        // $datax=$this->csdb->getcustomer($data);
        // $judul='LAPORAN HUTANG';
        $html=$this->load->view('tabel-customer-tempo',array('data'=>$data,'judul'=>$judul,'detail'=>$detail),TRUE);
        return $html;
    }
    function gen_daterange($datax,$judul=null){
        $this->template->set_layout('cetak');
        $daterange=$this->gendate($datax['start'],$datax['end']);
        return $daterange;
    }
    function gendate($start=null,$end=null){
        if(empty($start)||$start==null){
            $start=date('Y-m-d');
        }
        if(empty($end)||$end==null){
            $else=date('Y-m-d');
        }
        return ( $this->dateRange( $start, $end,'+1 day') );
    }
    function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

        $dates = array();
        $current = strtotime( $first );
        $last = strtotime( $last );
        $i=1;
        while( ($current <= $last) && ($i<=84) ) {

            $dates[] = date( $format, $current );
            $current = strtotime( $step, $current );
            $i++;
        }

        return $dates;
    }
}

/* End of file laporan.php */
/* Location: ./ */

 ?>
