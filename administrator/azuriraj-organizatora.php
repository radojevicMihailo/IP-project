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
                    <a href="./korisnici.php"><label>Korisnici</label></a>
                    <label>|</label>
                    <a href="./radionice.php"><label>Radionice</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <?php
                        session_start();
                        $_SESSION['azuriraj'] = $_POST['kor_ime'];

                        include_once '../globalno/konekcija.php';
                        $upit = "SELECT * FROM korisnici JOIN organizatori ON korisnici.korisnicko_ime=organizatori.korisnicko_ime WHERE korisnici.korisnicko_ime='".$_SESSION['azuriraj']."'";
                        $rezultat = mysqli_query($konekcija, $upit);
                        $red = mysqli_fetch_assoc($rezultat);
                    ?>
                    <form name="forma_ucesnik_profil" action="./azuriraj-organizatora-skripta.php" method="POST" enctype="multipart/form-data">
                        <table class="table text-center table-borderless">
                            <tr>
                                <td colspan="2">
                                    <h2>Profil organizatora</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Ime:</td>
                                <td class="text-start">
                                    <input type="text" name="ime" value="<?php echo $red['ime']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Prezime:</td>
                                <td class="text-start">
                                    <input type="text" name="prezime" value="<?php echo $red['prezime'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Korisničko ime:</td>
                                <td class="text-start">
                                    <input type="text" name="kor_ime" value="<?php echo $red['korisnicko_ime'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Lozinka:</td>
                                <td class="text-start">
                                    <input type="text" name="lozinka" value="<?php echo $red['lozinka'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Telefon:</td>
                                <td class="text-start">
                                    <input type="text" name="telefon" value="<?php echo $red['telefon'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Email:</td>
                                <td class="text-start">
                                    <input type="text" name="email" value="<?php echo $red['email'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Profilna slika:</td>
                                <td class="text-start">
                                    <img src="../slike/korisnici/<?php echo $red['slika'] ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="file" name="profilna_slika" /></td>
                            </tr>
                            <tr>
                                <td class="text-end">Naziv organizacije:</td>
                                <td class="text-start">
                                    <input type="text" name="naziv_org" value="<?php echo $red['naziv_organizacije'] ?>" />
                                </td>
                            </tr>
                            <tr>
                              <td class="text-end">Država:</td>
                              <td class="text-start">
                                  <input type="text" name="drzava" value="<?php echo $red['drzava'] ?>" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Grad:</td>
                              <td class="text-start">
                                  <input type="text" name="grad" value="<?php echo $red['grad'] ?>" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Poštanski broj:</td>
                              <td class="text-start">
                                  <input type="number" name="ptt" value="<?php echo $red['postanski_broj'] ?>" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Ulica i broj:</td>
                              <td class="text-start">
                                  <input type="text" name="ulica" value="<?php echo $red['ulica'] ?>" />
                                  <input type="text" name="broj" size="5" value="<?php echo $red['broj'] ?>" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Matični broj organizacije:</td>
                              <td class="text-start">
                                  <input type="number" name="mat_br_org" value="<?php echo $red['maticni_broj'] ?>" />
                              </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj" value="Ažuriraj organizatora" />
                                    <input type="submit" class="btn btn-secondary" name="dugme_obrisi" value="Obriši organizatora" />
                                </td>
                            </tr>
                        </table>
                    </form>
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