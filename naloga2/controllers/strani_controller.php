<?php

//enostaven primer kontrolerja, ki ne uporablja modela
//njegova naloga je, da vrača bolj ali manj statičen html
class strani_controller {
    //akcija domov, ki nastavi vrednosti dveh spremenljivk in jih pripravi (potisne) za pogled (view)
  public function domov() {
   // $username = $_POST['username'];
    //print_r($_POST['username']);
    //$last_name  = 'Ferme';
    if(isset($_SESSION["user_id"])){
     $username= $_SESSION["username"];  

    }else{
      $username= "uporabnik";
    }
    
      //vključimo view
    require_once('views/strani/domov.php');
  }

    //enostavna akcija za napako, ki vkljči samo view
  public function napaka() {
    require_once('views/strani/napaka.php');
  }
}