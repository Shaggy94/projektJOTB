<?php
session_start();
if(!empty($_SESSION)){
    session_unset();
}
header('Location: index.php');
?>
