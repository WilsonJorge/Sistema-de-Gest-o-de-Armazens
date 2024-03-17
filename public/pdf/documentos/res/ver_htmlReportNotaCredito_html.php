<?php
include_once "../../../API/callAPI.php";
include_once "../../../API/include.php";

$response = CallApi($URL . 'api/pagamento_factura_nota_credito/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0), $METHOD = "GET");
// echo $URL . 'api/pagamento_factura_cliente/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0);
// print_r($response);
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
    <img src="../img/fme.png" alt="" style="text-align: center; width: 30%; height:100px; margin-left: 250px;">
    <h1></h1>
    <!-- <p>Contribuinte N.º: 100469261</p> -->
    <br>
    <!-- Av. Marginal, n.567, Beach Front  -->
    <h1>Nota de Crédito N.º: <?= $response->nr_nota_credito ?? ""
                                ?> </h1>
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
                <td style="font-size: 10px;"><?= $response->data_nota ?? "" ?></td>
                <td style="font-size: 10px;">MT</td>
                <td style="font-size: 10px;"><?= $response->cliente ?? "" ?></td>
            </tr>
            <tr>
                <td colspan="4" style="height: 50px;">Através do(s) seguinte(s) meio(s), no valor total de <?= $response->totalPago ?> </td>
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
    <hr style="margin-bottom: -5px;">
    <table border="0" style="width: 100%; border-bottom: 5px;">
        <tr>
            <th style="text-align:left; font-size: 10px;">Documento</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:left; font-size: 10px;">N.º Doc.</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <th style="text-align:left; font-size: 10px;">N.º Prt.</th> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <th style="text-align:right; font-size: 10px; ">Valor Atribuído</th>
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <th style="text-align:left; font-size: 10px;"></th> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
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
        <tbody>
            <?php
            $vazio = "";
            $total = 0;
            $total_pago = 0;
            $desconto = 0;
            $pendente = 0;
            $pago = 0;
            // print_r($response->facturasPagas->totalPago);
            foreach ($response->facturasPagas as $dados) :
                // print_r($dados->totalPago);
                foreach ($dados->factura as $facturas_dados) :
                    // print_r($facturas_dados)
            ?>
                    <tr>
                        <td><?= $facturas_dados->tipo_factura ?? "Guia" ?></td>
                        <td><?= $facturas_dados->nr_factura ?></td>
                        <td style="text-align: right;"><?= number_format($dados->valor_pago, 2, ",", ".") ?></td>
                    </tr>

            <?php
                endforeach;
            endforeach;
            ?>
            <tr>
                <td colspan="8">
                    <hr style="color: black; margin-bottom: -5px;">
                </td>
            </tr>


            <!-- dados de pagamentos -->

            <!-- <tr>
                <td colspan="6" style="width: 100px;">
                    <hr style="margin-top: 5%; width: 50px; text-align: left; height:3px; color: white;">
                </td>
            </tr> -->

        </tbody>
    </table>
</body>

</html>