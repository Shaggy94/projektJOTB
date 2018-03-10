<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    die();
}
include 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProjektJOTB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>
        <script>
            $(function () {
                var hash = window.location.hash;
                hash && $('ul.nav a[href="' + hash + '"]').tab('show');

                $('.nav-tabs a').click(function (e) {
                    $(this).tab('show');
                    var scrollmem = $('body').scrollTop();
                    window.location.hash = this.hash;
                    $('html,body').scrollTop(scrollmem);
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
            include './navbar.php';
            ?>
            <h2>Panel admina</h2>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#powiadomienia">Powiadomienia</a></li>
                <li><a data-toggle="tab" href="#dostawcy">Dostawcy</a></li>
                <li><a data-toggle="tab" href="#platnosci">Płatności</a></li>
                <!--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>-->
            </ul>

            <div class="tab-content" >
                <div id="powiadomienia" class="tab-pane fade in active">
                    <h3>Powiadomienia</h3>
                    <p>
                        TUTAJ BĘDĄ POWIADOMIENIA
                    </p>
                </div>
                <div id="dostawcy" class="tab-pane fade">
                    <h3>Dostawcy</h3>
                    <div class="table-responsive">
                        <?php
                        include 'admin/providers/providers.php';
                        ?>
                    </div>
                </div>
                <div id="platnosci" class="tab-pane fade">
                    <h3>Płatności</h3>
                    <div class="table-responsive">
                        <?php
                        include 'admin/payments/payments.php';
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>

