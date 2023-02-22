<!DOCTYPE html>
<html>
    <head>
        <title>IP PROJEKAT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
        <link rel="stylesheet" href="stilovi.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 header">
                </div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-12 content text-center">
                    <form name="forma" action="" method="POST">
                        <table class="table text-center table-borderless">
                            <tr>
                                <td colspan="2">
                                    <h2>Promena lozinke</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Stara lozinka:</td>
                                <td class="text-start">
                                    <input type="password" name="stara_lozinka" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Nova lozinka:</td>
                                <td class="text-start">
                                    <input type="password" name="nova_lozinka" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Potvrda nove lozinke:</td>
                                <td class="text-start">
                                    <input type="password" name="potvrda_nove_lozinke" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" name="dugme_promena_lozinke" value="Promeni lozinku" />
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
        <?php
        if (isset($_POST['dugme_promena_lozinke'])) {
            if (empty($_POST['stara_lozinka']) || empty($_POST['nova_lozinka']) || empty($_POST['potvrda_nove_lozinke'])) {
                echo "<span style='color: red'>Niste uneli sva polja</span>";
            } else {
                session_start();
                $kor_ime = $_SESSION['ulogovan'];
                $korisnik = $_SESSION['korisnik'];
                
                include_once './konekcija.php';
                $rezultat = mysqli_query($konekcija, "SELECT * FROM korisnici WHERE korisnicko_ime='".$kor_ime."'");
                $red = mysqli_fetch_assoc($rezultat);
                
                if($_POST['stara_lozinka'] != $red['lozinka']) {
                    echo "<span style='color: red'>Niste uneli dobru staru!</span>";
                } else {
                    if($_POST['nova_lozinka'] != $_POST['potvrda_nove_lozinke']) {
                        echo "<span style='color: red'>Niste ispravno potvrdili lozinku!</span>";
                    } else {
                        $status = mysqli_query($konekcija, "UPDATE korisnici SET lozinka='".$_POST['nova_lozinka']."' WHERE korisnicko_ime='$kor_ime'");
                        if($status) {
                            echo 'Uspešno ste izmenili lozinku!';
                            if($korisnik == 'ucesnik') {
                                header('Location: ../ucesnik/progil.php');
                            } else if ($korisnik == 'organizator') {
                                header('Location: ../organizator/radionice.php');
                            } else {
                                header('Location: ../administrator/korisnici.php');
                            }
                        } else {
                            echo 'Greška!';
                        }
                    }
                }
            }
        }
        ?>
    </body>
</html>