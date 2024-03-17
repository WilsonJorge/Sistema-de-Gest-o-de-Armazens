<?php
include_once "../../../API/callAPI.php";
include_once "../../../API/include.php";

$response = CallApi($URL . 'api/pagamento_factura_cliente/reportRecibo.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0), $METHOD = "GET");
// exit;
// echo "<pre>";
// print_r($response);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <style>
        @page {
            margin: 10px;
            font-family: Cambria, Georgia, serif;
        }

        body {
            color: black;
            font-size: small;
        }

        table {
            color: black;
        }

        p {
            color: black;
        }

        hr {
            display: block;
            height: 1px;
            border: 0;
            border-top: 1px solid black;
            margin: 1em 0;
            padding: 0;
            margin-top: 2px;
        }

        tr.banner {
            height: 192px;
            max-height: 192px;
        }
    </style>
</head>

<body>

    <!-- <?php
    echo "<pre>";
    print_r($response);
    echo "</pre>";  
    ?> -->


    <img src="../img/fme.png" alt="" style="text-align: center; width: 26%; height:100px; margin-left: 250px;">
    <h1></h1>
    <!-- <p>Contribuinte N.º: 100469261</p> -->
    <div>
    <h1 style="text-align: right;">RECIBO N.º  <?= $response[0]->nr_pagamento ?? "" ?></h1>

    <p style="text-align: left; font-size: 1em;">
    Av.Marginal-Condominio Maputo Beach Front-Loja 02
    <br>
    Nuit: 100469261 
    <br>
    Cel. +258 871944848/ +258 847876424 
    <br>
    <!-- marianomcnobre@gmail.com  -->
    <br>
    </p>
    </div>
    <!-- <h1 style="text-align: right;">RECIBO N.º  <?= $response[0]->nr_pagamento ?? "" ?></h1> -->
    <hr style="margin-bottom: -5px; color: black;">
    <hr style="height: -5px; color: black;">
    <br>
    <hr style="margin-bottom: -5px;">
    <table border="0">
        <tr>
            <th style="text-align:left; font-size: 10px;">V/N.º Contrib</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Data Doc.</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Moeda</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Entidade</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
        </tr>
        <tbody>
            <tr>
                <td></td>
                <td style="font-size: 10px;"><?= $response[0]->data_criacao ?? "" ?></td>
                <td style="font-size: 10px;">MT</td>
                <td style="font-size: 10px;"><?= $response[0]->cliente ?? "" ?></td>
            </tr>
            <tr>
                <td colspan="4" style="height: 50px;">Através do(s) seguinte(s) meio(s), no valor total de 
                <?php
                     $total = 0;

                    foreach ($response as $dados) :
                        $total += $dados->totalPago; 
                    endforeach;

                    echo number_format($total, 2, ",", ".");
                
                ?> 
                

                </td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-bottom: -5px;">
    <table border="0" style="width: 100%;">
        <tr>
            <th style="text-align:left; font-size: 10px;">Movimento</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Número</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Descrição</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:left; font-size: 10px;">Balcão</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
            <th style="text-align:right; font-size: 10px;">Valor</th>
            <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
        </tr>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
            <tr>
                <td colspan="4" style="height: 50px;">Recebemos de V.Exas. para pagamento do(s) seguinte(s) documento(s): </td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-bottom: -5px;">
    <table border="0" style="width: 100%; border-bottom: 5px;">
        <tr>
            <th style="text-align:left; font-size: 10px; width: 17%">Documento:</th>
            <th style="text-align:left; font-size: 10px; width: 17%">N.º Factura</th>
            <th style="text-align:right; font-size: 10px; width: 17%">Valor Documento</th>
            <th style="text-align:right; font-size: 10px; width: 17%">Valor Pago Anterior</th>
            <th style="text-align:right; font-size: 10px; width: 17%">Valor Pago</th>
            <th style="font-size: 10px; text-align:right; width: 17%">Remanescente</th>
        </tr>
        <tr>
            <td colspan="6">
                <hr style="color: black; margin-bottom: -5px;">
            </td>
        </tr>

        <tbody>
            <?php
            $total = 0;
            $total_pago = 0;
            $desconto = 0;
            $pendente = 0;
            $pago = 0;
            $diferenca = 0;
            $total_pago_anterior = 0;
            foreach ($response as $dados) :

            ?>
                    <tr>
                        <td>FA</td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        <td><?= $dados->numero_factura ?></td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        <td style="text-align: right;"><?= number_format($dados->valor, 2, ",", ".") ?></td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        <td style="text-align: right;"><?= number_format($dados->totalPagoAnterior, 2, ",", ".") ?></td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        <td style="text-align: right;"><?= number_format($dados->totalPago, 2, ",", ".") ?></td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        <td style="text-align: right;"><?= number_format($dados->valor - ($dados->totalPagoAnterior + $dados->totalPago), 2, ",", ".") ?></td>
                        <hr style="margin-bottom: -5px; width: 100%; text-align:left;">
                        
                    </tr>

            <?php
                    $total += $dados->valor;
                    $total_pago += $dados->totalPago;
                    // $pendente += (double)$dados->valor - (double)$dados->totalPago; 
                    $pendente += (double)$dados->valor - ((double)$dados->totalPagoAnterior + (double)$dados->totalPago); 
                    $pago += $dados->totalPago;
                    $total_pago_anterior += $dados->totalPagoAnterior;
            endforeach;
            ?>
            <tr>

                <td><strong style="font-weight: bold;"> </strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold; text-align: right; "><b>Total</b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($total, 2, ",", ".") ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($total_pago_anterior, 2, ",", ".") ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($total_pago, 2, ",", ".") ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($pendente, 2, ",", ".") ?></b></strong></td>
            </tr>
            <tr>
                <td colspan="3" style="width: 50px;">
                    <hr style="margin-top: 40px; width: 50px; text-align: left; height:3px; color: #000;">
                </td>
            </tr>
            <tr>
                <td colspan="2"><b style="font-weight: bold;">Total Recebido (MT)</b></td>
                <td style="text-align: right; font-weight: bold;"><?= number_format($pago, 2, ",", ".") ?? "" ?></td>
            </tr>
            <tr>
                <td colspan="15">
                    <hr style="margin-top: 15%; width: 50px; text-align: left; height:3px; color: white;">
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>