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
                    <a href="../globalno/promena-lozinke.php"><label>Promeni lozinku</label></a>
                    <label>|</label>
                    <a href="../globalno/odjava.php"><label>Odjavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content text-center">
                    <h2>Prijave za Vaše radionice</h2>
                    <table class="table text-center table-bordered">
                        <?php
                            include_once '../globalno/konekcija.php';
                            session_start();
                            $upit = "SELECT * FROM prijave JOIN radionice ON prijave.id_radionice=radionice.id_radionice JOIN korisnici ON prijave.ki_ucesnika=korisnici.korisnicko_ime WHERE radionice.ki_organizacije='".$_SESSION['ulogovan']."'";
                            $rezultat = mysqli_query($konekcija, $upit);
                            if (mysqli_num_rows($rezultat)>0) {
                                ?>
                        <tr>
                            <th>Naziv radionice</th>
                            <th>Ime i prezime učesnika</th>
                            <th>Status</th>
                        </tr>
                                <?php
                                while($red = mysqli_fetch_assoc($rezultat)) {
                                    ?>
                        <form name="forma_prijave" action="./prijave-za-radionice-skripta.php" method="POST">
                            <tr>
                                <td class="align-middle">
                                    <?php echo $red['naziv']; ?>
                                    <input type="hidden" name="id_rad" value="<?php echo $red['id_radionice']; ?>" />
                                </td>
                                <td class="align-middle">
                                    <?php echo $red['ime']." ".$red['prezime']; ?>
                                    <input type="hidden" name="kor_ime" value="<?php echo $red['ki_ucesnika']; ?>" />
                                </td>
                                <td class="align-middle">
                                    <?php
                                        if($red['odobri']==2) {
                                            echo '<span style="color: green">Odobreno</span>';
                                        } elseif ($red['odobri']==1) {
                                            echo '<span style="color: red">Odbijeno</span>';
                                        } else {
                                            ?>
                                    <input type="submit" class="btn btn-success" name="odobri" value="Odobri" />
                                    <input type="submit" class="btn btn-danger" name="odbij" value="Odbij" />
                                            <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                        </form>
                                    <?php
                                }
                            } else {
                                echo 'Ne postoje prijave za Vaše radionice'; 
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