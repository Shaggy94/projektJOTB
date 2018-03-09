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
                    $log=$pdo->prepare();
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Witaj</a></li>';
                } else {
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Zarejestruj się</a></li>';
                }
                ?>
                
                <li><a href="logowanie.php"><span class="glyphicon glyphicon-log-in"></span>
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