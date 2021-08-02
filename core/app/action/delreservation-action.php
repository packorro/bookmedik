<?php
/**
* BookMedik
* @author evilnapsis
**/
$user = ReservationData::delLogic($_GET["id"]);
//$user->del();
Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=reservations';</script>";

?>