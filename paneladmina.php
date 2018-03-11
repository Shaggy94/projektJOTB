<?php
$basicPath = './';
include $basicPath . 'connection.php';
include $basicPath . 'header.php';
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
            <div class="well well-lg"><h1>Panel administratora</h1></div>


            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#powiadomienia">Powiadomienia</a></li>
                <li><a data-toggle="tab" href="#dostawcy">Dostawcy</a></li>
                <li><a data-toggle="tab" href="#platnosci">Płatności</a></li>
                <li><a data-toggle="tab" href="#sprzedawcy">Sprzedawcy</a></li>
                <li><a data-toggle="tab" href="#klienci">Klienci</a></li>
                <li><a data-toggle="tab" href="#magazyn">Magazyn</a></li>
                <li><a data-toggle="tab" href="#produkty">Produkty</a></li>
                <li><a data-toggle="tab" href="#faktury">Faktury</a></li>
                <li><a data-toggle="tab" href="#zamowienia">Zamówienia</a></li>
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
                <div id="zamowienia" class="tab-pane fade">
                    <h3>Zamówienia</h3>
                    <div class="table-responsive">
                        <?php
                        ?>
                    </div>
                </div>            
                <div id="sprzedawcy" class="tab-pane fade">
                    <h3>Sprzedawcy</h3>
                    <div class="table-responsive">
                        <?php
                        include 'admin/sellers/sellers.php';
                        ?>
                    </div>
                </div>
                <div id="produkty" class="tab-pane fade">
                    <h3>Produkty</h3>
                    <div class="table-responsive">
                        <?php
                        ?>
                    </div>
                </div>
                <div id="magazyn" class="tab-pane fade">
                    <h3>Magazyn</h3>
                    <div class="table-responsive">
                        <?php ?>
                    </div>
                </div>
                <div id="klienci" class="tab-pane fade">
                    <h3>Klienci</h3>
                    <div class="table-responsive">
                        <?php
                        include './admin/customers/customers.php';
                        ?>
                    </div>
                </div>
                <div id="faktury" class="tab-pane fade">
                    <h3>Faktury</h3>
                    <div class="table-responsive">
                        <?php ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

