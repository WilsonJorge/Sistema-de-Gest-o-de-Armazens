<?php
include_once "../../../API/callAPI.php";
include_once "../../../API/include.php";

$response = CallApi($URL . 'api/pagamento/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0), $METHOD = "GET");
// echo $URL . 'api/pagamento/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0);
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
    <!-- <img src="../../img/inatter1.png" alt=""> -->
    <!-- <h6>CRYSTALBOX</h6> -->
    <img src="../img/fme.png" alt="" style="text-align: center; width: 150px; margin-left: 250px;">
    <h1></h1>
    <!-- <p>Contribuinte N.º: 100469261</p> -->
    <br>
    <!-- Av. Marginal, n.567, Beach Front  -->
    <h1> Nota de Pagamento N.º: <?= $response->nr_pagamento ?? "" ?></h1>
    <!--  -->
    <hr style="margin-bottom: -5px; color: black;">
    <hr style="height: 5px; color: black;">
    <br><br><br>
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
                <td style="font-size: 10px;"><?= $response->data_criacao ?? "" ?></td>
                <td style="font-size: 10px;">MT</td>
                <td style="font-size: 10px;"><?= $response->descricaoempresa ?? "" ?></td>
            </tr>
            <tr>
                <td colspan="4" style="height: 50px;">Através do(s) seguinte(s) meio(s), no valor total de <?= !empty($response->totalPago) ? number_format($response->totalPago, 2, ",", ".") : "" ?> </td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-bottom: -5px;">
    <table border="0" style="width: 90%;">
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
                <td colspan="4" style="height: 50px;">Procedemos ao pagamento do(s) seguinte(s) documento(s): </td>
            </tr>
        </tbody>
    </table>
    <hr style="margin-bottom: 5px;">
    <table border="0" style="width: 100%; border-bottom: 5px;">
        <tr>
            <th style="text-align:left; font-size: 10px;">Documento</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:left; font-size: 10px;">N.º Doc.</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <th style="text-align:left; font-size: 10px;">N.º Prt.</th> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:right; font-size: 10px; ">Valor Documento</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <th style="text-align:left; font-size: 10px;"></th> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:right; font-size: 10px; ">Valor Atribuído</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:right; font-size: 10px; ">Valor Desconto</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="font-size: 10px; text-align:right;">Valor Pendente</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:right; margin-left: -100px;"> -->
        </tr>
        <tr>
            <td colspan="8">
                <hr style="color: black; margin-bottom: -5px;">
            </td>
        </tr>
        <!-- <tr>
            <td style="background-color: white;">
                <hr style="margin-top: 2px; margin-bottom: 1px; width: 100%;">
            </td>
        </tr> -->
        <tbody style="width: 100%;">
            <?php
            $vazio = "";
            $total = 0;
            $total_pago = 0;
            $desconto = 0;
            $pendente = 0;
            $pago = 0;
            foreach ($response->facturas as $dados) :
                foreach ($dados->facturas as $facturas_dados) :
            ?>
                    <tr>
                        <td style="text-align:left;"><?= $facturas_dados->tipo_factura ?? "" ?></td>
                        <td style="text-align:left;"><?= $dados->nr_factura ?></td>
                        <td style="text-align: right;"><?= number_format($dados->valor, 2, ",", ".") ?? "0,00" ?></td>
                        <!-- <td style="text-align: right;"><?= number_format($facturas_dados->tipo_factura == "VNC" ? -$dados->total : $dados->total, 2, ",", ".") ?? "0,00" ?></td> -->
                        <td style="text-align: right;"><?= number_format($dados->valor < 0 ? -$dados->total : $dados->total, 2, ",", ".") ?? "0,00" ?></td>
                        <td style="text-align: right;"><?= number_format($dados->desconto, 2, ",", ".") ?? "0,00" ?> </td>
                        <td style="text-align: right; margin-top: 100%;"><?= $dados->valor < 0 ? "0,00" : number_format(($dados->total < 0 ? 0 :$dados->valor - $dados->total)-$dados->pago_anterior, 2, ",", ".") ?></td>
                    </tr>
<!-- ($dados->valor - $dados->total)-$dados->pago_anterior < 0 ? ($dados->valor - $dados->total)-$dados->pago_anterior :  -->
            <?php
                    $total += $dados->valor;
                    //$total_pago += $facturas_dados->tipo_factura=="VNC" ? -$dados->remanescente : $dados->remanescente;
                    $total_pago += $dados->total;
                    $desconto += $dados->desconto;
                    $pendente += $dados->valor < 0 ? 0 : ($dados->total < 0 ? 0 : $dados->valor - $dados->total)-$dados->pago_anterior;
                    //$pago += $facturas_dados->tipo_factura=="VNC" ? -$dados->remanescente : $dados->remanescente - $dados->desconto;
                    $pago += $dados->total - $dados->desconto;
                endforeach;
            endforeach;
            ?>
            <tr>
                <td colspan="8">
                    <hr style="color: black; margin-bottom: -5px;">
                </td>
            </tr>
            <!-- <tr>
                <td colspan="15" style="background-color: white;">
                    <hr style="margin-top: 2px; margin-bottom: 1px; background-color: red;">
                </td>
            </tr> -->
            <tr>
                <td><strong style="font-weight: bold;"> </strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold; text-align: right; "><b>Total</b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($total, 2, ",", ".") ?? "0,00" ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($total_pago, 2, ",", ".") ?? "0,00" ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($desconto, 2, ",", ".") ?? "0,00" ?></b></strong></td>
                <td style="text-align:right;"><strong style="font-weight: bold;"><b><?= number_format($pendente, 2, ",", ".") ?? "0,00" ?></b></strong></td>
            </tr>
            <tr>
                <td colspan="8">
                    <hr style="color: black; margin-bottom: -5px;">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width: 50px;">
                    <hr style="margin-top: 40px; width: 50px; text-align: left; height:3px; color: #000;">
                </td>
            </tr>
            <tr>
                <td colspan="2"><b style="font-weight: bold;">TOTAL</b></td>
                <td style="text-align: right; font-weight: bold;"><?= number_format($pago, 2, ",", ".") ?? "" ?> MT</td>
            </tr>
            <tr>
                <td colspan="15">
                    <hr style="margin-top: 5%; width: 50px; text-align: left; height:3px; color: white;">
                </td>
            </tr>
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <?php $contar = 1;
                foreach ($response->dadosFactura->data as $item) :
                    if ($contar == 3) { ?>

                    <?php
                    }
                    ?>
                    <td>
                        <table style="width: 100%;">
                            <tr>
                                <th style="text-align:left; width:50%;">Pagamento Por:</th>
                                <td><?= $item->descricao ?? "" ?></td>
                            </tr>
                            <tr>
                                <th style="text-align:left; width:50%;">Banco:</th>
                                <td><?= $item->banco ?? "" ?></td>
                            </tr>
                            <tr>
                                <th style="text-align:left; width:50%;">Número da Operação:</th>
                                <td><?= $item->referencia ?? "" ?></td>
                            </tr>
                            <tr>
                                <th style="text-align:left; width:50%;">Valor:</th>
                                <td><?= number_format($item->valor, 2, ',', '.') . " MT" ?? "" ?></td>
                            </tr>

                        </table>
                    </td>

                <?php
                    $contar++;
                endforeach;
                ?>
            </tr>
            <tr>
                <td colspan="8"><span style="font-weight: bold;">Data do recibo:</span> <?= $response->data_recibo ?? "" ?></td>
            </tr>
            <tr>
                <td colspan="8"><span style="font-weight: bold;">Recibo Nr:</span> <?= $response->nr_recibo ?? "" ?></td>
            </tr>

            <tr>
                <td colspan="6" style="width: 100px;">
                    <hr style="margin-top: 5%; width: 50px; text-align: left; height:3px; color: white;">
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>