<?php

    include_once '../globalno/konekcija.php';
    session_start();
    if (isset($_POST['d_detalji'])) {
        $_SESSION['detalji']=$_POST['id_rad'];
        header('Location: ../radionice/detalji.php');
    }
    if (isset($_POST['povuci_prijavu'])) {
        $upit_povuci = "DELETE FROM prijave WHERE id_radionice=".$_POST['id_rad']." AND ki_ucesnika='".$_SESSION['ulogovan']."'";
        $status_povuci = mysqli_query($konekcija, $upit_povuci);
        header('Location: ./radionice.php');
    }

?>