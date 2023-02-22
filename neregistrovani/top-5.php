<!DOCTYPE html>
<html>
    <head>
        <title>IP PROJEKAT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
        <link rel="stylesheet" href="../globalno/stilovi.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 header"></div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                    <a href="../neregistrovan/aktuelne-radionice.php"><label>Aktuelne radionice</label></a>
                    <label>|</label>
                    <a href="../pocetna-strana/pocetna.php"><label>Prijavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <h2 class="text-center">Top 5 radionica</h2>
                    <table class="table table-bordered text-center">
                        <tr>
                            <form action="" method="POST">
                                <th>Naziv</th>
                                <th>Datum</th>
                                <th>Mesto</th>
                                <th>Kratak opis</th>
                                <th>Glavna slika</th>
                            </form>
                        </tr>
                        <?php
                            include_once '../globalno/konekcija.php';
                            $upit = "SELECT * FROM radionice JOIN prijave ON radionice.id_radionice=prijave.id_radionice";
                            $rezultat = mysqli_query($konekcija, $upit);
                            
                            while($red = mysqli_fetch_assoc($rezultat)) {
                                ?>
                        <tr>
                            <td><?php echo $red['naziv']; ?></td>
                            <td><?php echo $red['datum']; ?></td>
                            <td><?php echo $red['mesto']; ?></td>
                            <td><?php echo $red['kratak_opis']; ?></td>
                            <td><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                        </tr>
                                <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 footer text-center">
                    &copy;Copyright
                </div>
            </div>
        </div>
    </body>
</html>