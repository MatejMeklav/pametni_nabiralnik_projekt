<?php

//model za oglas, ki vsebuje lasntosti, ki definirajo strukturo uporabnika
//in metode, ki vračajo podatke iz trajne hrambe ali jih tja zapisujejo
//v tem razredu so vse metode statične, lahko pa bi bile tudi običajne, pri čemer bi potrem bilo potrebno vsakič ustvarjat objekt


class Nabiralnik {

    public $id;
    public $id_uporabnik;
    public $ime;


    //konstruktor
    public function __construct($id, $id_uporabnik, $ime) {
        $this->id = $id;
        $this->id_uporabnik  = $id_uporabnik;
        $this->ime = $ime;
    }


    //metoda, ki iz baze vrne vse nabiralnike
    public static function vsi() {
        $list = [];
        //dobimo objekt, ki predstavlja povezavo z bazo
        $db = Db::getInstance();
        //izvedemo query
        $result = mysqli_query($db,'SELECT * FROM nabiralnik');
        //v zanki ustvarjamo nove objekte in jih dajemo v seznam
        while($row = mysqli_fetch_assoc($result)){
            $list[] = new Nabiralnik($row['id'], $row['id_uporabnik'], $row['ime']);
        }

        //vrnemo list objektov/nabiralnikov
        return $list;
    }



    //metoda, ki vrne nabiralnik s specifičnim id-jem iz baze
    public static function najdi($id) {

        $id = intval($id);

        $db = Db::getInstance();
        $result = mysqli_query($db,"SELECT * FROM nabiralnik where id=$id");
        $row = mysqli_fetch_assoc($result);
        return new Nabiralnik($row['id'], $row['id_uporabnik'], $row['ime']);
    }

    public static function najdi_ime($name) {

        $ime =strval($name);
        $db = Db::getInstance();
        $result = mysqli_query($db,"SELECT * FROM nabiralnik where nabiralnik.ime='$ime'");
        $row = mysqli_fetch_assoc($result);
        return new Nabiralnik($row['id'], $row['id_uporabnik'], $row['ime']);
    }


    //metoda, ki doda nov nabiralnik v bazo

    public static function dodaj($id_uporabnik,$ime) {

        $db = Db::getInstance();

        //primer query-a s prepared statementom

        if ($stmt = mysqli_prepare($db, "Insert into nabiralnik (id_uporabnik,ime) Values (?,?)")) {
            //dodamo parametre po vrsti namesto vprašajev
            //s string, i integer ,d double, b blob
            mysqli_stmt_bind_param($stmt, "is",$id_uporabnik,$ime);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        //dobimo nazaj informacijo o ID-ju, ki ga je generiral SQL strežnik
        $id=mysqli_insert_id($db);

        //z uporabo metode najdi, najdemo uporabnika in ga vrnemo controlerju
        return Nabiralnik::najdi($id);
    }

    public static function posodobi($data){
        $db = Db::getInstance();

        if ($stmt = mysqli_prepare($db, "UPDATE nabiralnik SET id_uporabnik=?, ime=? WHERE id=?")) {
            //dodamo parametre po vrsti namesto vprašajev
            //s string, i integer ,d double, b blob
            mysqli_stmt_bind_param($stmt, "isi",$data['$id_uporabnik'],$data['ime'], $data['id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    public static function izbrisi($id){
        $id_nabiralnik = intval($id);
        $db = Db::getInstance();
        $result = mysqli_query($db,"DELETE FROM nabiralnik WHERE id=$id_nabiralnik");
        //result, lahko preverimo uspešnost poizvedbe;
    }



}
?>