<?php

/**
 * Created by PhpStorm.
 * User: Manacaze
 * Date: 1/2/2018
 * Time: 9:50 PM
 */
// @session_start();
//    require_once('../html2pdf.class.php');
require_once '../vendor/autoload.php';
//	require_once('../html2pdf.class.php');
////	require_once('../mpdf/mpdf.php');
//    require_once '../vendor/autoload.php';

// get the HTML
ob_start();
include('./res/ver_htmlReportFacturaGlobal_html.php');
$content = ob_get_clean();
$title = "";
// init HTML2PDF
$Object = new DateTime();
$Object->setTimezone(new DateTimeZone('Africa/Maputo'));
$DateAndTime = $Object->format("d-m-Y h:i:s a");

// $DateAndTime = date('d/m/Y H:i:s a');

$html2pdf = new \Mpdf\Mpdf();
// $html2pdf->showImageErrors = true;
// display the full page
// $html2pdf->SetDisplayMode('fullpage');

$html2pdf->AddPage();
$html2pdf->SetHTMLFooter('
<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Academia, Consultoria & Serviços Universo - ACSUN <img src="../img/logo.png" alt="" style="width: 30px; height: 30px; text-align: left; margin-top: 200px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'O');
$html2pdf->SetHTMLFooter('<small><div><label style="text-align=left; font-weight: bold;" class="h6">&copy; Copyright <strong style="font-weight: bold;">Academia, Consultoria & Serviços Universo - ACSUN <img src="../img/logo.png" alt="" style="width: 30px; height: 30px; text-align: left; margin-top: 200px; "> </strong></label></div> <div style="text-align: right">{PAGENO} of {nbpg}</div></small>', 'E');
// convert
// convert
$html2pdf->writeHTML($content);
// send the PDF
$html2pdf->Output('Invoice.pdf', 'I');
