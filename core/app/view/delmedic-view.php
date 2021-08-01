<?php

//$client = MedicData::getById($_GET["id"]);
$category = MedicData::delLogic($_GET["id"]);
//$client->del();
Core::alert("Actualizado exitosamente!");
Core::redir("./index.php?view=medics");

?>