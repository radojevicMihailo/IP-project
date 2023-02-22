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
                <div class="col-12 header">
                </div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                    <a href="./radionice.php"><label>Pregled radionica</label></a>
                    <label>|</label>
                    <a href="./prijave-za-radionice.php"><label>Prijave za radionice</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <?php
                include_once '../globalno/konekcija.php';
                session_start();
                $_SESSION['azuriraj']=$_POST['id_rad'];
                $upit = "SELECT * FROM radionice WHERE id_radionice='".$_SESSION['azuriraj']."'";
                $rezultat = mysqli_query($konekcija, $upit);
                $red = mysqli_fetch_assoc($rezultat);
            ?>
            <div class="row">
                <div class="col-12 content text-center">
                    <form name="forma_azuriraj_radionicu" action="./azuriraj-radionicu-skripta.php" method="POST" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="text-center"><h2>Ažuriraj radionicu</h2></td>
                            </tr>
                            <tr>
                                <td class="text-end">Naziv:</td>
                                <td class="text-start">
                                    <input type="text" name="naziv_rad" value="<?php echo $red['naziv']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Datum održavanja:</td>
                                <td class="text-start">
                                    <input type="text" name="datum_rad" value="<?php echo $red['datum']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Mesto održavanja:</td>
                                <td class="text-start">
                                    <input type="text" name="mesto_rad" value="<?php echo $red['mesto']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Kratak opis:</td>
                                <td class="text-start">
                                    <textarea rows="3" cols="40" name="k_opis"><?php echo $red['kratak_opis']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Glavna slika:</td>
                                <td class="text-start">
                                    <img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" />
                                    <input type="file" name="glavna_slika" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Duži opis:</td>
                                <td class="text-start">
                                    <textarea rows="8" cols="40" name="d_opis"><?php echo $red['duzi_opis']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Galerija slika:</td>
                                <td class="text-start">
                                    <div class="row photos">
                                        <?php
                                            $upit_galerija = "SELECT * FROM slike WHERE id_radionice=".$_SESSION['azuriraj'];
                                            $rezultat_galerija = mysqli_query($konekcija, $upit_galerija);
                                            $putanja_galerije = "../slike/radionice/galerije/";
                                            $i=1;
                                            while ($red_galerija= mysqli_fetch_assoc($rezultat_galerija)) {
                                                $putanja_slike = $putanja_galerije.$red_galerija['link_putanje'];
                                                ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3 item">
                                            <a href="<?php echo $putanja_slike; ?>" data-lightbox="photos">
                                                <img class="img-fluid" src="<?php echo $putanja_slike; ?>">
                                            </a>
                                            <input type="file" name="<?php echo "slika".$i; ?>" />
                                            <input type="hidden" name="<?php echo "id_s".$i; ?>" value="<?php echo $red_galerija['id_slike']; ?>" />
                                        </div>
                                                <?php
                                                $i++;
                                            }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Maksimalan broj učesnika:</td>
                                <td class="text-start">
                                    <input type="number" name="br_ucesnika" value="<?php echo $red['max_br_ucesnika']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj" value="Ažuriraj radionicu" />
                                </td>
                                <td class="text-start">
                                    <input type="submit" class="btn btn-secondary" name="dugme_otkazi" value="Otkaži radionicu" />
                                </td>
                            </tr>
                        </table>
                    </form>
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