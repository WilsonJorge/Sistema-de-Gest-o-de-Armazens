<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '6144M');
// session_start();
require_once '../vendor/autoload.php';
// require_once('../html2pdf.class.php');
// require_once('../mpdf/mpdf.php');
// get the HTML
ob_start();
include('./res/ver_htmlConteudo_html.php');
$content = ob_get_clean();
$title = isset($_SESSION['MM_nomeSgr'] ) ? $_SESSION['MM_nomeSgr'] : "";
// init HTML2PDF
$html2pdf   = new \Mpdf\Mpdf();
$html2pdf->showImageErrors = true;

// $html2pdf   = new mPDF('P', 'A4');
//new mPDF('utf-8', array(190,236));
// display the full page
// $html2pdf->cacheTables = true;
// $html2pdf->simpleTables=true;
// $html2pdf->packTableData=true;
$html2pdf->SetDisplayMode('fullpage');
$html2pdf->AddPage();
$html2pdf->SetHTMLFooter("<small><div align='botton'><label style='text-align=left' class='h6'>&copy; Copyright <strong>Academia, Consultoria e Serviços Universo, E.I. (ACSUN)</strong></label></div> <div style='text-align: right'>{PAGENO} of {nbpg}</div></small>");
// <div align='right'>{PAGENO}</div></small>");
$html2pdf->SetHTMLHeader("<small><div align='botton'><label style='text-align=left' class='h6'><strong>Data da impressão: </strong>".date("d/m/Y H:i:s")."</div></small>
    <div align='botton'><label style='text-align=left' class='h6'><strong> Usuário: </strong>".$title."</div>");
// convert
$html2pdf->writeHTML($content);
// send the PDF
$html2pdf->Output('Impressao.pdf', 'I');
