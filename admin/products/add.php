<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

if (isset($_POST['nazwa'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `produkty` SET `Nazwa`=:nazwa,'
                . '`VAT`=:vat,'
                . '`CenaNetto`=:cnNetto,'
                . '`Opis`=:opis,'
                . '`IDDostawcy`=:idDost'
                . ' WHERE id=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO `produkty` VALUES (NULL, :nazwa, :vat, :cnNetto, :opis, :idDost)');
    }
    $sth->bindParam(':nazwa', $_POST['nazwa']);
    $sth->bindParam(':vat', $_POST['vat']);
    $sth->bindParam(':cnNetto', $_POST['cnNetto']);
    $sth->bindParam(':opis', $_POST['opis']);
    $sth->bindParam(':idDost', $_POST['idDost']);
    $sth->execute();

    header('location: ../../paneladmina.php#produkty');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM produkty WHERE id=:id');
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
                        <td>Nazwa: </td>
                        <td><input type="text" name="nazwa" <?php
                            if (isset($result['Nazwa'])) {
                                echo 'value="' . $result['Nazwa'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>VAT: </td>
                        <td><input type="number" name="vat" <?php
                            if (isset($result['VAT'])) {
                                echo 'value="' . $result['VAT'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Cena Netto: </td>
                        <td><input type="number" name="cnNetto" <?php
                            if (isset($result['CenaNetto'])) {
                                echo 'value="' . $result['CenaNetto'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Opis: </td>
                        <td><input type="text" name="opis" <?php
                            if (isset($result['Opis'])) {
                                echo 'value="' . $result['Opis'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>ID Dostawcy: </td>
                        <td><input type="number" name="idDost" <?php
                            if (isset($result['IDDostawcy'])) {
                                echo 'value="' . $result['IDDostawcy'] . '"';
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