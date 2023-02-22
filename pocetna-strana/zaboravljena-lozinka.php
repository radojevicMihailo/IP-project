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
                                    <h2>Poništavanje lozinke</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Email adresa:</td>
                                <td class="text-start">
                                  <input type="email" name="email" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <input type="submit" class="btn btn-primary" name="dugme_ponisti_lozinku" value="Poništi lozinku" />
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
            if (isset($_POST['dugme_ponisti_lozinku'])) {
                if (empty($_POST['email'])) {
                    echo "<span style='color: red'>Niste uneli polje</span><br />";
                } else {
                    header('Location: ./pocetna.php');
                }
            }
        ?>
    </body>
</html>