        <?php


        $tbl = $pdo->query('SELECT * FROM `faktury`');
        echo '<br><a href="admin/factures/add.php" class="btn btn-success" role="button">dodaj fakturę</a><br>'
        . '<table class="table table-striped">'
        . '<tr>'
        . '<th>ID</th>'
        . '<th>Numer faktury</th>'
        . '<th>Data wystawienia</th>'
        . '<th>Imie</th>'
        . '<th>Nazwisko</th>'
        . '<th>Ulica</th>'
        . '<th>Nr domu</th>'
        . '<th>Kod pocztowy</th>'
        . '<th>Miasto</th>'
		. '<th>NIP</th>'
		. '<th>Kraj</th>'
        . '<th>Opcje</th>';
        echo'</tr>';
        foreach ($tbl->fetchAll() as $value) {
            echo '<tr>'
            . '<th>' . $value['ID'] . '</th>'
            . '<th>' . $value['NumerFaktury'] . '</th>'
            . '<th>' . $value['DataWystawienia'] . '</th>'
            . '<th>' . $value['Imie'] . '</th>'
            . '<th>' . $value['Nazwisko'] . '</th>'
            . '<th>' . $value['Ulica'] . '</th>'
            . '<th>' . $value['NumerDomu'] . '</th>'
            . '<th>' . $value['KodPocztowy'] . '</th>'
            . '<th>' . $value['Miasto'] . '</th>'
			. '<th>' . $value['NIP'] . '</th>'
			. '<th>' . $value['Kraj'] . '</th>'
            . '<th><a href="admin/factures/usun.php?id=' . $value['ID'] .
            '" class="btn btn-danger" role="button">Usuń</a><a href="admin/factures/add.php?id=' . $value['ID'] . '" class="btn btn-info" role="button">Edytuj</a>
            <a href="admin/factures/faktura.php?id=' . $value['ID'] .'" class="btn btn-info" role="button">Faktura</a>
            </th></tr>';
        }
        echo '</table>';
		?>
		<hmtl>
			<form enctype="multipart/form-data" action="admin/factures/wczytaj.php" method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				Wybierz plik<input name="userfile" type="file" />
				<input type="submit" value="Wczytaj plik" />
			</form>
		</html>
		
