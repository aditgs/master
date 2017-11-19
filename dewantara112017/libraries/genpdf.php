<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."third_party/dompdf-0.8.0/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;
class genpdf {
  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
 


    $options = new Options();
    // $dompdf = new Dompdf($options);
    // $options = new Dompdf\Options();
    $options->setIsPhpEnabled(true);
    $options->set(array(
        // 'pdfBackend'=>'PDFLib',
        'pdfBackend'=>'CPDF',
        'defaultMediaType'=>'print',
        'defaultPaperSize'=>$paper,
        // 'defaultPaperSize'=>'A4',
        'defaultFont'=>'Arial',
        // 'enable_html5_parser'=>true,
        'enable_font_subsetting'=>true

    ));
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->setBasePath(assets_url('css/bootstrap.min.css'));
    $dompdf->render();
    $canvas = $dompdf->get_canvas();

  

            $canvas->page_text(10, 815, " MURIA PS", 'Open Sans', 10, array(0, 0, 0));

            $canvas->page_text(530, 815, " Hal. {PAGE_NUM} / {PAGE_COUNT}", 'Open Sans', 10, array(0, 0, 0));

            $canvas->line(10, 810, 585, 810, array(0,0,0), 1);
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}