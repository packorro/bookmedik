<div class="row">
	<div class="col-md-12">
<div class="btn-group pull-right">
<!--<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-download"></i> Descargar <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="report/clients-word.php">Word 2007 (.docx)</a></li>
  </ul>
</div>
-->
</div>
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Medicos</h4>
  </div>
  
  <div class="card-content table-responsive">

  <a href="index.php?view=newmedic" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Medico</a>

  <form class="form-horizontal" role="form">
  <input type="hidden" name="view" value="medics">

  <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-search"></i></span>
		  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder=" Busca por Nombre">
		</div>
    </div>

	<div class="col-lg-2">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>
</form>
	
		<?php

$users= array();
if((isset($_GET["q"]) ) && ($_GET["q"]!="" ) ) {
$sql = "select * from medic where ";
if($_GET["q"]!=""){
	$sql .= " name like '%$_GET[q]%' or  lastname like '%$_GET[q]%' and is_active = 1 ORDER BY name   ";
}
}

if((isset($_GET["q"]) ) && ($_GET["q"]!="" ) ) {
//if($_GET["q"]!=""){
	$users = MedicData::getBySQL($sql);
}
else {
	$users = MedicData::getAll();
}


//if($_GET["p"]!=""){
//	$users = PacientData::getByName($_GET[q]);
//}
//else {

//}

		//$users = PacientData::getAll();
		//$users = PacientData::getByName($_GET["name_p"]);
		if(count($users)>0){
			// si hay usuarios
			?>

			<table class="table table-bordered table-hover">
			<thead>
			<th><b>Nombre completo</b></th>
			<th><b>Direccion</b></th>
			<th><b>Email</b></th>
			<th><b>Telefono</b></th>
			<th><b>Area</b></th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->address; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td><?php if($user->category_id!=null){ echo $user->getCategory()->name; } ?></td>
				<td style="width:280px;">
				<a href="index.php?view=medichistory&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Historial</a>
				<a href="index.php?view=editmedic&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delmedic&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs" onClick="return confirm('Esta seguro de eliminar al Medico ?');">Eliminar</a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<br><br><br><br><p class='alert alert-danger'>No hay medicos</p>";
		}


		?>


	</div>
</div>