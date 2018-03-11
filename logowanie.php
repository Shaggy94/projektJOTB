<?php
ob_start();
session_start();

include 'connection.php';

    echo $_POST['login']."   ".$_POST['haslo'];
if (isset($_POST['login']) && isset($_POST['haslo'])) {
    $log=$pdo->prepare('SELECT*FROM danelogowania WHERE login= :log');
    try {
        $log->bindParam(':log',$_POST['login']);
        $log->execute();
        if($log->rowCount()>0){
            $dane=$log->fetch(PDO::FETCH_ASSOC);
            if($dane['Haslo']===md5($_POST['haslo'])){
                $_SESSION['id']=$dane['ID'];
                $_SESSION['login']=$_POST['login'];
                header("Location: index.php");
            }else echo "Hasło niepoprawne";
        }else echo "Nie ma takiego uzytkownika";
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
ob_end_flush();
?>