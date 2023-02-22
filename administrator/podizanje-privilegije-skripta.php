<?php
    
    include_once '../globalno/konekcija.php';
    if (isset($_POST['odobri_rad_u'])) {
        $upit = 
        
        header('Location: ./radionice.php');
    }
    if (isset($_POST['odbij_rad_u'])) {
        $upit_odbij = "UPDATE radionice SET odobrena=1 WHERE id_radionice=".$_POST['id_rad'];
        $status_odbij = mysqli_query($konekcija, $upit_odbij);
        
        header('Location: ./radionice.php');
    }

?>