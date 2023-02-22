<!DOCTYPE html>
<html>
    <head>
        <title>IP PROJEKAT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
        <link rel="stylesheet" href="../globalno/stilovi.css" type="text/css" />
        <script src="../globalno/skripta.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 header"></div>
            </div>
            <div class="row">
                <div class="col-12 menu text-center">
                    <a href="../neregistrovan/aktuelne-radionice.php"><label>Aktuelne radionice</label></a>
                    <label>|</label>
                    <a href="../neregistrovan/top-5.php"><label>Top 5 radionica</label></a>
                    <label>|</label>
                    <a href="./pocetna.php"><label>Prijavi se</label></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 content">
                    <form name="forma_registracija" method="POST" action="./registracija-skripta.php" enctype="multipart/form-data">
                        <table class="table table-borderless">
                            <tr>
                                  <td colspan="2" class="text-center"><h2>Registracija korisnika</h2></td>
                            </tr>
                            <tr>
                              <td class="text-end">Ime:</td>
                              <td class="text-start">
                                  <input type="text" name="ime" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Prezime:</td>
                              <td class="text-start">
                                  <input type="text" name="prezime" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Korisničko ime:</td>
                              <td class="text-start">
                                  <input type="text" name="kor_ime" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Lozinka:</td>
                              <td class="text-start">
                                  <input type="password" name="lozinka" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Potvrdite lozinku:</td>
                              <td class="text-start">
                                  <input type="password" name="potvrda_lozinke" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Kontakt telefon:</td>
                              <td class="text-start">
                                  <input type="text" name="telefon" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Email adresa:</td>
                              <td class="text-start">
                                  <input type="email" name="email" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Izaberite profilnu sliku:</td>
                              <td class="text-start">
                                  <input type="file" name="profilna_slika" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Tip korisnika:</td>
                              <td class="text-start">
                                  <input type="radio" name="tip" value="0" checked />
                                  Učesnik
                                  <input type="radio" name="tip" value="1" />
                                  Organizator
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Naziv organizacije:</td>
                              <td class="text-start">
                                  <input type="text" name="naziv_org" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Država:</td>
                              <td class="text-start">
                                  <input type="text" name="drzava" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Grad:</td>
                              <td class="text-start">
                                  <input type="text" name="grad" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Poštanski broj:</td>
                              <td class="text-start">
                                  <input type="number" name="ptt" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Ulica i broj:</td>
                              <td class="text-start">
                                  <input type="text" name="ulica" />
                                  <input type="text" name="broj" size="5" />
                              </td>
                            </tr>
                            <tr>
                              <td class="text-end">Matični broj organizacije:</td>
                              <td class="text-start">
                                  <input type="number" name="mat_br_org" />
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2" class="text-center">
                                  <input type="button" class="btn btn-primary" name="dugme_registracija" onclick="registracija()" value="Registruj se" />
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