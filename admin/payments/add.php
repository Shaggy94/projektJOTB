<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

if (isset($_POST['nrKBen'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `platnosci` SET `NumerKontaBeneficjenta`=:nrKBen,'
                . '`NumerKontaPlatnika`=:nrKPla,'
                . '`KwotaBrutto`=:kwBrut,'
                . '`Waluta`=:waluta,'
                . '`DataUdokumentowania`=:dataUdok,'
                . '`DataOtrzymania`=:dataOtrz,'
                . '`NumerBeneficjenta`=:nrBen,'
                . '`NumerPlatnika`=:nrPlat'
                . ' WHERE id=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO `platnosci` VALUES (NULL,:nrKBen, :nrKPla,:kwBrut, :waluta,:dataUdok,'
                . ':dataOtrz,:nrBen,:nrPlat)');
    }
    $sth->bindParam(':nrKBen', $_POST['nrKBen']);
    $sth->bindParam(':nrKPla', $_POST['nrKPla']);
    $sth->bindParam(':kwBrut', $_POST['kwBrut']);
    $sth->bindParam(':waluta', $_POST['waluta']);
    $sth->bindParam(':dataUdok', $_POST['dataUdok']);
    $sth->bindParam(':dataOtrz', $_POST['dataOtrz']);
    $sth->bindParam(':nrBen', $_POST['nrBen']);
    $sth->bindParam(':nrPlat', $_POST['nrPlat']);
    $sth->execute();

    header('location: ../../paneladmina.php#platnosci');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM platnosci WHERE id=:id');
    $sth->bindParam(':id', $idGet);
    $sth->execute();

    $result = $sth->fetch();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProjektJOTB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>

    </head>
    <body>
        <div class="container-fluid">
            <?php
            include $basicPath.'navbar.php';
            ?>
            <form method="POST" action="add.php">
                <?php
                if ($idGet > 0) {
                    echo '<input type="hidden" name="id" value="' . $idGet . '">';
                }
                ?>
                <table>
                    <tr>
                        <td>Numer Konta Beneficjenta: </td>
                        <td><input type="text" name="nrKBen" <?php
                            if (isset($result['NumerKontaBeneficjenta'])) {
                                echo 'value="' . $result['NumerKontaBeneficjenta'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Numer Konta Platnika: </td>
                        <td><input type="text" name="nrKPla" <?php
                            if (isset($result['NumerKontaPlatnika'])) {
                                echo 'value="' . $result['NumerKontaPlatnika'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Kwota Brutto: </td>
                        <td><input type="text" name="kwBrut" <?php
                            if (isset($result['KwotaBrutto'])) {
                                echo 'value="' . $result['KwotaBrutto'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Waluta: </td>
                        <td><input type="text" name="waluta" <?php
                            if (isset($result['Waluta'])) {
                                echo 'value="' . $result['Waluta'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Data Udokumentowania: </td>
                        <td><input type="date" name="dataUdok" <?php
                            if (isset($result['DataUdokumentowania'])) {
                                echo 'value="' . $result['DataUdokumentowania'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Data Otrzymania: </td>
                        <td><input type="date" name="dataOtrz" <?php
                            if (isset($result['DataOtrzymania'])) {
                                echo 'value="' . $result['DataOtrzymania'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Numer Beneficjenta: </td>
                        <td><input type="text" name="nrBen" <?php
                            if (isset($result['NumerBeneficjenta'])) {
                                echo 'value="' . $result['NumerBeneficjenta'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Numer Platnika: </td>
                        <td><input type="text" name="nrPlat" <?php
                            if (isset($result['NumerPlatnika'])) {
                                echo 'value="' . $result['NumerPlatnika'] . '"';
                            }
                            ?>/></td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-success" value="Zapisz"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

