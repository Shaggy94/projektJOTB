<?php

$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';
if (isset($_POST['nrz'])) {
    echo "dodano";
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `zamowienia` SET'
                . '`NumerZamowienia`=:nrz,'
                . '`DataSprzedazy`=:dsp,'
                . '`IDFaktury`=:idf,'
                . '`IDKlienta`=:idk,'
                . '`IDSprzedawcy`=:ids'
                . ' WHERE ID=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO `zamowienia` VALUES (NULL,:nrz, :dsp,:idf, :idk,:ids)');
    }
    $sth->bindParam(':nrz', $_POST['nrz']);
    $sth->bindParam(':dsp', $_POST['dsp']);
    $sth->bindParam(':idf', $_POST['idf']);
    $sth->bindParam(':idk', $_POST['idk']);
    $sth->bindParam(':ids', $_POST['ids']);
    $sth->execute();
    header('location: ../../paneladmina.php#zamowienia');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM zamowienia WHERE id=:id');
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
                        <td>Nrumer Zamówienia: </td>
                        <td><input type="text" name="nrz" <?php
                            if (isset($result['NumerZamowienia'])) {
                                echo 'value="' . $result['NumerZamowienia'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Data Sprzedaży: </td>
                        <td><input type="date" name="dsp" <?php
                            if (isset($result['DataSprzedazy'])) {
                                echo 'value="' . $result['DataSprzedazy'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>ID Faktury: </td>
                        <td><input type="number" name="idf" <?php
                            if (isset($result['IDFaktury'])) {
                                echo 'value="' . $result['IDFaktury'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>ID Klienta: </td>
                        <td><input type="number" name="idk" <?php
                            if (isset($result['IDKlienta'])) {
                                echo 'value="' . $result['IDKlienta'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>ID Sprzedawcy: </td>
                        <td><input type="number" name="ids" <?php
                            if (isset($result['IDSprzedawcy'])) {
                                echo 'value="' . $result['IDSprzedawcy'] . '"';
                            }
                            ?>/></td>
                    </tr>
                        <td><input type="submit" class="btn btn-success" value="Zapisz"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

