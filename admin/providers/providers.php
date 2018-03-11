<?php
$tbl = $pdo->query('SELECT * FROM `dostawcy`');

echo '<br><a href="#" class="btn btn-success" role="button" data-toggle="modal" data-target="#providers-modal">dodaj dostawcę</a><br>'
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
    . '<a href="'
    . $value["ID"] . '" class="btn btn-info" role="button" data-toggle="modal" data-target="#providers-modal">Edytuj</a></th></tr>';
}
echo '</table>';
?>
<script>
    $(document).ready(function () {
        $(".btn-info").click(function () {
            let addressValue = $(this).attr("href");
            console.log(addressValue);
            window.location.href = 'paneladmina.php?id=' + addressValue + '#dostawcy';
        });
    });
</script>

<div class="modal fade" id="providers-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Dodaj dostawcę</h1><br>
            <form method="POST" action="admin/providers/add.php">
                <?php
                $idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

                $sth = $pdo->prepare('SELECT * FROM dostawcy WHERE id=:id');
                $sth->bindParam(':id', $idGet);
                $sth->execute();
                $result = $sth->fetch();

                if ($idGet > 0) {
                    echo '<input type="hidden" name="id" value="' . $idGet . '">';
                }
                ?>
                Nrumer Dostawcy: <br><input type="text" name="nrs" <?php
                if (isset($result['NrDostawcy'])) {
                    echo 'value="' . $result['NrDostawcy'] . '"';
                }
                ?>/>
                Imię: <br><input type="text" name="imie" <?php
                if (isset($result['Imie'])) {
                    echo 'value="' . $result['Imie'] . '"';
                }
                ?>/>
                Nazwisko: <br><input type="text" name="nazw" <?php
                if (isset($result['c'])) {
                    echo 'value="' . $result['Nazwisko'] . '"';
                }
                ?>/>
                Ulica: <br><input type="text" name="ul" <?php
                if (isset($result['Ulica'])) {
                    echo 'value="' . $result['Ulica'] . '"';
                }
                ?>/>
                Numer Domu: <br><input type="number" name="nrDomu" <?php
                if (isset($result['NrDomu'])) {
                    echo 'value="' . $result['NrDomu'] . '"';
                }
                ?>/>
                <br>Kod Pocztowy: <br><input type="text" name="kod" <?php
                if (isset($result['KodPocztowy'])) {
                    echo 'value="' . $result['KodPocztowy'] . '"';
                }
                ?>/>
                Miasto: <br><input type="text" name="miasto" <?php
                if (isset($result['Miasto'])) {
                    echo 'value="' . $result['Miasto'] . '"';
                }
                ?>/>
                NIP: <br><input type="text" name="NIP" <?php
                if (isset($result['NIP'])) {
                    echo 'value="' . $result['NIP'] . '"';
                }
                ?>/>

                <input type="submit" class="login loginmodal-submit" value="Zapisz">
            </form>
        </div>
    </div>
</div>