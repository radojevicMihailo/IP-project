function registracija() { 
    
    let prazan_str = "";
    let greska = 0;
    
    let reg_lozinka = /^([a-z](?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])(?!.*\s).{7,15})|([A-Z](?=.*\d)(?=.*[^a-zA-Z0-9])(?!.*\s).{7,15})$/;
    
    let ime = document.forma_registracija.ime.value;
    let prezime = document.forma_registracija.prezime.value;
    let kor_ime = document.forma_registracija.kor_ime.value;
    let lozinka = document.forma_registracija.lozinka.value;
    let potvrda_lozinke = document.forma_registracija.potvrda_lozinke.value;
    let telefon = document.forma_registracija.telefon.value;
    let email = document.forma_registracija.email.value;
    let tip = document.forma_registracija.tip.value;
    let naziv_org = document.forma_registracija.naziv_org;
    let adresa_org = document.forma_registracija.adresa_org;
    let mat_br_org = document.forma_registracija.mat_br_org;
    
    if (prazan_str.localeCompare(ime) == 0) {
        alert("Niste uneli ime!");
        greska = 1;
    }
    if (prazan_str.localeCompare(prezime) == 0) {
        alert("Niste uneli prezime!");
        greska = 1;
    }
    if (prazan_str.localeCompare(kor_ime) == 0) {
        alert("Niste uneli korisničko ime!");
        greska = 1;
    }
    if (prazan_str.localeCompare(lozinka) == 0) {
        alert("Niste uneli lozinku!");
        greska = 1;
    }
    if (prazan_str.localeCompare(potvrda_lozinke) == 0) {
        alert("Niste potvrdili lozinku!");
        greska = 1;
    }
    if (prazan_str.localeCompare(telefon) == 0) {
        alert("Niste uneli kontakt telefon!");
        greska = 1;
    }
    if (prazan_str.localeCompare(email) == 0) {
        alert("Niste uneli email adresu!");
        greska = 1;
    }
    
    if (!reg_lozinka.test(lozinka)) {
        alert("Lozinka Vam nije ispravnog formata!");
        greska = 1;
    }
    if (lozinka != potvrda_lozinke) {
        alert("Niste ispravno potvrdili lozinku!");
        greska = 1;
    }
    
    if (greska == 0) {
        document.forms["forma_registracija"].submit();
    }
}