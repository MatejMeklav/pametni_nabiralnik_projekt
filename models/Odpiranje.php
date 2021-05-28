<?php


class Odpiranje
{

    public $id;
    public $id_nabiralnik;
    public $cas_odpiranja;
    public $id_uporabnik;

    //konstruktor
    public function __construct($id, $id_nabiralnik, $cas_odpiranja,$id_uporabnik) {
        $this->id = $id;
        $this->id_nabiralnik  = $id_nabiralnik;
        $this->cas_odpiranja = $cas_odpiranja;
        $this->id_uporabnik=$id_uporabnik;
    }

    public static function vrniVseZidUporabnika($id){

        $list = [];
        //dobimo objekt, ki predstavlja povezavo z bazo
        $db = Db::getInstance();
        //izvedemo query
        $result = mysqli_query($db,"SELECT * FROM odpiranje WHERE id_uporabnik='$id'");

//v zanki ustvarjamo nove objekte in jih dajemo v seznam
        while($row = mysqli_fetch_assoc($result)){
            $list[] = new Odpiranje($row['id'], $row['id_nabiralnik'], $row['cas_odpiranja'],$row['id_uporabnik']);
        }

        //vrnemo list objektov/uporabnikov
        return $list;
    }

}