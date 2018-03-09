<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../../index.php');
    die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Płatności</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        include '../../connection.php';

        $tbl = $pdo->query('SELECT * FROM `platnosci`');
        echo '<br><a href="../../wyloguj.php">Wyloguj</a><br>';
        echo '<br><a href="add.php">dodaj platnosc</a><br>'
        . '<table class="table table-striped">'
        . '<tr>'
        . '<th>ID</th>'
        . '<th>Numer Konta Beneficjenta</th>'
        . '<th>Numer Konta Płatnika</th>'
        . '<th>Kwota</th>'
        . '<th>Waluta</th>'
        . '<th>Data Udokumentowania</th>'
        . '<th>Data otrzymania</th>'
        . '<th>Numer Beneficjenta</th>'
        . '<th>Numer płatnika</th>'
        . '<th>Opcje</th>';
        echo'</tr>';
        foreach ($tbl->fetchAll() as $value) {
            echo '<tr>'
            . '<th>' . $value['ID'] . '</th>'
            . '<th>' . $value['NumerKontaBeneficjenta'] . '</th>'
            . '<th>' . $value['NumerKontaPlatnika'] . '</th>'
            . '<th>' . $value['KwotaBrutto'] . '</th>'
            . '<th>' . $value['Waluta'] . '</th>'
            . '<th>' . $value['DataUdokumentowania'] . '</th>'
            . '<th>' . $value['DataOtrzymania'] . '</th>'
            . '<th>' . $value['NumerBeneficjenta'] . '</th>'
            . '<th>' . $value['NumerPlatnika'] . '</th>'
            . '<th><a href="usun.php?id=' . $value['ID'] .
            '">Usuń</a> | <a href="add.php?id=' . $value['ID'] . '">Edytuj</a></th></tr>';
        }
        echo '</table>';
        ?>
        <a href="../../index.php">Strona głowna</a>
    </body>
</html>
