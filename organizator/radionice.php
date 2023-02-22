<!DOCTYPE html>
<html>
    <head>
        <title>IP PROJEKAT</title>
        <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
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
                    <a href="./prijave-za-radionice.php"><label>Prijave za radionice</label></a>
                    <label>|</label>
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-6 content text-center">
                    <br />
                    <h2>Pregled radionica</h2>
                    <table class="table text-center table-bordered">
                        <?php
                            include_once '../globalno/konekcija.php';
                            session_start();
                            $upit = "SELECT * FROM radionice";
                            $rezultat = mysqli_query($konekcija, $upit);
                            if (mysqli_num_rows($rezultat)>0) {
                                ?>
                        <tr class="align-middle">
                            <th>Naziv</th>
                            <th>Datum</th>
                            <th>Mesto</th>
                            <th>Kratak opis</th>
                            <th>Glavna slika</th>
                            <th>Duži opis</th>                           
                            <th>Maksimalan broj učesnika</th>
                            <th>Status</th>
                            <th>Akcija</th>
                        </tr>
                                <?php
                                    while($red = mysqli_fetch_assoc($rezultat)) {
                                        ?>
                                <form name="forma_radionice" action="./azuriraj-radionicu.php" method="POST">
                                    <tr>
                                        <td class="align-middle">
                                            <?php echo $red['naziv']; ?>
                                            <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                        </td>
                                        <td class="align-middle"><?php echo $red['datum']; ?></td>
                                        <td class="align-middle"><?php echo $red['mesto']; ?></td>
                                        <td class="align-middle"><?php echo $red['kratak_opis']; ?></td>                                       
                                        <td class="align-middle"><img src="../slike/radionice/glavne-slike/<?php echo $red['slika_glavna'] ?>" /></td>
                                        <td class="align-middle"><?php echo $red['duzi_opis']; ?></td>
                                        <td class="align-middle"><?php echo $red['max_br_ucesnika']; ?></td>
                                        <td class="align-middle">
                                            <?php
                                                if ($red['odobrena'] == 2) {
                                                    echo '<span style="color:green">Odobrena</span>';
                                                } else if ($red['odobrena'] == 1) {
                                                    echo '<span style="color:red">Odbijena</span>';
                                                } else {
                                                    echo 'Na čekanju';
                                                }
                                            ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php
                                                if ($red['ki_organizacije']==$_SESSION['ulogovan']) {
                                                    ?>
                                        <input type="submit" class="btn btn-primary" name="dugme_azuriraj" value="Ažuriraj" />
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </form>
                                <?php
                                    }
                            } else {
                                echo '<h5>Niste organizovali nijednu radionicu.</h5>';
                            }
                        ?>
                        <table class="table table-borderless">
                            <form action="./dodaj-radionicu.php" method="POST">
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-primary" name="d_nova_radionica" value="Dodaj novu radionicu" /></td>
                                    <td></td>
                                </tr>
                            </form>
                            <form action="./sablon-radionice.php" method="POST">
                                <tr>
                                    <td>
                                        Izaberite šablon po kojem želite<br/> da dodate radionicu:
                                    </td>
                                    <td class="align-middle">
                                        <select name="sablon">
                                        <?php
                                            $upit = "SELECT * FROM radionice WHERE ki_organizacije='".$_SESSION['ulogovan']."'";
                                            $rezultat = mysqli_query($konekcija, $upit);
                                            if(mysqli_num_rows($rezultat)>0) {
                                                while($red=mysqli_fetch_assoc($rezultat)) {
                                                    ?>
                                            <option value="<?php echo $red['id_radionice']; ?>"><?php echo $red['naziv']; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                echo '<option value=0>Niste pravili do sada radionice</option>';
                                            }
                                        ?>
                                        </select>
                                    </td>
                                    <td class="align-middle"><input type="submit" class="btn btn-primary" name="d_nova_radionica_sablon" value="Dodaj novu radionicu po šablonu"/></td>
                                </tr>
                            </form>
                        </table>
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