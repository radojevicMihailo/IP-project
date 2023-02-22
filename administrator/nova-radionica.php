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
                <div class="col-12 content text-center">
                    <form name="forma_dodaj_radionicu" method="POST" action="./nova-radionica-skripta.php" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="text-center"><h2>Dodaj radionicu</h2></td>
                            </tr>
                            <tr>
                                <td class="text-end">Naziv:</td>
                                <td class="text-start">
                                    <input type="text" name="naziv_rad" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Korisničko ime organizatora:</td>
                                <td class="text-start">
                                    <input type="text" name="kor_ime_org" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Datum održavanja:</td>
                                <td class="text-start">
                                    <input type="text" name="datum_rad" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Mesto održavanja:</td>
                                <td class="text-start">
                                    <input type="text" name="mesto_rad" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Kratak opis:</td>
                                <td class="text-start">
                                    <textarea rows="3" cols="40" name="k_opis"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Glavna slika:</td>
                                <td class="text-start">
                                    <input type="file" name="glavna_slika" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Duži opis:</td>
                                <td class="text-start">
                                    <textarea rows="8" cols="40" name="d_opis"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Galerija slika:</td>
                                <td class="text-start">
                                    <input type="file" name="slika1" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-start">
                                    <input type="file" name="slika2" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-start">
                                    <input type="file" name="slika3" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-start">
                                    <input type="file" name="slika4" />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-start">
                                    <input type="file" name="slika5" />
                                </td>
                            </tr>
                            <tr>
                                <td class="text-end">Maksimalan broj učesnika:</td>
                                <td class="text-start">
                                    <input type="text" name="br_ucesnika" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" class="btn btn-primary" name="dugme_dodaj_radionicu" value="Dodaj radionicu" />
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