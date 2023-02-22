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
                    <a href="./profil.php"><label>Profil</label></a>
                    <label>|</label>
                    <a href="./postani-organizator.php"><label>Postani organizator</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <br />
                    <h2 class="text-center">Trenutno prijavljene radionice</h2>
                    <?php
                        include_once '../globalno/konekcija.php';
                        session_start();
                        $danas = date("Y-m-d");
                        $upit_prijavljene = "SELECT * FROM radionice JOIN prijave ON radionice.id_radionice=prijave.id_radionice WHERE ki_ucesnika='".$_SESSION['ulogovan']."' AND DATE(radionice.datum)>'".$danas."' AND prijave.odobri=2";
                        $rezultat_prijavljene = mysqli_query($konekcija, $upit_prijavljene);
                        
                        if (mysqli_num_rows($rezultat_prijavljene)>0) {
                            ?>
                    <table  class="table table-bordered text-center">
                        <tr>
                            <th>Naziv</th>
                            <th>Datum</th>
                            <th>Mesto</th>
                            <th>Kratak opis</th>
                            <th>Glavna slika</th>
                            <th></th>
                            <th>Akcija</th>
                        </tr>
                            <?php
                            while ($red_prijavljene = mysqli_fetch_assoc($rezultat_prijavljene)) {
                                ?>
                        <form action="./radionice-skripta.php" method="POST">
                            <tr>
                                <td class="align-middle">
                                    <?php echo $red_prijavljene['naziv']; ?>
                                    <input type="hidden" name="id_rad" value="<?php echo $red_prijavljene['id_radionice']; ?>"
                                </td>
                                <td class="align-middle"><?php echo $red_prijavljene['datum']; ?></td>
                                <td class="align-middle"><?php echo $red_prijavljene['mesto']; ?></td>
                                <td class="align-middle"><?php echo $red_prijavljene['kratak_opis']; ?></td>
                                <td><img src="../slike/radionice/glavne-slike/<?php echo $red_prijavljene['slika_glavna'] ?>" /></td>
                                <td class="align-middle"><input type="submit" class="btn btn-info" name="d_detalji" value="Detalji" /></td>
                                <td class="align-middle"><input type="submit" class="btn btn-secondary" name="povuci_prijavu" value="Povuci prijavu" /></td>
                            </tr>
                        </form>
                                <?php
                            }
                            ?>
                    </table>
                            <?php
                        } else {
                            echo '<h5 class="text-center">Trenutno nemate prijavljene radionice.</h5>';
                        }
                    ?>
                    <br />
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
                                <th class="align-middle">Mesto</th>
                                <th class="align-middle">Kratak opis</th>
                                <th class="align-middle">Glavna slika</th>
                                <th></th>
                            </form>
                        </tr>
                        <?php
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
                        <form name="forma_radionice" action="./radionice-skripta.php" method="POST">
                            <tr>
                                <td class="align-middle">
                                    <?php echo $red['naziv']; ?>
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>"
                                </td>
                                <td class="align-middle"><?php echo $red['datum']; ?></td>
                                <td class="align-middle"><?php echo $red['mesto']; ?></td>
                                <td class="align-middle"><?php echo $red['kratak_opis']; ?></td>
                                <td><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                                <td class="align-middle"><input type="submit" class="btn btn-info" name="d_detalji" value="Detalji" /></td>
                            </tr>
                        </form>
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