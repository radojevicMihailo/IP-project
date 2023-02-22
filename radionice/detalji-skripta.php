<?php
    
    include_once '../globalno/konekcija.php';
    session_start();
    if (isset($_GET['dugme_prijava'])) {
        $upit_prijava = "INSERT INTO prijave (id_radionice, ki_ucesnika, odobri, svidjanje) VALUES (".$_SESSION['detalji'].", '".$_SESSION['ulogovan']."', 0, 0)";
        $status_prijava = mysqli_query($konekcija, $upit_prijava);
        if($status_prijava) {
            echo 'Uspesna prijava';
        } else {
            echo 'Neuspesna prijava';
        }
        header('Location: ../ucesnik/radionice.php');
    }

?>