<?php
include "models/nabiralnik.php";
//vstopna točka v našo spletno stran.
//vse zahteve bodo šle neposredno preko te datoteke
//ponvadi v našem spletnem strežniku celo onemogočimo, da bi uporabnik zahteval ostale php datoteke neposredno
//to dovolimo le uporabniškem računu, pod katerim se na strežniku izvaja php

//dodamo statični razred, za povezovanje s podatkovno bazo
require_once('connection.php');

if(isset($_POST['data'])){
    $data=$_POST['data'];
    $nabiralnik=Nabiralnik::najdi_ime($data);
    $idNabiralnik=$nabiralnik->id;
    $idUporabnik=$nabiralnik->id_uporabnik;

    $db = Db::getInstance();
//primer query-a s prepared statementom
    if ($stmt = mysqli_prepare($db, "Insert into odpiranje (id_nabiralnik,cas_odpiranja,id_uporabnik) Values (?,now(),?)")) {
        //dodamo parametre po vrsti namesto vprašajev
        //s string, i integer ,d double, b blob
        mysqli_stmt_bind_param($stmt, "ii",$idNabiralnik,$idUporabnik);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
//dobimo nazaj informacijo o ID-ju, ki ga je generiral SQL strežnik
    $id=mysqli_insert_id($db);

}

//razberemo namero uporabnika preko query string parametrov controller in action

if (isset($_GET['controller']) && isset($_GET['action'])) {
	$controller = $_GET['controller'];
	$action     = $_GET['action'];
} else {
  	//če uporabnik ni podal svoje zahteve v pravilni obliki, ga preusmerimo na privzeto akcijo
	$controller = 'strani';
	$action     = 'domov';
}
session_start();

//vključimo layout, torej splošni izgled strani
//v njem, bomo pa vključili usmerjevalnik, ki bo iz spremenljivk $controller in $action poklical ustrezne funkcije
//opcijsko, bi lahko tukaj vključili kar usmerjevalnik (routes.php) neposredno, in bi v vsak pogled vključevali glavo in nogo
require_once('views/layout.php');
?>