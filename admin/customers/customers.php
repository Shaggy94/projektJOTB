<?php
$tbl = $pdo->query('SELECT * FROM `klienci`');

echo '<br><a href="admin/customers/add.php" class="btn btn-success" role="button">Dodaj klienta</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Numer Klienta</th>'
 . '<th>Imię</th>'
 . '<th>Nazwisko</th>'
 . '<th>Ulica</th>'
 . '<th>Nr Domu</th>'
 . '<th>Kod Pocztowy</th>'
 . '<th>Miasto</th>'
 . '<th>NIP</th>'
 . '<th>Kraj</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<th>' . $value['ID'] . '</th>'
    . '<th>' . $value['NrKlienta'] . '</th>'
    . '<th>' . $value['Imie'] . '</th>'
    . '<th>' . $value['Nazwisko'] . '</th>'
    . '<th>' . $value['Ulica'] . '</th>'
    . '<th>' . $value['NrDomu'] . '</th>'
    . '<th>' . $value['KodPocztowy'] . '</th>'
    . '<th>' . $value['Miasto'] . '</th>'
    . '<th>' . $value['NIP'] . '</th>'
    . '<th>' . $value['Kraj'] . '</th>'
    . '<th><a href="admin/customers/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/customers/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';
?>
<script>
    $(document).ready(function () {
        $(".btn-info").click(function () {
            let addressValue = $(this).attr("href");
            console.log(addressValue);
            window.location.href = 'paneladmina.php?id=' + addressValue + '#klienci';
        });
    });
</script>

<div class="modal fade" id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Dodaj klienta</h1><br>
            <form method="POST" action="admin/customers/add.php">
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
                Nrumer Klienta:<input type="text" name="nrk" <?php
                if (isset($result['NrDostawcy'])) {
                    echo 'value="' . $result['NrDostawcy'] . '"';
                }
                ?>/><br><br>
                Imię: <input type="text" name="imie" <?php
                if (isset($result['Imie'])) {
                    echo 'value="' . $result['Imie'] . '"';
                }
                ?>/><br><br>
                Nazwisko: <input type="text" name="nazw" <?php
                if (isset($result['c'])) {
                    echo 'value="' . $result['Nazwisko'] . '"';
                }
                ?>/><br><br>
                Ulica: <input type="text" name="ul" <?php
                if (isset($result['Ulica'])) {
                    echo 'value="' . $result['Ulica'] . '"';
                }
                ?>/><br><br>
                Numer Domu: <input type="number" name="nrDomu" <?php
                if (isset($result['NrDomu'])) {
                    echo 'value="' . $result['NrDomu'] . '"';
                }
                ?>/><br><br>
                <br>Kod Pocztowy: <input type="text" name="kod" <?php
                if (isset($result['KodPocztowy'])) {
                    echo 'value="' . $result['KodPocztowy'] . '"';
                }
                ?>/><br><br>
                Miasto: <input type="text" name="miasto" <?php
                if (isset($result['Miasto'])) {
                    echo 'value="' . $result['Miasto'] . '"';
                }
                ?>/><br><br>
                NIP: <input type="text" name="NIP" <?php
                if (isset($result['NIP'])) {
                    echo 'value="' . $result['NIP'] . '"';
                }
                ?>/><br><br>
                Kraj: <input type="text" name="kraj" <?php
                if (isset($result['Kraj'])) {
                    echo 'value="' . $result['Kraj'] . '"';
                }
                ?>/><br><br>

                <input type="submit" class="login loginmodal-submit" value="Zapisz">
            </form>
        </div>
    </div>
</div>