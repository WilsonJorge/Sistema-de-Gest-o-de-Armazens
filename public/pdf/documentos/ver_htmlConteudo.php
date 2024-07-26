<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '6144M');


require_once '../vendor/autoload.php';

// get the HTML
//Passar o html a variavel content
ob_start();
include('./res/ver_htmlConteudo_html.php');
$content = ob_get_clean();


$title = isset($_SESSION['user'] ) ? $_SESSION['user'] : "";

// init HTML2PDF
$html2pdf   = new \Mpdf\Mpdf();


$DateAndTime = date('d/m/Y');
$html2pdf = new \Mpdf\Mpdf();
$html2pdf->showImageErrors = true;
// display the full page
$html2pdf->SetDisplayMode('fullpage');
$html2pdf->AddPage();

$html2pdf->SetHTMLFooter('
<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Universidade Pedagógica de Maputo, UPM & Adelson Saguate </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'O');
// convert
$html2pdf->writeHTML($content);
// send the PDF
$html2pdf->Output("gestao_estacionamento{$DateAndTime}.pdf", 'I');
