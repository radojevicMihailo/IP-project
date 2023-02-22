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
                    <a href="./korisnici.php"><label>Korisnici</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <h2 class="text-center">Radionice</h2>
                    <table class="table text-center table-bordered">
                        <tr class="align-middle">
                            <th>Naziv</th>
                            <th>Datum</th>
                            <th>Mesto</th>
                            <th>Kratak opis</th>
                            <th>Duži opis</th>
                            <th>Glavna slika</th>
                            <th>Galerija slika</th>
                            <th>Maksimalan broj učesnika</th>
                            <th>Status</th>
                            <th>Akcija</th>
                        </tr>
                        <?php
                            include_once '../globalno/konekcija.php';
                            $upit = "SELECT * FROM radionice";
                            $rezultat = mysqli_query($konekcija, $upit);
                            
                            while($red = mysqli_fetch_assoc($rezultat)) {
                                $upit_g = "SELECT * FROM slike WHERE id_radionice=".$red['id_radionice'];
                                $rezultat_g = mysqli_query($konekcija, $upit_g);
                                $folder = "../slike/radionice/";
                                $glavna_bez_ekstenzije = substr($red['slika_glavna'], 0, strrpos($red['slika_glavna'], "."));
                                $putanja_galerije = $folder."/galerije/".$glavna_bez_ekstenzije."/";
                                ?>
                        <tr class="align-middle">
                            <td><?php echo $red['naziv']; ?></td>
                            <td><?php echo $red['datum']; ?></td>
                            <td><?php echo $red['mesto']; ?></td>
                            <td><?php echo $red['kratak_opis']; ?></td>
                            <td><?php echo $red['duzi_opis']; ?></td>
                            <td><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                            <td>
                                Galerija
                            </td>
                            <td><?php echo $red['max_br_ucesnika']; ?></td>
                            <td>
                                <?php
                                    if ($red['odobrena'] == 2) {
                                        echo '<span style="color: green">Odobrena</span>';
                                    } else if ($red['odobrena'] == 1) {
                                        echo '<span style="color: red">Odbijena</span>';
                                    } else if ($red['odobrena'] == 3) {
                                        echo 'Predlog od učesnika.';
                                        $danas = date("Y-m-d");
                                        $upit_prijave = "SELECT * FROM prijave JOIN radionice ON prijave.id_radionice=radionice.id_radionice WHERE prijave.ki_ucesnika='".$red['ki_organizacije']."' AND prijave.odobri=2 AND DATE(radionice.datum)>'".$danas."'";
                                        $rezultat_prijave = mysqli_query($konekcija, $upit_prijave);
                                        if (mysqli_num_rows($rezultat_prijave)>0) {
                                            echo 'Učesnik trenutno ima aktuelne prijave.';
                                            ?>
                                <form action="zahtevi-skripta.php" method="POST">
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                    <input type="submit" class="btn btn-danger" name="dugme_odbij_rad" value="Odbij" />
                                </form>
                                            <?php
                                        } else {
                                            ?>
                                <form action="zahtevi-skripta.php" method="POST">
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                    <input type="hidden" name="kor_ime" value="<?php echo $red['ki_organizacije']; ?>" />
                                    <input type="submit" class="btn btn-success" name="odobri_rad_u" value="Odobri" />
                                    <input type="submit" class="btn btn-danger" name="dugme_odbij_rad" value="Odbij" />
                                </form>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                <form action="zahtevi-skripta.php" method="POST">
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                    <input type="submit" class="btn btn-success" name="dugme_odobri_rad" value="Odobri" />
                                    <input type="submit" class="btn btn-danger" name="dugme_odbij_rad" value="Odbij" />
                                </form>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <form action="./azuriraj-radionicu.php" method="POST">
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj" value="Ažuriraj" />
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                </form>
                            </td>
                        </tr>
                                <?php
                            }
                        ?>
                    </table>
                    <form name="forma_nova_radionica" action="./nova-radionica.php" method="POST">
                        <input type="submit" class="btn btn-primary" name="dugme_nova_radionica" value="Dodaj novu radionicu" />
                    </form>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-12 footer text-center">
                    &copy;Copyright
                </div>
            </div>
        </div>
    </body>
</html>
