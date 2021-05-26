
<!-- zelo enostaven pogled, ki enostavno izpiše vrednosti spremelnjivk, ki so bile nastavljene v kontrolerju -->
<p>Pozdravljen 
<?php
if(isset($_SESSION['uporabnisko_ime']))
{
    echo $_SESSION['uporabnisko_ime'];
}

?>
</p>