<?php

    include_once '../globalno/konekcija.php';
    if (isset($_POST['dugme_prihvati'])) {
        $upit_prihvati = "UPDATE korisnici SET status=2 WHERE korisnicko_ime='".$_POST['kor_ime']."'";
        $status_prihvati = mysqli_query($konekcija, $upit_prihvati);
        
        header('Location: ./korisnici.php');
    }
    if (isset($_POST['dugme_odbij'])) {
        $upit_odbij = "UPDATE korisnici SET status=1 WHERE korisnicko_ime='".$_POST['kor_ime']."'";
        $status_odbij = mysqli_query($konekcija, $upit_odbij);
        
        header('Location: ./korisnici.php');
    }
    if (isset($_POST['dugme_odobri_rad'])) {
        $upit_odobri = "UPDATE radionice SET odobrena=2 WHERE id_radionice=".$_POST['id_rad'];
        $status_odobri = mysqli_query($konekcija, $upit_odobri);
        
        header('Location: ./radionice.php');
    }
    if (isset($_POST['dugme_odbij_rad'])) {
        $upit_odbij = "UPDATE radionice SET odobrena=1 WHERE id_radionice=".$_POST['id_rad'];
        $status_odbij = mysqli_query($konekcija, $upit_odbij);
        
        header('Location: ./radionice.php');
    }
    if (isset($_POST['odobri_rad_u'])) {
        $upit_odobri_u = "UPDATE korisnici SET tip_korisnika=1 WHERE korisnicko_ime='".$_POST['kor_ime']."'";
        $status_odobri_u = mysqli_query($konekcija, $upit_odobri_u) or die(mysqli_error($konekcija));
        
        $upit_dodaj_org = "INSERT INTO organizatori (korisnicko_ime) VALUES ('".$_POST['kor_ime']."')";
        $status_dodaj_org = mysqli_query($konekcija, $upit_dodaj_org) or die(mysqli_error($konekcija));
        
        $upit_odobri = "UPDATE radionice SET odobrena=2 WHERE id_radionice=".$_POST['id_rad'];
        $status_odobri = mysqli_query($konekcija, $upit_odobri) or die(mysqli_error($konekcija));
        
        header('Location: ./radionice.php');
    }

?>