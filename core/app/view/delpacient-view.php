<?php
$client = PacientData::delLogic($_GET["id"]);
Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=pacients';</script>";
?>