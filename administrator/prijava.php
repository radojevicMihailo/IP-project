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
                <div class="col-12 menu"></div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <form name="forma_prijava" action="" method="POST">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <h2>Prijava administratora</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class='text-end'>Korisničko ime:</td>
                                <td class='text-start'>
                                    <input type="text" name="kor_ime" />
                                </td>
                            </tr>
                            <tr>
                                <td class='text-end'>Lozinka:</td>
                                <td class='text-start'>
                                    <input type="password" name="lozinka" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" class="btn btn-primary" name="dugme_prijava" value="Prijavi se" />
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
            if (isset($_POST['dugme_prijava'])) {
                if (empty($_POST['kor_ime']) || empty($_POST['lozinka'])) {
                    echo "<span style='color: red'>Niste uneli sva polja</span><br />";
                    echo "<a href='./pocetna.php'>Vrati se na prethodnu stranicu</a>";
                }
                else {
                    $kor_ime = $_POST['kor_ime'];
                    $lozinka = $_POST['lozinka'];

                    include_once '../globalno/konekcija.php';

                    $rezultat = mysqli_query($konekcija, "SELECT * FROM administratori WHERE korisnicko_ime='$kor_ime'");

                    if (mysqli_num_rows($rezultat) > 0) {

                        $red = mysqli_fetch_assoc($rezultat);
                        
                        if ($red['lozinka'] == $lozinka) {
                            session_start();
                            $_SESSION['ulogovan'] = $red['korisnicko_ime'];
                            $_SESSION['korisnik'] = 'administrator';
                            header('Location: ./korisnici.php');
                        } else {
                            echo "<span style='color: red'>Uneli ste pogrešnu lozinku!</span><br />";
                        }
                    } else {
                        echo "<span style='color: red'>Ne postoji administrator sa unetim korisničkim imenom</span><br />";
                    }
                }
            }
        ?>
    </body>
</html>
