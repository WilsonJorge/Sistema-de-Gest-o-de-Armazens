<?php
include_once "../../../API/callAPI.php";
include_once "../../../API/include.php";

$response = CallApi($URL . 'api/factura_global/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0), $METHOD = "GET");
// print_r($URL . 'api/factura_global/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0));
// exit;
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
    <img src="../img/fme.png" alt="" style="text-align: center; width: 30%; height:100px; margin-left: 250px;">
    <h1>Factura Global Nº: <?= $response->numero
                            ?></h1>
    <br>

    <table border="1" style="width: 100%;">
        <tr>
            <th>Seguradora</th>
            <th>Data</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td><?= $response->seguradora ?></td>
            <td><?= $response->data ?></td>
            <td style="text-align:right;"><?= number_format($response->valor, 2, ",", ".") ?></td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="3">Guias</th>
        </tr>
    </table>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Número da Guia</th>
            <th>Nome do Segurado</th>
            <th>Número de Membro</th>
            <th>Codigo de Autorização</th>
            <th>Nome do Tecnico</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Valor Pago</th>
            <th>Nota de Crédito</th>
            <th>Remanescente</th>

        </tr>
        <tbody>
            <?php $count = 1;
            $total = 0;
            $saldo = 0;
            $nota = 0;
            $pago = 0;
            if (!empty($response->fetchGuias->data)) {
                if (count($response->fetchGuias->data) > 0) :
                    foreach ($response->fetchGuias->data as $value) :
            ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $value->nr_factura ?></td>
                            <td><?= $value->nome_segurado ?></td>
                            <td><?= $value->nr_membro ?></td>
                            <td><?= $value->codigo_autorizacao ?></td>
                            <td><?= $value->nome_do_tecnico ?></td>
                            <td><?= $value->data ?></td>
                            <td style="text-align:right;"><?= number_format($value->valor, 2, ",", ".") ?></td>
                            <td style="text-align:right;"><?= number_format($value->dadosFacturaGlobal, 2, ",", ".") ?></td>
                            <td style="text-align:right;"><?= number_format($value->nota_credito, 2, ",", ".") ?></td>
                            <td style="text-align:right;"><?= number_format($value->saldo - $value->nota_credito, 2, ",", ".") ?></td>

                        </tr>
            <?php
                        $total += $value->valor;
                        $saldo += $value->saldo;
                        $nota += $value->nota_credito;
                        $pago += $value->dadosFacturaGlobal;
                    endforeach;
                endif;
            };
            ?>
        </tbody>
        <tfoot style="background-color: white;">
            <tr>
                <td colspan="7" style="text-align:right; font-weight: bold; font-size: 15px;">Total:</td>
                <td style="font-weight: bold; font-size: 15px; text-align:right;"><?= number_format($total, 2, ",", ".") ?></td>
                <td style="font-weight: bold; font-size: 15px; text-align:right;"><?= number_format($pago, 2, ",", ".") ?></td>
                <td style="font-weight: bold; font-size: 15px; text-align:right;"><?= number_format($nota, 2, ",", ".") ?></td>
                <td style="font-weight: bold; font-size: 15px; text-align:right;"><?= number_format($saldo - $nota, 2, ",", ".") ?></td>

            </tr>
        </tfoot>
    </table>
</body>

</html>