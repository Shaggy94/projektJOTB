<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

$getF = $pdo->query('SELECT ID,NumerFaktury FROM faktury ORDER BY DataWystawienia');
$getK = $pdo->query('SELECT ID,Imie,Nazwisko FROM klienci ORDER BY Nazwisko');
$getS = $pdo->query('SELECT ID,Imie,Nazwisko FROM sprzedawcy ORDER BY Nazwisko');

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

    $sts = $pdo->prepare('SELECT * FROM sprzedawcy WHERE id=:id');
    $sts->bindParam(':id', $result['IDSprzedawcy']);
    $sts->execute();
    $sName = $sts->fetch();

    $stk = $pdo->prepare('SELECT * FROM klienci WHERE id=:id');
    $stk->bindParam(':id', $result['IDKlienta']);
    $stk->execute();
    $kName = $stk->fetch();

    $stf = $pdo->prepare('SELECT * FROM faktury WHERE id=:id');
    $stf->bindParam(':id', $result['IDFaktury']);
    $stf->execute();
    $fName = $stf->fetch();
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
            include $basicPath . 'navbar.php';
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
                        <td>Numer faktury: </td>
                        <td><select name="idf">
                                <?php
                                echo '<option value="' . $fName['ID'] . '">' . $fName['NumerFaktury']. '</option>';
                                foreach ($getF->fetchAll() as $fact) {
                                    echo '<option value="' . $fact['ID'] . '">'. $fact['NumerFaktury'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Klient: </td>
                        <td><select name="idk">
                                <?php
                                echo '<option value="' . $kName['ID'] . '">' . $kName['Nazwisko'] . ' ' . $kName['Imie'] . '</option>';
                                foreach ($getK->fetchAll() as $customer) {
                                    echo '<option value="' . $customer['ID'] . '">' . $customer['Nazwisko'] . ' ' . $customer['Imie'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Sprzedawca: </td>
                        <td><select name="ids">
                                <?php
                                echo '<option value="' . $sName['ID'] . '">' . $sName['Nazwisko'] . ' ' . $sName['Imie'] . '</option>';
                                foreach ($getS->fetchAll() as $sellers) {
                                    echo '<option value="' . $sellers['ID'] . '">' . $sellers['Nazwisko'] . ' ' . $sellers['Imie'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <td><input type="submit" class="btn btn-success" value="Zapisz"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

