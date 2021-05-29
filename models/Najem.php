<?php


class Najem
{

    public $id;
    public $id_uporabnik;
    public $id_nabiralnik;
    public $najem_od;
    public $najem_do;

    //konstruktor
    public function __construct($id, $id_uporabnik, $id_nabiralnik,$najem_od, $najem_do) {
        $this->id = $id;
        $this->id_nabiralnik  = $id_nabiralnik;
        $this->najem_do= $najem_do;
        $this->najem_od= $najem_od;
        $this->id_uporabnik=$id_uporabnik;
    }

    public static function insert($id_nabiralnik, $id_uporabnik, $od, $do){

        $db = Db::getInstance();

        //primer query-a s prepared statementom

        if ($stmt = mysqli_prepare($db, "Insert into najem (id_uporabnik,id_nabiralnik, najem_od, najem_do) Values (?,?,?,?)")) {
            //dodamo parametre po vrsti namesto vprašajev
            //s string, i integer ,d double, b blob
            mysqli_stmt_bind_param($stmt, "iiss",$id_uporabnik,$id_nabiralnik,$od, $do);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        //dobimo nazaj informacijo o ID-ju, ki ga je generiral SQL strežnik
        $id=mysqli_insert_id($db);

    }

}