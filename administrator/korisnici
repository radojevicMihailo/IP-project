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
                    <a href="./radionice.php"><label>Radionice</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <h2 class="text-center">Učesnici</h2>
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Korisničko ime</th>
                            <th>Lozinka</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Profilna slika</th>
                            <th>Status</th>
                            <th>Akcija</th>
                        </tr>
                        <?php
                            include_once '../globalno/konekcija.php';
                            $upit_u = "SELECT * FROM korisnici WHERE tip_korisnika=0";
                            $rezultat_u = mysqli_query($konekcija, $upit_u);
                            
                            while($red_u = mysqli_fetch_assoc($rezultat_u)) {
                                ?>
                        <form action="./zahtevi-skripta.php" method="POST">
                            <tr class="align-middle">
                                <td><?php echo $red_u['ime']; ?></td>
                                <td><?php echo $red_u['prezime']; ?></td>
                                <td>
                                    <?php echo $red_u['korisnicko_ime']; ?>
                                    <input type="hidden" name="kor_ime" value="<?php echo $red_u['korisnicko_ime']; ?>" />
                                </td>
                                <td><?php echo $red_u['lozinka']; ?></td>
                                <td><?php echo $red_u['telefon']; ?></td>
                                <td><?php echo $red_u['email']; ?></td>
                                <td><img src="../slike/korisnici/<?php echo $red_u['slika'] ?>" /></td>
                                <td>
                                    <?php
                                        if ($red_u['status'] == 2) {
                                            echo '<span style="color: green">Aktivan</span>';
                                        } else if ($red_u['status'] == 1) {
                                            echo '<span style="color: red">Neaktivan</span>';
                                        } else {
                                            ?>
                                    <input type="submit" class="btn btn-success" name="dugme_prihvati" value="Prihvati" />
                                    <input type="submit" class="btn btn-danger" name="dugme_odbij" value="Odbij" />
                                            <?php
                                        }
                                    ?>
                                </td>
                        </form>
                        <form action="./azuriraj-ucesnika.php" method="POST">
                                <td>
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj_u" value="Ažuriraj" />
                                    <input type="hidden" name="kor_ime" value="<?php echo $red_u['korisnicko_ime']; ?>" />
                                </td>
                            </tr>
                        </form>
                                <?php
                            }
                        ?>
                    </table>
                    <h2 class="text-center">Organizatori</h2>
                    <table class="table text-center table-bordered">
                        <tr class="align-middle">
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Korisničko ime</th>
                            <th>Lozinka</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Profilna slika</th>
                            <th>Naziv organizacije</th>
                            <th>Adresa</th>
                            <th>Matični broj</th>
                            <th>Status</th>
                            <th>Akcija</th>
                        </tr>
                        <?php
                            $upit_o = "SELECT * FROM korisnici JOIN organizatori ON korisnici.korisnicko_ime=organizatori.korisnicko_ime WHERE tip_korisnika=1";
                            $rezultat_o = mysqli_query($konekcija, $upit_o);
                            
                            while($red_o = mysqli_fetch_assoc($rezultat_o)) {
                                ?>
                        <form action="zahtevi-skripta.php" method="POST">
                            <tr class="align-middle">
                                <td>
                                    <?php echo $red_o['ime']; ?>
                                </td>
                                <td><?php echo $red_o['prezime']; ?></td>
                                <td>
                                    <?php echo $red_o['korisnicko_ime']; ?>
                                    <input type="hidden" name="kor_ime" value="<?php echo $red_o['korisnicko_ime']; ?>" />
                                </td>
                                <td><?php echo $red_o['lozinka']; ?></td>
                                <td><?php echo $red_o['telefon']; ?></td>
                                <td><?php echo $red_o['email']; ?></td>
                                <td><img src="../slike/korisnici/<?php echo $red_o['slika'] ?>" /></td>
                                <td><?php echo $red_o['naziv_organizacije']; ?></td>
                                <td><?php echo $red_o['ulica']." ".$red_o['broj'].", ".$red_o['postanski_broj']." ".$red_o['grad'].", ".$red_o['drzava']; ?></td>
                                <td><?php echo $red_o['maticni_broj']; ?></td>
                                <td>
                                    <?php
                                        if ($red_o['status'] == 2) {
                                            echo '<span style="color: green">Aktivan</span>';
                                        } else if ($red_o['status'] == 1) {
                                            echo '<span style="color: red">Neaktivan</span>';
                                        } else {
                                            ?>
                                    <input type="submit" class="btn btn-success" name="dugme_prihvati" value="Prihvati" />
                                    <input type="submit" class="btn btn-danger" name="dugme_odbij" value="Odbij" />
                                            <?php
                                        }
                                    ?>
                                </td>
                        </form>
                        <form action="./azuriraj-organizatora.php" method="POST">
                                <td>
                                    <input type="submit" class="btn btn-primary" name="dugme_azuriraj_o" value="Ažuriraj" />
                                    <input type="hidden" name="kor_ime" value="<?php echo $red_o['korisnicko_ime']; ?>" />
                                </td>
                            </tr>
                        </form>
                                <?php
                            }
                        ?>
                    </table>
                    <form name="forma_novi_korisnik" action="./novi-korisnik.php" method="POST">
                        <input type="submit" class="btn btn-primary" name="dugme_novi_korisnik" value="Dodaj novog korisnika" />
                    </form>
                    <br />
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
