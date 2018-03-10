        <?php
        $tbl = $pdo->query('SELECT * FROM `platnosci`');
        echo '<br><a href="admin/payments/add.php" class="btn btn-success" role="button">dodaj platnosc</a><br>'
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
            . '<th><a href="admin/payments/usun.php?id=' . $value['ID'] .
            '" class="btn btn-danger" role="button">Usuń</a><a href="admin/payments/add.php?id=' . $value['ID'] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
        }
        echo '</table>';
