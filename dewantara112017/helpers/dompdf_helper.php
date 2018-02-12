<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function buildpdf($html, $filename='',$paper='A4',$orientation="landscape",$stream=TRUE) 
{
    require_once APPPATH.'third_party/dompdf/autoload.inc.php';
    // use Dompdf\Dompdf();

    $dompdf = new Dompdf\Dompdf();

    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream==true) {
        $dompdf->stream($filename.".pdf");
    } else {
        return $dompdf->output();
    }
}
?>