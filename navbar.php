<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="index.php">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Strona domowa</a></li>
                <li><a href="paneladmina.php">Tabele</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['id'])) {
                    $session = 1;
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Witaj</a></li>';
                } else {
                    $session = 0;
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Zarejestruj się</a></li>';
                }
                ?>
                <li><a href="#" id="link"><span class="glyphicon glyphicon-log-in"></span>
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo " Wyloguj się";
                        } else {
                            echo " Zaloguj się";
                        }
                        ?>
                    </a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="pokaz" style="display: none; z-index: 1; position: ">
    <form method="POST" action="logowanie.php">
        Login: <input name="login" type="text" /><br>
        Hasło: <input name="haslo" type="password"/><br>
        <input type="submit" value="OK"/>
    </form>
</div>
<script>
    $ses =<?php echo $session; ?>;
    $(document).ready(function () {
        $("#link").click(function () {
            if ($ses === 0)
                $("#pokaz").toggle();
            else
            {
                $("#pokaz").load('wyloguj.php');
                location.reload();
            }
        });
    });
</script>
