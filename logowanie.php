<?php
ob_start();
session_start();

include 'connection.php';

if (isset($_POST['login']) && isset($_POST['haslo'])) {
    $log=$pdo->prepare('SELECT*FROM danelogowania WHERE login= :log');
    try {
        $log->bindParam(':log',$_POST['login']);
        $log->execute();
        if($log->rowCount()>0){
            $dane=$log->fetch(PDO::FETCH_ASSOC);
            if($dane['Haslo']===md5($_POST['haslo'])){
                $_SESSION['id']=$dane['ID'];
                header("Location: index.php");
            }else echo "Hasło niepoprawne";
        }else echo "Nie ma takiego uzytkownika";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
?>

<form method="POST" action="logowanie.php">
    Login: <input name="login" type="text" /><br>
    Hasło: <input name="haslo" type="password"/><br>
    <input type="submit" value="OK"/>
</form>

<?php
ob_end_flush();
?>