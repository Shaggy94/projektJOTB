<?php
$tbl = $pdo->query('SELECT * FROM `produkty`');

echo '<br><a href="admin/products/add.php" class="btn btn-success" role="button">dodaj produkt</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Nazwa</th>'
 . '<th>VAT</th>'
 . '<th>Cenna netto</th>'
 . '<th>Opis</th>'
 . '<th>IDDostawcy</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<th>' . $value['ID'] . '</th>'
    . '<th>' . $value['Nazwa'] . '</th>'
    . '<th>' . $value['VAT'] . '</th>'
    . '<th>' . $value['CenaNetto'] . '</th>'
    . '<th>' . $value['Opis'] . '</th>'
    . '<th>' . $value['IDDostawcy'] . '</th>'
    . '<th><a href="admin/products/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/products/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';
?>