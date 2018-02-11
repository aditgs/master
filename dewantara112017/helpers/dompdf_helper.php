<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function buildpdf($html, $filename='',$paper='A4',$orientation="portrait",$stream=TRUE) 
{
    require_once APPPATH.'third_party/dompdf/autoload.inc.php';
    // use Dompdf\Dompdf();

    $dompdf = new Dompdf\Dompdf();
    $options = new Dompdf\Options();

    $options->setIsPhpEnabled(true);
    $options->set(array(
        'pdfBackend'=>'PDFLib',
        'defaultMediaType'=>'print',
        'defaultPaperSize'=>$paper,
        'defaultFont'=>'Helvetica',
        'enable_html5_parser'=>true,
        'enable_font_subsetting'=>true
    ));
    if($paper=='A4'){
        if($orientation=='portrait'){
            $dompdf->set_paper(array(0,0,595,842));
        }else{
            $dompdf->set_paper(array(0,0,842,595));
        }
    }elseif($paper=='A5'){
        if($orientation=='portrait'){
            $dompdf->set_paper(array(0,0,420,595));
        }elseif($orientation=='landscape'){
            $dompdf->set_paper(array(0,0,595,420));
        }
    }elseif($paper=='A6'){
        if($orientation=='portrait'){
            $dompdf->set_paper(array(0,0,298,420));
        }elseif($orientation=='landscape'){
            $dompdf->set_paper(array(0,0,420,298));
        }
    }
    // $dompdf->set_option( 'dpi' , '300' );
    $dompdf->load_html($html);
    $dompdf->paper=$paper;
    $dompdf->orientation=$orientation;
    // $dompdf->setPaper('A5', 'landscape');
    $dompdf->render();
    if ($stream==true) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
function cobapdf($html,$filename='',$stream=TRUE){
    require_once APPPATH.'third_party/dompdf/autoload.inc.php';
	// use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf\Dompdf();
// $content = file_get_contents($html,true);

$dompdf->loadHtml($html);

$dompdf->set_option('fontHeightRatio', 0.6);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();
    if ($stream==true) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>