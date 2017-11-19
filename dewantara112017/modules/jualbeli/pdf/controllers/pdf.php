<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function index() {	
		// Load all views as normal
		$data['performance']=array(
				array('name'=>'abc','count'=>1231),
				array('name'=>'abc123','count'=>12),
				array('name'=>'abc1','count'=>123),
				array('name'=>'abc2','count'=>312),
				array('name'=>'abc3','count'=>122),
			);
		$out=$this->load->view('sample_view',$data,true);
		// Get output html
		/*$html = $this->output->get_output($out);
		
		// Load library
		$this->load->library('dompdf');
		$this->dompdf->buildpdf($html, 'welcome1.pdf', true);

		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf");*/
		
	}
	function viewini(){
		$data['performance']=array(
				array('name'=>'abc','count'=>1231),
				array('name'=>'abc123','count'=>12),
				array('name'=>'abc1','count'=>123),
				array('name'=>'abc2','count'=>312),
				array('name'=>'abc3','count'=>122),
			);
		$this->load->view('sample_view',$data,true);
	}
}
