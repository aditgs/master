<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pdftest extends MX_Controller {

	function __construct() {
		parent::__construct();
        
	}
	
	function index(){
		$data['performance']=array(
				array('name'=>'abc','count'=>1231),
				array('name'=>'abc123','count'=>12),
				array('name'=>'abc1','count'=>123),
				array('name'=>'abc2','count'=>312),
				array('name'=>'abc3','count'=>122),
			);
		
		$html='<div class="jumbotron">
			<div class="container">
				<h1>Hello, world!</h1>
				<p>Contents ...</p>
				<p>
					<a class="btn btn-primary btn-lg">Learn more</a>
				</p>
			</div>
		</div>';
		
		$pdf_filename  = 'report.pdf';
		// $this->template->load_view('sample_view',$data,TRUE);
		$this->output->set_output($html);
		$this->load->library('dompdf');
		$this->load->helper('file');
		$this->dompdf->buildpdf($html, $pdf_filename, true);
	}
	
	
	function pdf()
	{
	     $this->load->helper(array('dompdf', 'file'));
	     // page info here, db calls, etc.    
	     $data['performance']=array(
				array('name'=>'abc','count'=>1231),
				array('name'=>'abc123','count'=>12),
				array('name'=>'abc1','count'=>123),
				array('name'=>'abc2','count'=>312),
				array('name'=>'abc3','count'=>122),
			); 
	     $html = $this->load->view('sample_view', $data, true);
	     buildpdf($html, 'filename-'.date('d-m-Y H:m:s'));
	     // or
	     // $data = buildpdf($html, '', false);
	     // write_file('name', $data);
	     //if you want to write it to disk and/or send it as an attachment    
	}

}
?>

