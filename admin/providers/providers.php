<?php
$page = isset($_GET['page']) ? intval($_GET['page']-1) : 1;
$limit = 10;
$from=$page*$limit;
$count=$pdo->query('SELECT COUNT(id) as cnt FROM `dostawcy`')->fetch()['cnt'];
$sql='SELECT * FROM `dostawcy` LIMIT '.$from.', '.$limit;
$allPages= ceil($count/$limit);

//echo 'PAGE: '.$page.'<br>LIMIT: '.$limit.'<br>SQL: '.$sql.'<br>COUNT: '.$count.'<br>ALLPAGES: '.$allPages;

//$tbl = $pdo->query($sql);
$tbl=$pdo->query('SELECT * FROM `dostawcy`');

echo '<br><a href="admin/providers/add.php" class="btn btn-success" role="button">dodaj dostawcę</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Numer Dostawcy</th>'
 . '<th>Imię</th>'
 . '<th>Nazwisko</th>'
 . '<th>Ulica</th>'
 . '<th>Nr Domu</th>'
 . '<th>Kod Pocztowy</th>'
 . '<th>Miasto</th>'
 . '<th>NIP</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<th>' . $value['ID'] . '</th>'
    . '<th>' . $value['NrDostawcy'] . '</th>'
    . '<th>' . $value['Imie'] . '</th>'
    . '<th>' . $value['Nazwisko'] . '</th>'
    . '<th>' . $value['Ulica'] . '</th>'
    . '<th>' . $value['NrDomu'] . '</th>'
    . '<th>' . $value['KodPocztowy'] . '</th>'
    . '<th>' . $value['Miasto'] . '</th>'
    . '<th>' . $value['NIP'] . '</th>'
    . '<th><a href="admin/providers/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/providers/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';
//for($i=1;$i<=$allPages;$i++){
//    echo '<a href="paneladmina.php?page='.$i.'#dostawcy">'.$i.'</a>';
//}