<?php

//kontroler za delo z uporabniki
class uporabnik_controller {

  public function index() {

      //pridobimo vse uporabnike
    $uporabniki = Uporabnik::vsi();

      //TODO: PRIKAZ
    //require_once('views/oglasi/index.php');
  }

    //akcija, ki prikaže enega uporabnika
  public function prikazi() {
     //preverimo, če id obstaja
    if (!isset($_GET['id'])){
        return call('strani', 'napaka'); //vrnemo napako v primeru, da id ne obstaja
        //return prekine izvajanje nadaljnih korakov funkcije
      }
      //najdemo uporabnika
      $uporabnik = Uporabnik::najdi($_GET['id']);

    //TODO: PRIKAZ
      //require_once('views/oglasi/prikazi.php');
    }

  //dodajanje uporabnikov, prikaz
    public function dodaj() {
      //TODO: Prikaz vmesnika za dodajanje uporabnika(login form)
      //require_once('views/oglasi/dodaj.php');
    }

    public function registracija(){
        $error = "";
        if(isset($_POST["poslji"])){
            /*
              VALIDACIJA: preveriti moramo, ali je uporabnik pravilno vnesel podatke (unikatno uporabniško ime, dolžina gesla,...)
              Validacijo vnesenih podatkov VEDNO izvajamo na strežniški strani. Validacija, ki se izvede na strani odjemalca (recimo Javascript),
              služi za bolj prijazne uporabniške vmesnike, saj uporabnika sproti obvešča o napakah. Validacija na strani odjemalca ne zagotavlja
              nobene varnosti, saj jo lahko uporabnik enostavno zaobide (developer tools,...).
            */
            //Preveri če se gesli ujemata
            if($_POST["geslo"] != $_POST["ponovi_geslo"]){
                $error = "Gesli se ne ujemata.";
            }
            //Preveri ali uporabniško ime obstaja
            else if(Uporabnik::uporabnik_obstaja($_POST["uporabnisko_ime"])){
                $error = "Uporabniško ime je že zasedeno.";
            }
            //Podatki so pravilno izpolnjeni, registriraj uporabnika

            else if(Uporabnik::registracija($_POST["uporabnisko_ime"], $_POST["geslo"], $_POST["email"])){
                //TODO pogled po registraciji
                //require_once('views/strani/domov.php');
            }
            //Prišlo je do napake pri registraciji
            else{
                $error = "Prišlo je do napake med registracijo uporabnika.";
            }

        }else{
            //TODO: Registracija pogled
           // require_once('views/uporabnik/register.php');
        }


    }

  //akcija shrani, pričakuje, da bo uporabnik poleg informacije o želeni akciji, preko POST metode, poslal tudi dva podatka - naslov in vsebino
    public function shrani() {

    //tukaj bi morali še preveriti vrednost uporabniškega vnosa glede varnosti in obstoja
      //podatki so bili običajno posali in pogleda dodaj.php, ki ga je naložila akcija dodaj.
      $uporabnik=Uporabnik::dodaj($_POST["uporabnisko_ime	"],$_POST["geslo"],$_POST["email"]);

    //ko je oglas dodan, imamo v $oglas podatke o tem novem oglasu
    //uporabniku lahko pokažemo pogled, ki ga bo obvestil o uspešnosti oddaje oglasa
      require_once('views/oglasi/uspesnoDodal.php');
    }

    public function prijava(){

        require_once('views/uporabniki/prijava.php');
    }



  }
  ?>