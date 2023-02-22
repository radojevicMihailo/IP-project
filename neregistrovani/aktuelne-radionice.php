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
                    <a href="../neregistrovan/top-5.php"><label>Top 5 radionica</label></a>
                    <label>|</label>
                    <a href="../pocetna-strana/pocetna.php"><label>Prijavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <h2 class="text-center">Aktuelne radionice</h2>
                    <form name="pretraga" action="" method="POST">
                        <table class="table table-borderless">
                            <tr>
                                <td class="text-end">Pretraga po nazivu:</td>
                                <td><input type="text" name="naziv_p" /></td>
                            </tr>
                            <tr>
                                <td class="text-end">Pretraga po mestu:</td>
                                <td><input type="text" name="mesto_p" /></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2"><input type="submit" class="btn btn-primary" name="pretrazi" value="Pretraži" /></td>
                            </tr>
                        </table>
                    </form>
                    <table class="table table-bordered text-center">
                        <tr>
                            <form action="" method="POST">
                                <th><input type="submit" class="btn btn-link" name="naziv_s" value="Naziv" /></th>
                                <th><input type="submit" class="btn btn-link" name="datum_s" value="Datum" /></th>
                                <th>Mesto</th>
                                <th>Kratak opis</th>
                                <th>Glavna slika</th>
                            </form>
                        </tr>
                        <?php
                            include_once '../globalno/konekcija.php';
                            $danas = date("Y-m-d");
                            $upit = "SELECT * FROM radionice WHERE odobrena=2 AND DATE(radionice.datum)>'".$danas."'";
                            if (isset($_POST['pretrazi'])) {
                                if (!empty($_POST['naziv_p'])) {
                                    $upit = $upit." AND naziv='".$_POST['naziv_p']."'";
                                }
                                if (!empty($_POST['mesto_p'])) {
                                    $upit = $upit." AND mesto='".$_POST['mesto_p']."'";
                                }
                            }
                            if (isset($_POST['naziv_s'])) {
                                $upit = $upit." ORDER BY naziv ASC";
                            } else if (isset($_POST['datum_s'])) {
                                $upit = $upit." ORDER BY datum ASC";
                            }
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