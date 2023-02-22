<?php
    
    include_once '../globalno/konekcija.php';
    session_start();
    if (isset($_POST['povuci_svidjanje'])) {
        $upit_povuci = "UPDATE prijave SET svidjanje=0 WHERE ki_ucesnika='".$_SESSION['ulogovan']."' AND id_radionice='".$_POST['idR_s']."'";
        $status_povuci = mysqli_query($konekcija, $upit_povuci) or die("Greska: ". mysqli_error($konekcija));
        header('Location: ./profil.php');
    }
    if (isset($_POST['obrisi_komentar'])) {
        $upit_obrisi = "UPDATE prijave SET komentar='nista' WHERE ki_ucesnika='".$_SESSION['ulogovan']."' AND id_radionice='".$_POST['idR_k']."'";
        $status_obrisi = mysqli_query($konekcija, $upit_obrisi) or die("Greska: ". mysqli_error($konekcija));
        header('Location: ./profil.php');
    }
    if (isset($_POST['azuriraj_komentar'])) {
        if (empty($_POST['novi_komentar'])) {
            echo "Niste uneli novi komentar.";
        } else {
            $upit_azuriraj = "UPDATE prijave SET komentar='".$_POST['novi_komentar']."' WHERE ki_ucesnika='".$_SESSION['ulogovan']."' AND id_radionice=".$_POST['idR_k']."'";
            $status_azuriraj = mysqli_query($konekcija, $upit_azuriraj) or die("Greska: ". mysqli_error($konekcija));
        }
        header('Location: ./profil.php');
    }

?>