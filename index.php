<?php

require_once __DIR__ . '/vendor/autoload.php';

use src\Trajet;

include_once('cartes.php');
echo "<center>";
echo "<h2>API TRI DE CARTES D'EMBARQUEMENT </h2><br>";
echo "</center>";
?>
<div style = "width:950px;height:220px;background:#264d00;margin: 0 auto;padding-top:25px;padding-left: 10px;color:white;font-size:16px">
  <?php

  //creer une instance de trajet
$trajet = new Trajet($cartesEmbarquement);

//On peut ajouter autant de trajet à l'aide de la méthode AjouterEmbarquement()
//$trajet->AjouterEmbarquement(array("Depart"=>"depart","Destination"=>"destination","TransportType"=>"type","TransportId"=>"identifiant"))

$trajet->trier();
$trajet->trajetString();
?>
</div>
<?php
echo "<center>";
echo "<p style ='margin:0;color:red;font-size:12px;font-style:italic'>ADAMOU SALIFOU</p><br>";
echo "</center>";
 ?>
