<?php

    include_once '../globalno/konekcija.php';
    if (isset($_POST['dugme_dodaj_radionicu'])) {
        if(empty($_POST['naziv_rad'])||empty($_POST['datum_rad'])||empty($_POST['mesto_rad'])||empty($_POST['k_opis'])||empty($_POST['d_opis'])||empty($_POST['br_ucesnika'])) {
            echo "<span style='color: red'>Niste uneli sva polja</span><br />";
        }
        else {
            $kor_ime = $_POST['kor_ime_org'];
            $naziv = $_POST['naziv_rad'];
            $datum = $_POST['datum_rad'];
            $mesto = $_POST['mesto_rad'];
            $k_opis = $_POST['k_opis'];
            $d_opis = $_POST['d_opis'];
            $br_ucesnika = $_POST['br_ucesnika'];

            $ime_glavne_slike = basename($_FILES['glavna_slika']['name']);
            $temp_glavna = $_FILES['glavna_slika']['tmp_name'];

            $ime_slike1 = basename($_FILES['slika1']['name']);
            $temp_slika1 = $_FILES['slika1']['tmp_name'];
            $ime_slike2 = basename($_FILES['slika2']['name']);
            $temp_slika2 = $_FILES['slika2']['tmp_name'];
            $ime_slike3 = basename($_FILES['slika3']['name']);
            $temp_slika3 = $_FILES['slika3']['tmp_name'];
            $ime_slike4 = basename($_FILES['slika4']['name']);
            $temp_slika4 = $_FILES['slika4']['tmp_name'];
            $ime_slike5 = basename($_FILES['slika5']['name']);
            $temp_slika5 = $_FILES['slika5']['tmp_name'];

            $folder = "C:/wamp64/www/projekat/slike/radionice";
            $putanja_glavna = $folder."/glavne-slike/".$ime_glavne_slike;
            $putanja_galerije = $folder."/galerije/";
            $putanja_slike1 = $putanja_galerije.$ime_slike1;
            $putanja_slike2 = $putanja_galerije.$ime_slike2;
            $putanja_slike3 = $putanja_galerije.$ime_slike3;
            $putanja_slike4 = $putanja_galerije.$ime_slike4;
            $putanja_slike5 = $putanja_galerije.$ime_slike5;

            $trenutak = date("Y-m-d");

            include_once '../globalno/konekcija.php';

            if(move_uploaded_file($temp_glavna, $putanja_glavna)) {
                $upit = "INSERT INTO radionice(naziv, datum, mesto, kratak_opis, slika_glavna, duzi_opis, max_br_ucesnika, ki_organizacije, odobrena) VALUES ('$naziv','$datum','$mesto','$k_opis','$ime_glavne_slike','$d_opis','$br_ucesnika','$kor_ime', 2)";
                $rezultat = mysqli_query($konekcija, $upit) or die("Greska: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu radionice<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }

            $upit_pom = "SELECT * FROM radionice WHERE naziv='$naziv' AND datum='$datum' AND mesto='$mesto'";
            $rezultat_pom = mysqli_query($konekcija, $upit_pom);
            $red_pom = mysqli_fetch_assoc($rezultat_pom);
            $id_rad = $red_pom['id_radionice'];

            if(move_uploaded_file($temp_slika1, $putanja_slike1)) {
                $upit1 = "INSERT INTO slike(link_putanje, datum_upload, id_radionice) VALUES ('$ime_slike1','$trenutak','$id_rad')";
                $rezultat1 = mysqli_query($konekcija, $upit1) or die("Greska1: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu slike<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
            if(move_uploaded_file($temp_slika2, $putanja_slike2)) {
                $upit2 = "INSERT INTO slike(link_putanje, datum_upload, id_radionice) VALUES ('$ime_slike2','$trenutak','$id_rad')";
                $rezultat2 = mysqli_query($konekcija, $upit2) or die("Greska2: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu slike<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
            if(move_uploaded_file($temp_slika3, $putanja_slike3)) {
                $upit3 = "INSERT INTO slike(link_putanje, datum_upload, id_radionice) VALUES ('$ime_slike3','$trenutak','$id_rad')";
                $rezultat3 = mysqli_query($konekcija, $upit3) or die("Greska3: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu slike<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
            if(move_uploaded_file($temp_slika4, $putanja_slike4)) {
                $upit4 = "INSERT INTO slike(link_putanje, datum_upload, id_radionice) VALUES ('$ime_slike4','$trenutak','$id_rad')";
                $rezultat4 = mysqli_query($konekcija, $upit4) or die("Greska4: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu slike<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
            if(move_uploaded_file($temp_slika5, $putanja_slike5)) {
                $upit5 = "INSERT INTO slike(link_putanje, datum_upload, id_radionice) VALUES ('$ime_slike5','$trenutak','$id_rad')";
                $rezultat5 = mysqli_query($konekcija, $upit5) or die("Greska5: ".mysqli_error($konekcija)."<br />");
                echo "Uspešan unos podataka u tabelu slike<br />";
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
            }
        }
        header('Location: ./radionice.php');
    }
        
 ?>