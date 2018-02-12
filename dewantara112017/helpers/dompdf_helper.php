<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function buildpdf($html, $filename='',$paper='A4',$orientation="landscape",$stream=TRUE) 
{
    require_once APPPATH.'third_party/dompdf/autoload.inc.php';
    // use Dompdf\Dompdf();
    $options = new Dompdf\Options();
    // $fontMetrics = new Dompdf\FontMetrics();
    $options->setIsPhpEnabled(true);
    $options->set(array(
        'pdfBackend'=>'PDFLib',
        'defaultMediaType'=>'screen',
        // 'defaultPaperSize'=>'A4',
        'defaultFont'=>'Helvetica',
        'enable_html5_parser'=>true,
        'enable_font_subsetting'=>true,
        'isRemoteEnabled'=>TRUE
    ));
    $dompdf = new Dompdf\Dompdf($options);
    if($paper=='A4'){
        if($orientation=='portrait'){
            $dompdf->set_paper(array(0,0,595,842));
        }else{
            // $dompdf->setPaper('A5','landscape');
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
    $dompdf->setPaper($paper, $orientation);
    // $dompdf->setBasePath(assets_url('css/bootstrap.min.css'));
    // $dompdf->setBasePath(assets_url('images/logo.png'));
    $image = assets_url('images/logo.png');
    $canvas = $dompdf->get_canvas(); 
    $canvas->image($image, 10, 10   , 50, 50);
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream==true) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
    unset($html);
    unset($dompdf); 
}

?>