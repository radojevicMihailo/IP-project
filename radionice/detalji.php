<!DOCTYPE html>
<html>
    <head>
        <title>IP PROJEKAT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../globalno/stilovi.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 header"></div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                    <a href="../ucesnik/profil.php"><label>Profil</label></a>
                    <label>|</label>
                    <a href="../ucesnik/radionice.php"><label>Radionice</label></a>
                    <label>|</label>
                    <a href="../ucesnik/postani-organizator.php"><label>Postani organizator</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <?php
                    include_once '../globalno/konekcija.php';
                    session_start();
                    $upit = "SELECT * FROM radionice WHERE id_radionice=".$_SESSION['detalji'];
                    $rezultat = mysqli_query($konekcija, $upit);
                    $red = mysqli_fetch_assoc($rezultat);
                ?>
                <div class="col-12 content">
                    <h2 class="text-center">Detalji radionice</h2>
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-end">Naziv:</td>
                            <td class="text-start"><?php echo $red['naziv']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end">Datum:</td>
                            <td class="text-start"><?php echo $red['datum']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end">Mesto:</td>
                            <td class="text-start"><?php echo $red['mesto']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end">Kraći opis:</td>
                            <td class="text-start"><?php echo $red['kratak_opis']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end">Glavna slika:</td>
                            <td class="text-start"><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                        </tr>
                        <tr>
                            <td class="text-end">Duži opis:</td>
                            <td class="text-start"><?php echo $red['duzi_opis']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-end">Galerija slika:</td>
                            <td class="text-start">
                                <div class="row photos">
                                    <?php
                                        $upit_galerija = "SELECT link_putanje FROM slike WHERE id_radionice=".$_SESSION['detalji'];
                                        $rezultat_galerija = mysqli_query($konekcija, $upit_galerija);
                                        $putanja_galerije = "../slike/radionice/galerije/";
                                        while ($red_galerija= mysqli_fetch_assoc($rezultat_galerija)) {
                                            $putanja_slike = $putanja_galerije.$red_galerija['link_putanje'];
                                            ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                                        <a href="<?php echo $putanja_slike; ?>" data-lightbox="photos">
                                            <img class="img-fluid" src="<?php echo $putanja_slike; ?>">
                                        </a>
                                    </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end">Maksimalan broj učesnika:</td>
                            <td class="text-start"><?php echo $red['max_br_ucesnika']; ?></td>
                        </tr>
                        <tr>
                            <?php
                                $upit_prijave = "SELECT * FROM prijave WHERE id_radionice=".$_SESSION['detalji']." AND odobri=2";
                                $rezultat_prijave = mysqli_query($konekcija, $upit_prijave);
                                if (mysqli_num_rows($rezultat_prijave)>=$red['max_br_ucesnika']) {
                                    echo '<td colspan="2"><h5>Nema više mesta na ovoj radionici</h5></td>';
                                } else {
                                    ?>
                            <form name="forma_prijava" action="./detalji-skripta.php" method="GET">
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" name="dugme_prijava" value="Prijavi me" >
                                </td>
                            </form>
                                    <?php
                                }
                            ?>
                        </tr>
                    </table>
                    <table class="table table-borderless">
                        <tr>
                            <td colspan="2"><h3>Sviđanja</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                    $upit_svidjanja = "SELECT * FROM prijave WHERE id_radionice=".$_SESSION['detalji']." AND svidjanje=1";
                                    $rezultat_svidjanja = mysqli_query($konekcija, $upit_svidjanja);
                                    if (mysqli_num_rows($rezultat_svidjanja)>0) {
                                        echo "<h5>Broj svidjanja: ". mysqli_num_rows($rezultat_svidjanja)."</h5><br />";
                                    } else {
                                        echo "<h5>Broj svidjanja: 0</h5><br />";
                                    }
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="table table-borderless">
                        <tr>
                            <td colspan="2"><h3>Komentari</h3></td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                    $upit_komentari = "SELECT * FROM prijave WHERE id_radionice=".$_SESSION['detalji']." AND komentar!='nista'";
                                    $rezultat_komentari = mysqli_query($konekcija, $upit_komentari) or die(mysqli_error($konekcija));
                                    if (mysqli_num_rows($rezultat_komentari)>0) {
                                        echo "<h5>Broj komentara: ". mysqli_num_rows($rezultat_komentari)."</h5><br />";
                                    } else {
                                        echo "<h5>Broj komentara: 0</h5><br />";
                                    }
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
            <div class="row">
                <div class="col-12 footer text-center">
                    &copy;Copyright
                </div>
            </div>
        </div>
    </body>
</html>