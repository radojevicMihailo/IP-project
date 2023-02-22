<?php
    
    session_start();
    include_once '../globalno/konekcija.php';
    
    if (isset($_POST['dugme_azuriraj'])) {
        echo "usao azuriraj";
        $upit_azuriraj = "UPDATE korisnici SET ime='".$_POST['ime']."', prezime='".$_POST['prezime']."', korisnicko_ime='".$_POST['kor_ime']."', lozinka='".$_POST['lozinka']."', telefon='".$_POST['telefon']."', email='".$_POST['email']."' WHERE korisnicko_ime='".$_SESSION['azuriraj']."'";
        $status_azuriraj = mysqli_query($konekcija, $upit_azuriraj) or die(mysqli_error($konekcija));
        
        if (!empty($_FILES['profilna_slika'])) {
            echo 'usao slika';
            $ime_slike = basename($_FILES['profilna_slika']['name']);
            $temp = $_FILES['profilna_slika']['tmp_name'];
            $folder = "C:/wamp64/www/projekat/slike/korisnici/";
            $putanja = $folder.$ime_slike;
            if(move_uploaded_file($temp, $putanja)) {
                $upit_azuriraj_sliku = "UPDATE korisnici SET slika='$ime_slike' WHERE korisnicko_ime='".$_SESSION['azuriraj']."'";
                $status_azuriraj_sliku= mysqli_query($konekcija, $upit_azuriraj_sliku) or die("Greska1: ".mysqli_error($konekcija)."<br /><a href='./korisnici.php'>Vrati se na prethodnu stranicu</a><br />");
                echo "Uspešan unos podataka u tabelu korisnici<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        header('Location: ./korisnici.php');
    }
    if (isset($_POST['dugme_obrisi'])) {
        $upit_obrisi = "DELETE FROM korisnici WHERE korisnicko_ime='".$_POST['kor_ime']."'";
        $status_obrisi = mysqli_query($konekcija, $upit_obrisi) or die(mysqli_error($konekcija));
        header('Location: ./korisnici.php');
    }
    
?>