<?php
include "models/odpiranje.php";
include "models/Najem.php";
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

    public function seznam() {
        //pridobimo vse nabiralnike
        //$nabiralniki = Nabiralnik::vsi();

        require_once('views/paketniki/seznam.php');
      }

      public function prikazi_dostope(){

        $dostopi = Odpiranje::vrniVseZidUporabnika($_SESSION['uporabnik_id']);
          require_once('views/paketniki/dnevnikDostopa.php');

      }

      public function dodajNabiralnik(){

            if(isset($_POST['poslji'])){
                $od=$_POST["od"];
                $do=$_POST["do"];
                $nabiralnik=Nabiralnik::dodaj($_POST['id'],$_POST["ime"]);
                $id_nabiralnik= $nabiralnik-> id;
                $id_uporabnik=$nabiralnik -> id_uporabnik;
                Najem::insert($id_nabiralnik,$id_uporabnik, $od, $do);
                require_once('views/strani/dodajanjePaketnika.php');

            }else{
                require_once('views/paketniki/nabiralnikDodaj.php');
            }
      }
}
?>