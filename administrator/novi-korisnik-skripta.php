<?php
    include_once '../globalno/konekcija.php';
    
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $kor_ime = $_POST['kor_ime'];
    $lozinka = $_POST['lozinka'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $tip = $_POST['tip'];
    $naziv_org = $_POST['naziv_org'];
    $maticni_broj = $_POST['mat_br_org'];
    $drzava = $_POST['drzava'];
    $grad = $_POST['grad'];
    $ptt = $_POST['ptt'];
    $ulica = $_POST['ulica'];
    $broj = $_POST['broj'];
    
    $upit1 = "INSERT INTO korisnici(ime, prezime, korisnicko_ime, lozinka, telefon, email, tip_korisnika, status) VALUES('$ime','$prezime','$kor_ime','$lozinka','$telefon','$email',$tip, 2)";
    $rezultat1 = mysqli_query($konekcija, $upit1) or die("Greska1: ".mysqli_error($konekcija)."<br /><a href='./registracija.php'>Vrati se na prethodnu stranicu</a><br />");
    if($tip == '1') {
        $upit2 = "INSERT INTO organizatori(korisnicko_ime, naziv_organizacije, maticni_broj, drzava, grad, postanski_broj, ulica, broj) VALUES('$kor_ime','$naziv_org',$maticni_broj,'$drzava','$grad',$ptt,'$ulica','$broj')";
        $rezultat2 = mysqli_query($konekcija, $upit2) or die("Greška: ".mysqli_error($konekcija)."<br /><a href='./registracija.php'>Vrati se na prethodnu stranicu</a><br />");
    }
    
    if (!empty($_FILES['profilna_slika'])) {
        $ime_slike = basename($_FILES['profilna_slika']['name']);
        $ekstenzija = $_FILES['profilna_slika']['type'];
        $temp = $_FILES['profilna_slika']['tmp_name'];

        $tipovi = array('image/jpg', 'image/png', 'image/jpeg');

        $flag = true;

        if(!in_array($ekstenzija, $tipovi)) {
            echo "Ova ekstenzija nije podržana. Podržani su: jpeg, png, jpg.<br />";
            echo "<a href='./novi-korisnik.php'>Vrati se na prethodnu stranicu</a><br />";
            $fleg = false;
        }

        list($sirina, $visina, $tip) = getimagesize($temp);

        if($sirina > 300 || $visina > 300) {
            echo 'Slika je veće veličine nego što je dozvoljeno! Maksimalna veličina je 300x300 px<br />';
            echo "<a href='./novi-korisnik.php'>Vrati se na prethodnu stranicu</a><br />";
            $fleg = false;
        } else if($sirina < 100 || $visina < 100) {
            echo 'Slika je manje veličine nego što je dozvoljeno! Minimalna veličina je 100x100 px<br />';
            echo "<a href='./novi-korisnik.php'>Vrati se na prethodnu stranicu</a><br />";
            $fleg = false;
        }

        $folder = "C:/wamp64/www/projekat/slike/korisnici/";
        $putanja = $folder.$ime_slike;
        if($flag) {
            if(move_uploaded_file($temp, $putanja)) {
                $upit_slika = "UPDATE korisnici SET slika='$ime_slike' WHERE korisnicko_ime='".$kor_ime."'";
                $status_slika = mysqli_query($konekcija, $upit_slika) or die(mysqli_error($konekcija));
            } else {
                echo 'Neuspešan unos podataka u bazu<br />';
                echo "<a href='./novi-korisnik.php'>Vrati se na prethodnu stranicu</a><br />";
            }
        } else {
            echo 'Došlo je do greške! Pokušajte ponovo.<br />';
            echo "<a href='./novi-korisnik.php'>Vrati se na prethodnu stranicu</a><br />";
        }
    }
    header('Location: ./korisnici.php');
    
?>

