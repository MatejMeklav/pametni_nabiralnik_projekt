<?php
include "komentar.php";
//kontroler za delo z oglasi
class oglasi_controller {

    //akcija, ki uporabniku prikaže vse oglase
  public function index() {

      //s pomočjo statične metode modela, dobimo seznam vseh oglasov
      //$oglasi bodo na voljo v pogledu za vse oglase index.php
    $oglasi = Oglas::vsi();


      //pogled bo oblikoval seznam vseh oglasov v html kodo
    require_once('views/oglasi/index.php');
  }


    //akcija, ki prikaže ene oglas
  public function prikazi() {
     //preverimo, če je uporabnik podal informacijo, o oglasu, ki ga želi pogledati
    if (!isset($_GET['id'])){
        return call('strani', 'napaka'); //če ne, kličemo akcijo napaka na kontrolerju stran
        //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
      }
      //drugače najdemo oglas in ga prikažemo
      $oglas = Oglas::najdi($_GET['id']);

      require_once('views/oglasi/prikazi.php');
    }

    public function prikaziKomentar(){
        if (!isset($_GET['id'])){
            return call('strani', 'napaka'); //če ne, kličemo akcijo napaka na kontrolerju stran
            //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
        }

        $db=mysqli_connect("localhost","root","","vaja2");
        $db->set_charset("UTF8");
        $komentar = Komentar::vrniEnega($db,$_GET['id']);

        $oglas = Oglas::najdi($komentar -> oglas_id);
        $idbool =false;
        if($oglas->user_id == $_SESSION['user_id']){
            $idbool =true;
        }else{
            $idbool =false;
        }
    require_once('views/oglasi/prikaziKomentar.php');
    }

  //akcija za dodajanje oglasov uporabniku prikaže le vmesnik za dodajanje novega oglasa.
    public function dodaj() {
      require_once('views/oglasi/dodaj.php');
    }

    public function uredi(){

      $oglasid=$_GET['id'];
        $oglas = Oglas::najdi($_GET['id']);
        require_once('views/oglasi/uredi.php');
        if(isset($_POST["potrdi"])){
        Oglas::edit($_POST['title'], $_POST['description'],$oglasid);
            require_once('views/oglasi/uspesnoDodal.php');
        }


    }


  //akcija shrani, pričakuje, da bo uporabnik poleg informacije o želeni akciji, preko POST metode, poslal tudi dva podatka - naslov in vsebino
    public function shrani() {

    //tukaj bi morali še preveriti vrednost uporabniškega vnosa glede varnosti in obstoja
      //podatki so bili običajno posali in pogleda dodaj.php, ki ga je naložila akcija dodaj.
        if(isset($_SESSION['user_id'])){
            $oglas=Oglas::dodaj($_POST["naslov"],$_POST["vsebina"],$_SESSION['user_id']);
        }else{
            $oglas=Oglas::dodaj($_POST["naslov"],$_POST["vsebina"],0);
        }


    //ko je oglas dodan, imamo v $oglas podatke o tem novem oglasu
    //uporabniku lahko pokažemo pogled, ki ga bo obvestil o uspešnosti oddaje oglasa
      require_once('views/oglasi/uspesnoDodal.php');
    }



  }