<?php

    include_once '../globalno/konekcija.php';
    if (isset($_POST['odobri'])) {
        $upit_odobri = "UPDATE prijave SET odobri=2 WHERE ki_ucesnika='".$_POST['kor_ime']."' AND id_radionice='".$_POST['id_rad']."'";
        $status_odobri = mysqli_query($konekcija, $upit_odobri) or die(mysqli_error($konekcija));
        header('Location: ./prijave-za-radionice.php');
    }
    if (isset($_POST['odbij'])) {
        $upit_odbij = "UPDATE prijave SET odobri=1 WHERE ki_ucesnika='".$_POST['kor_ime']."' AND id_radionice='".$_POST['id_rad']."'";
        $status_odbij = mysqli_query($konekcija, $upit_odbij) or die(mysqli_error($konekcija));
        header('Location: ./prijave-za-radionice.php');
    }

?>