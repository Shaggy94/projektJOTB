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
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['login'].'</a></li>';
                } else {
                    $session = 0;
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Zarejestruj się</a></li>';
                }
                ?>
                <li><a href="#" id="login" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Zaloguj</a>
                    <a href="wyloguj.php" id='logout' style="display: none;"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Login to Your Account</h1><br>
                <form method="POST" action="logowanie.php">
                    <input type="text" name="login" placeholder="Login">
                    <input type="password" name="haslo" placeholder="Hasło">
                    <input type="submit" class="login loginmodal-submit" value="Zaloguj">
                </form>
                <div class="login-help">
                    <a href="#">Utwórz nowe konto</a> - <a href="#">Przypomnij hasło</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $ses =<?php echo $session; ?>;
        $(document).ready(function () {
            if ($ses !== 0) {
                $('#login').hide();
                $('#logout').show();
            }
            else
            {
                $('#login').show();
                $('#logout').hide();
            }
        });
    </script>
