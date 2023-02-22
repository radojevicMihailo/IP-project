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
                <div class="col-12 header">
                </div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                    <a href="./radionice.php"><label>Radionice</label></a>
                    <label>|</label>
                    <a href="./postani-organizator.php"><label>Postani organizator</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content text-center">
                    <?php
                        session_start();
                        $kor_ime = $_SESSION['ulogovan'];

                        include_once '../globalno/konekcija.php';
                        $rezultat = mysqli_query($konekcija, "SELECT * FROM korisnici WHERE korisnicko_ime='$kor_ime'");
                        $red = mysqli_fetch_assoc($rezultat);
                    ?>
                    <form name="forma_ucesnik_profil" action="./azuriraj-skripta.php" method="POST" enctype="multipart/form-data">
                        <table class="table text-center table-borderless">
                            <tr>
                                <td colspan="2">
                                    <h2>Profil</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Ime:</td>
                                <td class="text-start">
                                    <input type="text" name="ime" value="<?php echo $red['ime'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Prezime:</td>
                                <td class="text-start">
                                    <input type="text" name="prezime" value="<?php echo $red['prezime']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Korisničko ime:</td>
                                <td class="text-start">
                                    <?php echo $red['korisnicko_ime']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Telefon:</td>
                                <td class="text-start">
                                    <input type="text" name="telefon" value="<?php echo $red['telefon']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Email:</td>
                                <td class="text-start">
                                    <input type="email" name="email" value="<?php echo $red['email'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Profilna slika:</td>
                                <td class="text-start">
                                    <img src="../slike/korisnici/<?php echo $red['slika'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="profilna_slika" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj" value="Ažuriraj profil" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <form name="forma_ucesnik_radionice" action="" method="POST">
                        <h2>Radionice na kojima ste prisutvovali</h2>
                        <table class="table text-center table-bordered">
                            <?php
                                include_once '../globalno/konekcija.php';
                                $danas = date("Y-m-d");
                                $upit = "SELECT * FROM radionice JOIN prijave ON radionice.id_radionice=prijave.id_radionice WHERE prijave.ki_ucesnika='".$_SESSION['ulogovan']."' AND DATE(radionice.datum)<'".$danas."'";
                                if (isset($_POST['naziv_s'])) {
                                    $upit = $upit." ORDER BY naziv ASC";
                                } else if (isset($_POST['datum_s'])) {
                                    $upit = $upit." ORDER BY datum ASC";
                                } elseif (isset($_POST['mesot_s'])) {
                                    $upit = $upit." ORDER BY mesto ASC";
                                }
                                $rezultat = mysqli_query($konekcija, $upit) or die("Greska: ".mysqli_error($konekcija));
                                if (mysqli_num_rows($rezultat)>0) {
                                    ?>
                            <tr>
                                <th class="align-middle"><input type="submit" class="btn btn-link" name="naziv_s" value="Naziv" /></th>
                                <th class="align-middle"><input type="submit" class="btn btn-link" name="datum_s" value="Datum" /></th>
                                <th class="align-middle"><input type="submit" class="btn btn-link" name="mesto_s" value="Mesto" /></th>
                                <th class="align-middle">Glavna slika</th>
                                <th class="align-middle">Kratak opis</th>
                            </tr>
                                    <?php
                                        while($red = mysqli_fetch_assoc($rezultat)) {
                                            ?>
                            <tr>
                                <td class="align-middle"><?php echo $red['naziv']; ?></td>
                                <td class="align-middle"><?php echo $red['datum']; ?></td>
                                <td class="align-middle"><?php echo $red['mesto']; ?></td>
                                <td class="align-middle"><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                                <td class="align-middle"><?php echo $red['kratak_opis']; ?></td>
                            </tr>
                                            <?php
                                        }
                                } else {
                                    echo '<h5>Niste prisustvovali ni na jednoj radionici</h5>';
                                }
                            ?>
                        </table>
                    </form>
                    <h2>Vaše akcije</h2>
                    <h4>Sviđanja</h4>
                    <table class="table text-center table-bordered">
                        <?php
                            $upit_svidjanja = "SELECT * FROM radionice JOIN prijave ON radionice.id_radionice=prijave.id_radionice WHERE prijave.ki_ucesnika='".$_SESSION['ulogovan']."' AND prijave.svidjanje=1";
                            $rezultat_svidjanja = mysqli_query($konekcija, $upit_svidjanja);
                            if (mysqli_num_rows($rezultat_svidjanja)>0) {
                                ?>
                        <tr>
                            <th>Naziv radionice</th>
                            <th>Glavna slika</th>
                            <th>Akcija</th>
                        </tr>
                                <?php
                                while($red_svidjanja = mysqli_fetch_assoc($rezultat_svidjanja)) {
                                        ?>
                                <tr>
                                    <form name="komentari" action="./akcije-skripta.php" method="POST">
                                        <td class="align-middle">
                                            <?php echo $red_svidjanja['naziv']; ?>
                                            <input type="hidden" name="idR_s" value="<?php echo $red_svidjanja['id_radionice']; ?>" />
                                        </td class="align-middle">
                                        <td><img src="../slike/radionice/glavne-slike/<?php echo $red_svidjanja['slika_glavna'] ?>" /></td>
                                        <td class="align-middle"><input type="submit" class="btn btn-secondary" name="povuci_svidjanje" value="Povuci sviđanje" /></td>
                                    </form>
                                </tr>
                                        <?php
                                }
                            } else {
                                echo "Niste označili da Vam se sviđa nijedna radionica.";
                            }
                        ?>
                    </table>
                    <h4>Komentari</h4>
                    <table class="table text-center table-bordered">
                        <?php
                            $upit_komentari = "SELECT * FROM radionice JOIN prijave ON radionice.id_radionice=prijave.id_radionice WHERE prijave.ki_ucesnika='".$_SESSION['ulogovan']."' AND prijave.komentar!='nista'";
                            $rezultat_komentari = mysqli_query($konekcija, $upit_komentari);
                            if (mysqli_num_rows($rezultat_komentari)>0) {
                                ?>
                        <tr>
                            <th>Naziv radionice</th>
                            <th>Glavna slika</th>
                            <th>Komentar</th>
                            <th>Brisanje komentara</th>
                            <th>Ažuriranje komentara</th>
                        </tr>
                                <?php
                                while($red_komentari = mysqli_fetch_assoc($rezultat_komentari)) {
                                        ?>
                                <tr>
                                    <form name="komentari" action="./akcije-skripta.php" method="POST">
                                        <td class="align-middle">
                                            <?php echo $red_komentari['naziv']; ?>
                                            <input type="hidden" name="idR_k" value="<?php echo $red_komentari['id_radionice']; ?>" />
                                        </td>
                                        <td><img src="../slike/radionice/glavne-slike/<?php echo $red_komentari['slika_glavna'] ?>" /></td>
                                        <td class="align-middle"><?php echo $red_komentari['komentar']; ?></td>
                                        <td class="align-middle">
                                            <input type="submit" class="btn btn-secondary" name="obrisi_komentar" value="Obriši" />
                                        </td>
                                        <td class="align-middle">
                                            <textarea rows="2" cols="30" name="novi_komentar"></textarea> <br />
                                            <input type="submit" class="btn btn-primary" name="azuriraj_komentar" value="Ažuriraj" />
                                        </td>
                                    </form>
                                </tr>
                                        <?php
                                }
                            } else {
                                echo "Nemate nijedan komentar.";
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