
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Laporan extends MX_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('tagihan_model','tagihdb',TRUE);
		$this->load->model('laporan_tagihan_model','lapordb',TRUE);
        $this->load->model('tarif/tarif_model','tarifdb',TRUE);
        $this->load->model('mhsmaster/mhsmaster_model','mhsdb',TRUE);
		if ( !$this->ion_auth->logged_in()): 
            redirect('auth/login', 'refresh');
        endif;
	}
	public function index()
	{
        $this->template->set_layout('dashboard');
        $this->template->add_css('plugins/datapicker/datepicker3.css');
        $this->template->add_js('plugins/datapicker/bootstrap-datepicker.js');
        $this->template->add_js('datepicker.js');
        $this->template->add_js('plugins/select2/select2.min.js');
        $this->template->add_css('plugins/select2/select2.min.css');
        $this->template->add_css('plugins/select2/select2-bootstrap.min.css');
        $this->template->add_js('
            var baseurl="'.base_url('tagihan').'/"; 
            var enkrip="'.$this->enkrip().'";
            $(".select2").select2({
                theme: "bootstrap input-lg"
            });
          ','embed');  
        $this->template->add_js('modules/reporttagihan.0.1.js');
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
        	'opt_mhs'=>$this->tagihdb->get_dropdown_mhs(),
 			'opt_prodi'=>$this->tarifdb->dropdown_prodi(),
            'opt_kelompok'=>$this->tarifdb->dropdown_kelompok(),
            'opt_tahun'=>$tahun,
            'view'=>'form_laporan',
            'title'=>'Laporan Tagihan',
            'subtitle'=>'Laporan Tagihan',
            'action'=>base_url('tagihan/laporan/get_laporan/pdf')
   			));	
	}
	function get_laporan($pdf=null){
		$data['end']=$this->input->post('end');
        $data['start']=$this->input->post('start');
        $data['prodi']=$this->input->post('prodi');
        $data['mhs']=$this->input->post('mhs');
        $data['tahun']=$this->input->post('tahun');
        $data['kelompok']=$this->input->post('kelompok');
        $data['semester']=$this->input->post('semester');
        $lap=$this->input->post('laporan');
        // print_r($data);
        if(!empty($lap)||$lap>0){
            switch ($lap) {
                case '1':
                    // print_r($data);
                    $judul="LAPORAN DETAIL TAGIHAN ";
                    $html=$this->get_trx($data,$judul,true);
                break;
                case '2':
                    $judul="LAPORAN REKAP TAGIHAN ";
                    $html=$this->get_trx($data,$judul);
                break;  
                case '3':
                    // print_r($data);
                    $judul="LAPORAN DETAIL TAGIHAN PER JENIS TARIF ";
                    $html=$this->get404();
                    // $html=$this->get_trx($data,$judul,true);
                break;
                case '4':
                    $judul="LAPORAN REKAP TAGIHAN PER JENIS TARIF";
                    $html=$this->get404();
                    // $html=$this->get_trx($data,$judul);
                break; 
                case '5':
                    $judul="LAPORAN DETAIL TAGIHAN PER MAHASISWA ";
                    $html=$this->get_trxmhs($data,$judul,true);
                break;
                case '6':
                    $judul="LAPORAN REKAP TAGIHAN PER MAHASISWA ";
                    $html=$this->get_trxmhs($data,$judul);
                break;
                case '7':
                    $judul="LAPORAN DETAIL TAGIHAN PER ANGKATAN ";
                    $html=$this->get404();
                
                break;
                case '8':
                    $judul="LAPORAN REKAP TAGIHAN PER ANGKATAN ";
                    $html=$this->get404();
                
                break; 
                case '9':
                    $judul="LAPORAN DETAIL TAGIHAN PER PROGRAM STUDI ";
                    $html=$this->get404();
                break;
                case '10':
                    $judul="LAPORAN REKAP TAGIHAN PER PROGRAM STUDI ";
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
            buildpdfbaru($html2,'A4','Potrait','laporan-tagihan-'.date('d-m-Y-Hms'),TRUE);
            
     
        }else{

            // $html=$this->get_trx($data);
            // $html=$datax;
            $this->output->set_output($html);
        }

	}
	
    function get404(){
        $html=$this->load->view('nodata',array(),TRUE);
        return $html;
    }
	 function enkrip(){
        return md5($this->session->userdata('lihat').":".userid()."+".date('H:m'));
        // echo $this->session->userdata('tagihanmhs');
    }
    function get_trx($datax,$judul=null,$isdetail=null){
        $this->template->set_layout('cetak');
        // print_r($datax);
        $data=$this->lapordb->getalltagihan($datax);
        
        // print_r($data);
        $html=$this->load->view('tabeltagihan',array('data'=>$data,'judul'=>$judul,'isdetail'=>$isdetail),TRUE);
        return $html;
    }
    function get_trxmhs($datax,$judul=null,$isdetail=null){
        $this->template->set_layout('cetak');
        $data=$this->lapordb->getrekappermhs($datax);
        
        // print_r($data);
        $html=$this->load->view('tabeltagihanmhs',array('data'=>$data,'judul'=>$judul,'isdetail'=>$isdetail),TRUE);
        return $html;
    }
    function get_trx_rekap($datax,$judul=null){
        $this->template->set_layout('cetak');
        $data=$this->tagihdb->getalltagihan($datax);
        $html=$this->load->view('tabel_trx_rekap',array('data'=>$data,'judul'=>$judul),TRUE);
        return $html;
    }
}

/* End of file laporan.php */
/* Location: ./ */
 ?>