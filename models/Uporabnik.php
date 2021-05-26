<?php

//model za oglas, ki vsebuje lasntosti, ki definirajo strukturo uporabnika
//in metode, ki vračajo podatke iz trajne hrambe ali jih tja zapisujejo
//v tem razredu so vse metode statične, lahko pa bi bile tudi običajne, pri čemer bi potrem bilo potrebno vsakič ustvarjat objekt


class Uporabnik {
  
  public $id;
  public $uporabnisko_ime;
  public $geslo;
  public $email;

  //konstruktor
  public function __construct($id, $uporabnisko_ime, $geslo,$email) {
    $this->id = $id;
    $this->uporabnisko_ime  = $uporabnisko_ime;
    $this->geslo = $geslo;
    $this->email=$email;
  }


    //metoda, ki iz baze vrne vse uporabnike
  public static function vsi() {
    $list = [];
      //dobimo objekt, ki predstavlja povezavo z bazo
    $db = Db::getInstance();
      //izvedemo query
    $result = mysqli_query($db,'SELECT * FROM uporabnik');

//v zanki ustvarjamo nove objekte in jih dajemo v seznam
    while($row = mysqli_fetch_assoc($result)){
      $list[] = new Uporabnik($row['id'], $row['uporabnisko_ime'], $row['geslo'],$row['email']);
    }
    
    //vrnemo list objektov/uporabnikov
    return $list;
  }



  //metoda, ki vrne enega uporabnika s specifičnim id-jem iz baze
  public static function najdi($id) {

    $id = intval($id);
    
    $db = Db::getInstance();
    $result = mysqli_query($db,"SELECT * FROM uporabnik where id=$id");
    $row = mysqli_fetch_assoc($result);
    return new Uporabnik($row['id'], $row['uporabnisko_ime'], $row['geslo'],$row['email']);
  }
  

    //metoda, ki doda novega uporabnika v bazo

  public static function dodaj($uporabnisko_ime,$geslo,$email) {
    
    $db = Db::getInstance();
    
	  //primer query-a s prepared statementom
      $geslo_sha= sha1($geslo);

    if ($stmt = mysqli_prepare($db, "Insert into Uporabnik (uporabnisko_ime,geslo,email) Values (?,?,?)")) {
			//dodamo parametre po vrsti namesto vprašajev
			//s string, i integer ,d double, b blob
     mysqli_stmt_bind_param($stmt, "sss",$uporabnisko_ime,$geslo_sha,$email);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
   }
   
   //dobimo nazaj informacijo o ID-ju, ki ga je generiral SQL strežnik
   $id=mysqli_insert_id($db);
   
    //z uporabo metode najdi, najdemo uporabnika in ga vrnemo controlerju
   return Uporabnik::najdi($id);
 }


    public static function prijava($uporabnisko_ime, $geslo){
        $db = Db::getInstance();
        $result = mysqli_query($db,"SELECT * FROM uporabnik WHERE uporabnisko_ime='".mysqli_real_escape_string ($db , $uporabnisko_ime)."' AND geslo='".mysqli_real_escape_string ($db , sha1($geslo))."';");

        $row = mysqli_fetch_assoc($result);
        if(!$row){
            return false;
        }else{
            return new Uporabnik($row['id'], $row['uporabnisko_ime'], $row['geslo'],$row['email']);
        }

    }

    public static function registracija($uporabnisko_ime, $geslo, $email){
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $db = Db::getInstance();
        $admin = 0;
        $geslo_sha= sha1($geslo);
        if ($stmt = mysqli_prepare($db, "Insert into Uporabnik (uporabnisko_ime,geslo,email) Values (?,?,?)")) {
            //dodamo parametre po vrsti namesto vprašajev
            //s string, i integer ,d double, b blob
            mysqli_stmt_bind_param($stmt, "sss",$uporabnisko_ime,$geslo_sha,$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

    }

    public static function uporabnik_obstaja ($username){
        $db =Db::getInstance();
        $username = mysqli_real_escape_string($db, $username);
        $result = mysqli_query($db,"SELECT * FROM uporabnik WHERE uporabnisko_ime='".$username."'");
        $row = mysqli_fetch_assoc($result);
        if(!$row){
            return false;
        }else{
            return true;
        }

    }

    public static function posodobi($data){
        $db = Db::getInstance();

        if ($stmt = mysqli_prepare($db, "UPDATE uporabnik SET uporabnisko_ime=?, geslo=?, email=? WHERE id=?")) {
            //dodamo parametre po vrsti namesto vprašajev
            //s string, i integer ,d double, b blob
            mysqli_stmt_bind_param($stmt, "sssi",$data['uporabnisko_ime'],$data['geslo'] , $data['email'], $data['id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    public static function izbrisi($id){
        $id_uporabnik = intval($id);
        $db = Db::getInstance();
        $result = mysqli_query($db,"DELETE FROM uporabnik WHERE id=$id_uporabnik");
        //result, lahko preverimo uspešnost poizvedbe;
    }

}
?>