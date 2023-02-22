<?php

    include_once '../globalno/konekcija.php';
    session_start();
    
    if (isset($_POST['dugme_otkazi'])) {
        $upit_mejl = "SELECT korisnici.email, radionice.naziv FROM prijave JOIN korisnici ON prijave.ki_ucesnika=korisnici.korisnicko_ime JOIN radionice ON radionice.id_radionice=prijave.id_radionice WHERE prijave.id_radionice=".$_SESSION['azuriraj'];
        $rezultat_mejl = mysqli_query($konekcija, $upit_mejl);
        while ($red_mejl = mysqli_fetch_assoc($rezultat_mejl)) {
            $za = $red_mejl['email'];
            $naslov = "Otkazivanje radionice ".$red_mejl['naziv'];
            $poruka = "Poštovani, radionica ".$red_mejl['naziv'].", koju ste prijavili, je otkazana.";
            $povratna = mail($za, $naslov, $poruka);
            if($povratna==true) {
                echo "Poruka je uspesno poslata";
            } else {
                echo 'Poruka nije uspesno poslata';
            }
        }
        $upit_otkazi = "DELETE FROM radionice WHERE id_radionice=".$_SESSION['azuriraj'];
        $status_otkazi = mysqli_query($konekcija, $upit_otkazi);
        header('Location: ./radionice.php');
    }
    if(isset($_POST['dugme_azuriraj'])) {
        $upit_azuriraj = "UPDATE radionice SET naziv='".$_POST['naziv_rad']."', datum='".$_POST['datum_rad']."', mesto='".$_POST['mesto_rad']."', kratak_opis='".$_POST['k_opis']."', duzi_opis='".$_POST['d_opis']."', max_br_ucesnika=".$_POST['br_ucesnika']." WHERE id_radionice=".$_SESSION['azuriraj'];
        $status_azuriraj = mysqli_query($konekcija, $upit_azuriraj);
        
        if (!empty($_FILES['glavna_slika'])) {
            $ime_glavne_slike = basename($_FILES['glavna_slika']['name']);
            $temp_glavna = $_FILES['glavna_slika']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/glavne-slike/";
            $putanja_glavna = $folder.$ime_glavne_slike;
            
            if(move_uploaded_file($temp_glavna, $putanja_glavna)) {
                $upit_gs = "UPDATE radionice SET slika_glavna='".$ime_glavne_slike."' WHERE id_radionice=".$_SESSION['azuriraj'];
                $status_gs = mysqli_query($konekcija, $upit_gs) or die("Greska: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu radionice<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        if (!empty($_FILES['slika1'])) {
            echo 'Usao u sliku 1.';
            $ime_slike1 = basename($_FILES['slika1']['name']);
            $temp1 = $_FILES['slika1']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/galerije/";
            $putanja1 = $folder.$ime_slike1;
            
            if(move_uploaded_file($temp1, $putanja1)) {
                echo $ime_slike1;
                $upit1 = "UPDATE slike SET link_putanje='".$ime_slike1."' WHERE id_slike='".$_POST['id_s1']."'";
                $status1 = mysqli_query($konekcija, $upit1) or die("Greska: ".mysqli_error($konekcija)."<br />");
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        if (!empty($_FILES['slika2'])) {
            echo 'Usao u sliku 2.';
            $ime_slike2 = basename($_FILES['slika2']['name']);
            $temp2 = $_FILES['slika2']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/galerije/";
            $putanja2 = $folder.$ime_slike2;
            
            if(move_uploaded_file($temp2, $putanja2)) {
                echo $ime_slike2;
                echo $_POST['id_s2'];
                $upit2 = "UPDATE slike SET link_putanje='".$ime_slike2."' WHERE id_slike=".$_POST['id_s2'];
                $status2 = mysqli_query($konekcija, $upit2) or die("Greska: ".mysqli_error($konekcija)."<br />");
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        if (!empty($_FILES['slika3'])) {
            $ime_slike3 = basename($_FILES['slika3']['name']);
            $temp3 = $_FILES['slika3']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/galerije/";
            $putanja3 = $folder.$ime_slike3;
            
            if(move_uploaded_file($temp3, $putanja3)) {
                $upit3 = "UPDATE slike SET link_putanje='".$ime_slike3."' WHERE id_slike='".$_POST['id_s3']."'";
                $status3 = mysqli_query($konekcija, $upit3) or die("Greska: ".mysqli_error($konekcija)."<br />");
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        if (!empty($_FILES['slika4'])) {
            $ime_slike4 = basename($_FILES['slika4']['name']);
            $temp4 = $_FILES['slika4']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/galerije/";
            $putanja4 = $folder.$ime_slike4;
            
            if(move_uploaded_file($temp4, $putanja4)) {
                $upit4 = "UPDATE slike SET link_putanje='".$ime_slike4."' WHERE id_slike='".$_POST['id_s4']."'";
                $status4 = mysqli_query($konekcija, $upit4) or die("Greska: ".mysqli_error($konekcija)."<br />");
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        if (!empty($_FILES['slika5'])) {
            $ime_slike5 = basename($_FILES['slika5']['name']);
            $temp5 = $_FILES['slika5']['tmp_name'];
            
            $folder = "C:/wamp64/www/projekat/slike/radionice/galerije/";
            $putanja5 = $folder.$ime_slike5;
            
            if(move_uploaded_file($temp5, $putanja5)) {
                $upit5 = "UPDATE slike SET link_putanje='".$ime_slike5."' WHERE id_slike='".$_POST['id_s5']."'";
                $status5 = mysqli_query($konekcija, $upit5) or die("Greska: ".mysqli_error($konekcija)."<br />");
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        header('Location: ./radionice.php');
    }

?>

