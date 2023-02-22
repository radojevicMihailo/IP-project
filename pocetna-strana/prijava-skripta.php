<?php
    if (isset($_POST['dugme_prijava'])) {
        if (empty($_POST['kor_ime']) || empty($_POST['lozinka'])) {
            echo "<span style='color: red'>Niste uneli sva polja</span><br />";
        }
        else {
            $kor_ime = $_POST['kor_ime'];
            $lozinka = $_POST['lozinka'];

            include_once '../globalno/konekcija.php';

            $rezultat = mysqli_query($konekcija, "SELECT * FROM korisnici WHERE korisnicko_ime='$kor_ime'");

            if (mysqli_num_rows($rezultat) > 0) {

                $red = mysqli_fetch_assoc($rezultat);

                if ($lozinka == $red['lozinka']) {
                    if ($red['status'] == 2) {
                        session_start();
                        $_SESSION['ulogovan'] = $red['korisnicko_ime'];

                        if ($red['tip_korisnika'] == "0") {
                            $_SESSION['korisnik'] = 'ucesnik';
                            header('Location: ../ucesnik/profil.php');
                        } else {
                            $_SESSION['korisnik'] = 'organizator';
                            header('Location: ../organizator/radionice.php');
                        }
                    } else if ($red['status']==1) {
                        echo "<span style='color: red'>Administrator Vam je odbio zahtev za registraciju.</span><br />";
                        echo "Možete da koristite sajt kao neregistrovani korisnik.";
                    } else {
                        echo "<span style='color: red'>Administrator Vam još nije aktvirao nalog.</span><br />";
                        echo "Sačekajte da Vam administrator prihvati zahtev za registraciju. U međuvremenu možete da koristite sajt kao neregistrovani korisnik.";
                    }
                } else {
                    echo "<span style='color: red'>Uneli ste pogršnu lozinku!</span><br />";
                }
            } else {
                echo "<span style='color: red'>Ne postoji korisnik sa unetim korisničkim imenom</span><br />";
            }
        }
    }
    if (isset($_POST['dugme_registracija'])) {
        if (empty($_POST['kor_ime']) & empty($_POST['lozinka'])) {
            header('Location: ./registracija.php');
        } else {
            echo "Uneli ste ili korisničko ime ili lozinku. Da li želite da se prijavite ili  da nastavite sa registracijom?<br />";
        }
    }
?>

