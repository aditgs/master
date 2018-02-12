<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function buildpdf($html, $filename='',$paper='A4',$orientation="landscape",$stream=TRUE) 
{
    require_once APPPATH.'third_party/dompdf/autoload.inc.php';
    // use Dompdf\Dompdf();
    $options = new Dompdf\Options();
    // $fontMetrics = new Dompdf\FontMetrics();
    // $options->setIsPhpEnabled(true);
    $options->set(array(
        'pdfBackend'=>'PDFLib',
        'defaultMediaType'=>'screen',
        // 'defaultPaperSize'=>'A4',
        'defaultFont'=>'Helvetica',
        'enable_html5_parser'=>true,
        'enable_font_subsetting'=>true
    ));
    $dompdf = new Dompdf\Dompdf($options);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->setBasePath(assets_url('css/bootstrap.min.css'));
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream==true) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>