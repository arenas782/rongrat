<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Al requerir el autoload, cargamos todo lo necesario para trabajar
require_once APPPATH."/third_party/dompdf/autoload.inc.php";
use Dompdf\Dompdf;
class Pdfgenerator {
    public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();if ($stream) {        // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    }else 
    {
      return $dompdf->output();
    }
  }
}
?>