<?php
ob_start();
include "models/oglasi.php";

//kontroler za delo z oglasi
class uporabnik_controller {

    //akcija, ki uporabniku prikaže vse oglase
  public function index() {

      //s pomočjo statične metode modela, dobimo seznam vseh oglasov
      //$oglasi bodo na voljo v pogledu za vse oglase index.php
    $oglasi = Oglas::vsi();

      //pogled bo oblikoval seznam vseh oglasov v html kodo
    require_once('views/oglasi/index.php');
  }

  public function login(){
 
      $data=array();
      if(isset($_POST['username']) && isset($_POST['password']) ){
            
            $uporabnik=Uporabnik::login($_POST['username'],$_POST['password']);
            if($uporabnik){
                $_SESSION['user_id']=$uporabnik->id;
                $_SESSION['admin']=$uporabnik->admin; 
                $_SESSION['username']=$uporabnik->username; 
                $username = $uporabnik -> username;
                require_once('views/strani/domov.php'); 
            }else{
                $data['error']="Uporabnik s tem uporabniškim imenom in geslom ne obstaja";
            }      
      }else{
        require_once('views/uporabnik/login.php'); 
      }
      
    }

    public function logout() {
      session_destroy();
      die();
      
     
    }
    public static function verifyEmail(){
      $access_key='ef1682014b358c5ef6e12e6e8ae1c394';
      $email_address= $_POST["email"];
        $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $validationResult = json_decode($json, true);
        return $validationResult['format_valid'];
    }

    public function register(){
            
      $error = "";
      if(isset($_POST["poslji"])){
        /*
          VALIDACIJA: preveriti moramo, ali je uporabnik pravilno vnesel podatke (unikatno uporabniško ime, dolžina gesla,...)
          Validacijo vnesenih podatkov VEDNO izvajamo na strežniški strani. Validacija, ki se izvede na strani odjemalca (recimo Javascript), 
          služi za bolj prijazne uporabniške vmesnike, saj uporabnika sproti obvešča o napakah. Validacija na strani odjemalca ne zagotavlja
          nobene varnosti, saj jo lahko uporabnik enostavno zaobide (developer tools,...).
        */

          if(!self::verifyEmail()){
              $error = "Email je napačen.";
              require_once('views/uporabnik/register.php');
              exit();
          }
        //Preveri če se gesli ujemata
        if($_POST["password"] != $_POST["repeat_password"]){
          $error = "Gesli se ne ujemata.";
        }
        //Preveri ali uporabniško ime obstaja
        else if(Uporabnik::username_exists($_POST["username"])){
          $error = "Uporabniško ime je že zasedeno.";
        }
        //Podatki so pravilno izpolnjeni, registriraj uporabnika

        else if(Uporabnik::register($_POST["username"], $_POST["password"], $_POST["gender"], $_POST["email"], $_POST["address"], $_POST["post"], $_POST["phone"])){
          require_once('views/strani/domov.php');
        }
        //Prišlo je do napake pri registraciji
        else{
          $error = "Prišlo je do napake med registracijo uporabnika.";
          require_once('views/strani/domov.php');

        }
        
      }else{
        require_once('views/uporabnik/register.php');
      }
     

    }

    public function list() {

      if(!isset($_SESSION['admin']) || $_SESSION['admin'] == 0){
        call('strani', 'napaka');
        die();
      }
      $oglasi = Oglas::vsi();
        $ids = array_fill(0, 100, 0);

        foreach ($oglasi as $oglas){
           $ids[$oglas->user_id]++;

        }
      $uporabniki = Uporabnik::list();


      require_once('views/uporabnik/list.php');
    }

    public function edit() {
      $error = '';
      if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!isset($_POST['username']) || strlen($_POST['username']) == 0) {
          $error .= 'Uporabniško ime je obvezen podatek';
        }

        if(!$error) {
          $uporabnik = Uporabnik::save($_POST);
          // Redirect nazaj na list
        }
      }

      if(isset($_GET['user_id'])) {
        $uporabnik = Uporabnik::get($_GET['user_id']);

        if(!$uporabnik) {
          $error = "Uporabnik z ID-jem ne obstaja";
        }
      } else {
        $error = "Manjkajoč podatek ID-ja uporabnika";
      }

      require_once('views/uporabnik/edit.php');
    }

    public function add() {
      $error = '';
      if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(!isset($_POST['username']) || strlen($_POST['username']) == 0) {
          $error .= 'Uporabniško ime je obvezen podatek<br/>';
        }

        if(!isset($_POST['password']) || strlen($_POST['password']) == 0) {
          $error .= 'Geslo je obvezen podatek<br/>';
        } else {
          if($_POST['password'] != $_POST['password_repeat']) {
            $error .= 'Gesli se ne ujemata<br/>';
          }
        }


        if(!$error) {
          Uporabnik::add($_POST);
          // Redirect nazaj na list
        }
      }

      require_once('views/uporabnik/add.php');
    }

    public function delete() {
      $error = '';
      Uporabnik::delete($_GET['user_id']);
      
    }

    public function profile(){
      $error = '';
      $uporabnik = Uporabnik::get($_SESSION['user_id']);
      if(!$uporabnik) {
        $error = "Uporabnik z ID-jem ne obstaja";

      } else {
      $error = "Manjkajoč podatek ID-ja uporabnika";
    }
      require_once('views/uporabnik/profile.php');
    }

}
ob_end_flush();
?>