<?php

//$category = CategoryData::getById($_GET["id"]);
$category = CategoryData::delLogic($_GET["id"]);
//delLogic
//$category->del();
Core::alert("Actualizado exitosamente!");
//print "<script>window.location='index.php?view=pacients';</script>";
Core::redir("./index.php?view=categories");


?>