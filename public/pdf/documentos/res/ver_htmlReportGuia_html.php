<?php
include_once "../../../API/callAPI.php";
include_once "../../../API/include.php";
$id =  isset($_GET['id']) ? $_GET['id'] : 0;
$factura = $_GET["factura"];
$response = CallApi($URL . "api/factura_global/read_one.php?id=$id&id_factura_cliente=$factura", $METHOD = "GET");

// $response = CallApi($URL . 'api/pagamento_factura_cliente/read_one.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0), $METHOD = "GET");
// echo $URL . "api/factura_global/read_one.php?id=$id&id_factura_cliente=$factura";
// exit;
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
    <!-- <h1></h1> -->
    <!-- <p>Contribuinte N.º: 100469261</p> -->
    <br>
    <!-- Av. Marginal, n.567, Beach Front  -->
    <h1>Detalhes Da Guia</h1>
    <hr style="margin-bottom: -5px; color: black;">
    <hr style="height: 5px; color: black;">
    <br><br><br>
    <h2>Dados da Seguradora</h2>
    <hr style="margin-bottom: -5px;">

    <table border="1" style="width: 100%;">
        <tr>
            <th>Seguradora</th>
            <th>Número</th>
            <th>Data</th>

        </tr>
        <tr>
            <td><?= $response->seguradora ?></td>

            <td><?= $response->numero ?></td>
            <td><?= $response->data ?></td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
        <!-- <tr>
            <th colspan="3">Guias</th>
        </tr> -->
    </table>
    <br>
    <br>
    <h2>Dados da Guia</h2><br>
    <?php foreach ($response->fetchGuias->data as $value) : ?>

        <table class="" border="0" style="width: 100%; ">
            <tr>
                <th style="text-align:left; font-size: medium;"> Número da Guia</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Nome do Segurado</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Número de Membro</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <!-- <th style="text-align:left; font-size: medium;">Entidade</th> -->
                <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            </tr>
            <tbody style="width: 100%;background: red;">
                <tr>
                    <!-- <td></td> -->
                    <td style="font-size: medium;text-align:left;"><?= $value->nr_factura ?? "" ?></td>
                    <td style="font-size: medium;"><?= $value->nome_segurado ?? "" ?></td>
                    <td style="font-size: medium;"><?= $value->nr_membro ?? "" ?></td>
                </tr>

            </tbody>
        </table>
        <br><br>
        <table border="0" style="width: 100%; ">
            <tr>
                <th style="text-align:left; font-size: medium;">Codigo de Autorização</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;"> Nome do Técnico</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Farmácia</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <!-- <th style="text-align:left; font-size: medium;">Entidade</th> -->
                <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            </tr>
            <tbody>
                <tr>
                    <!-- <td></td> -->
                    <td style="font-size: medium;"><?= $value->codigo_autorizacao ?? "" ?></td>
                    <td style="font-size: medium;"><?= $value->nome_do_tecnico ?? "" ?></td>
                    <td style="font-size: medium;"><?= $value->farmacia ?? "" ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table border="0" style="width: 100%; ">
            <tr>
                <th style="text-align:left; font-size: medium;">Data</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Valor</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Valor Pago</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <!-- <th style="text-align:left; font-size: medium;">Entidade</th> -->
                <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            </tr>
            <tbody>
                <tr>
                    <!-- <td></td> -->
                    <td style="font-size: medium;"><?= $value->data ?? "" ?></td>
                    <td style="font-size: medium;"><?= number_format($value->valor, 2, ",", ".") ?? "" ?></td>
                    <td style="font-size: medium;"><?=number_format($value->dadosFacturaGlobal, 2, ",", ".")  ?? "" ?></td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table border="0" style="width: 100%; ">
            <tr>
                <!-- <th style="text-align:left; font-size: medium;">Nota de Crédito</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
                <th style="text-align:left; font-size: medium;">Remanescente</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Estado</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <!-- <th style="text-align:left; font-size: medium;">Entidade</th> -->
                <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            </tr>
            <tbody>
                <tr>
                    <!-- <td></td> -->
                    <!-- <td style="font-size: medium;"><?= $value->nota_credito ?? "" ?></td> -->
                    <td style="font-size: medium;"><?= number_format($value->saldo - $value->nota_credito, 2, ",", ".") ?? "" ?></td>
                    <td style="font-size: medium;">
                        <?php if ($value->saldo - $value->nota_credito == $value->valor) {
                            echo "Pendente";
                        } elseif ($value->saldo - $value->nota_credito <= 0) {
                            echo "Pago";
                        } elseif ($value->saldo - $value->nota_credito <= $value->valor && $value->saldo - $value->nota_credito > 0) {
                            echo "Parcial";
                        } ?></td>
                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
    <br>
    <h2>Nota de Crédito</h2>
    <?php foreach ($response->fetchGuias->data as $value) : ?>
        <table border="0" style="width: 100%; ">
            <tr>
                <th style="text-align:left; font-size: medium;">Nota de Crédito</th>
                <hr style="margin-bottom: -5px; width: 20%; text-align:left;">
                <!-- <th style="text-align:left; font-size: medium;">Remanescente</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;">
                <th style="text-align:left; font-size: medium;">Estado</th>
                <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
                <!-- <th style="text-align:left; font-size: medium;">Entidade</th> -->
                <!-- <hr style="margin-bottom: -5px; width: 90%; text-align:left;"> -->
            </tr>
            <tbody>
                <tr>
                    <!-- <td></td> -->
                    <td style="font-size: medium;"><?= $value->nota_credito == 0 ? print("Sem nota de credito!") : $value->nota_credito ?></td>

                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
</body>

</html>