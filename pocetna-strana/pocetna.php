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
                                    <h2>Prijava korisnika</h2>
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
                                    <input type="submit" class="btn btn-success" name="dugme_registracija" value="Registruj se" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="./zaboravljena-lozinka.php"><label>Zaboravili ste lozinku?</label></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="../neregistrovan/aktuelne-radionice.php"><label>Koristite sajt kao neregistrovani korisnik.</label></a>
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
            include_once './prijava-skripta.php';
        ?>
    </body>
</html>