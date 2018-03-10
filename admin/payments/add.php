<?php
include '../../connection.php';

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

    header('location: ../../paneladmina.php');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM platnosci WHERE id=:id');
    $sth->bindParam(':id', $idGet);
    $sth->execute();

    $result = $sth->fetch();
}
?>

<form method="post" action="add.php">

    <?php
    if ($idGet > 0) {
        echo '<input type="hidden" name="id" value="' . $idGet . '">';
    }
    ?>

    Numer Konta Beneficjenta: <input type="text" name="nrKBen" <?php
    if (isset($result['NumerKontaBeneficjenta'])) {
        echo 'value="' . $result['NumerKontaBeneficjenta'] . '"';
    }
    ?>/><br><br>
    Numer Konta Platnika: <input type="text" name="nrKPla" <?php
    if (isset($result['NumerKontaPlatnika'])) {
        echo 'value="' . $result['NumerKontaPlatnika'] . '"';
    }
    ?>/><br><br>
    Kwota Brutto: <input type="text" name="kwBrut" <?php
    if (isset($result['KwotaBrutto'])) {
        echo 'value="' . $result['KwotaBrutto'] . '"';
    }
    ?>/><br><br>
    Waluta: <input type="text" name="waluta" <?php
    if (isset($result['Waluta'])) {
        echo 'value="' . $result['Waluta'] . '"';
    }
    ?>/><br><br>
    Data Udokumentowania: <input type="date" name="dataUdok" <?php
    if (isset($result['DataUdokumentowania'])) {
        echo 'value="' . $result['DataUdokumentowania'] . '"';
    }
    ?>/><br><br>
    Data Otrzymania: <input type="date" name="dataOtrz" <?php
    if (isset($result['DataOtrzymania'])) {
        echo 'value="' . $result['DataOtrzymania'] . '"';
    }
    ?>/><br><br>
    Numer Beneficjenta: <input type="text" name="nrBen" <?php
    if (isset($result['NumerBeneficjenta'])) {
        echo 'value="' . $result['NumerBeneficjenta'] . '"';
    }
    ?>/><br><br>
    Numer Platnika: <input type="text" name="nrPlat" <?php
    if (isset($result['NumerPlatnika'])) {
        echo 'value="' . $result['NumerPlatnika'] . '"';
    }
    ?>/><br><br>
    <input type="submit" value="Zapisz" />

</form>


