        <?php
        $tbl = $pdo->query('SELECT * FROM `magazyn`');
        echo '<br><a href="admin/store/add.php" class="btn btn-success" role="button">dodaj produkt</a><br>'
        . '<table class="table table-striped">'
        . '<tr>'
        . '<th>ID</th>'
        . '<th>ID produktu</th>'
        . '<th>Ilosc</th>'
        . '<th>Opcje</th>';
        echo'</tr>';
        foreach ($tbl->fetchAll() as $value) {
            echo '<tr>'
            . '<th>' . $value['ID'] . '</th>'
            . '<th>' . $value['IDProduktu'] . '</th>'
            . '<th>' . $value['Ilosc'] . '</th>'
            . '<th><a href="admin/store/usun.php?id=' . $value['ID'] .
            '" class="btn btn-danger" role="button">Usuń</a><a href="admin/store/add.php?id=' . $value['ID'] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
        }
        echo '</table>';

		