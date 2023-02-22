<?php
    
    include_once '../globalno/konekcija.php';
    session_start();
    if (isset($_POST['dugme_azuriraj'])) {
        echo 'Usao<br />';

        $upit_azuriraj = "UPDATE korisnici SET ime='".$_POST['ime']."', prezime='".$_POST['prezime']."', telefon='".$_POST['telefon']."', email='".$_POST['email']."' WHERE korisnicko_ime='".$_SESSION['ulogovan']."'";
        $status_azuriraj = mysqli_query($konekcija, $upit_azuriraj) or die("Greška: ".mysqli_error($konekcija));

        echo 'Uspesno azuriran<br />';

        if(!empty($_FILES['profilna_slika'])) {
            echo 'Usao slika<br />';
            $ime_slike = basename($_FILES['profilna_slika']['name']);
            $ekstenzija = $_FILES['profilna_slika']['type'];
            $temp = $_FILES['profilna_slika']['tmp_name'];

            $tipovi = array('image/jpg', 'image/png', 'image/jpeg');

            $flag = true;

            if(!in_array($ekstenzija, $tipovi)) {
                echo "Ova ekstenzija nije podržana. Podržani su: jpeg, png, jpg.<br />";
                $fleg = false;
            }

            list($sirina, $visina, $tip) = getimagesize($temp);

            if($sirina > 300 || $visina > 300) {
                echo 'Slika je veće veličine nego što je dozvoljeno! Maksimalna veličina je 300x300 px<br />';
                $fleg = false;
            } else if($sirina < 100 || $visina < 100) {
                echo 'Slika je manje veličine nego što je dozvoljeno! Minimalna veličina je 100x100 px<br />';
                $fleg = false;
            }

            $folder = "C:/wamp64/www/projekat/slike/korisnici/";
            $putanja = $folder.$ime_slike;
            if($flag) {
                if(move_uploaded_file($temp, $putanja)) {
                    $upit_slika = "UPDATE korisnici SET slika='".$ime_slike."' WHERE korisnicko_ime='".$_SESSION['ulogovan']."'";
                    $rezultat_slika = mysqli_query($konekcija, $upit_slika) or die("Greška: ".mysqli_error($konekcija));
                    echo "Uspešan unos podataka u tabelu korisnici<br />";
                } else {
                    echo 'Neuspešan unos podataka u bazu<br />';
                }
            } else {
                echo 'Došlo je do greške! Pokušajte ponovo.<br />';
            }
        }
        header('Location: ./profil.php');
    }

?>

