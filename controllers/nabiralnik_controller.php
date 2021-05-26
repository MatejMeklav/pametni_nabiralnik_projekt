<?php

//kontroler za delo z nabiralniki
class nabiralnik_controller {

    public function index() {

        //pridobimo vse nabiralnike
        $nabiralniki = Nabiralnik::vsi();

        //TODO: PRIKAZ
        //require_once('views/oglasi/index.php');
    }

    //akcija, ki prikaže nabiralnik
    public function prikazi() {
        //preverimo, če id obstaja
        if (!isset($_GET['id'])){
            return call('strani', 'napaka'); //vrnemo napako v primeru, da id ne obstaja
            //return prekine izvajanje nadaljnih korakov funkcije
        }
        //najdemo nabiralnik v bazi
        $nabiralnik = Nabiralnik::najdi($_GET['id']);

        //TODO: PRIKAZ
        //require_once('views/oglasi/prikazi.php');
    }

    //dodajanje nabiralnika, prikaz
    public function dodaj() {
        //TODO: Prikaz vmesnika za dodajanje nabiralnika
        //require_once('views/nabiralnik/dodaj.php');
    }

    //akcija shrani, pričakuje, da bo uporabnik poleg informacije o želeni akciji, preko POST metode, poslal tudi dva podatka - id_uporabnika in ime
    public function shrani() {

        //tukaj bi morali še preveriti vrednost uporabniškega vnosa glede varnosti in obstoja
        //podatki so bili običajno posali in pogleda dodaj.php, ki ga je naložila akcija dodaj.
        $nabiralnik=Nabiralnik::dodaj($_POST["id_uporabnik"],$_POST["ime"]);


        //TODO pogled po uspešni shrambi nabiralnika
        //require_once('views/oglasi/uspesnoDodal.php');
    }
}
?>