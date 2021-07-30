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
      <h4 class="title">Pacientes</h4>
  </div>
  
  <div class="card-content table-responsive">

  <a href="index.php?view=newpacient" class="btn btn-default"><i class='fa fa-male'></i> Nuevo Paciente</a>

  <form class="form-horizontal" role="form">
  <input type="hidden" name="view" value="pacients">

  <div class="col-lg-2">
		<div class="input-group">
		  <span class="input-group-addon"><i class="fa fa-search"></i></span>
		  <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Busca por Nombre">
		</div>
    </div>

	<div class="col-lg-2">
    <button class="btn btn-primary btn-block">Buscar</button>
    </div>
</form>
	
		<?php

$sql_total_rows = "SELECT COUNT(*) as total_pacients FROM pacient WHERE is_active = 1";
$num_total_rows = array();
$num_total_rows = PacientData::getTotalRows($sql_total_rows);

//if(count($num_total_rows)>0){
	// si hay usuarios
	?>
	<div class="col-lg-8">
	<h2 class="lead"><?php echo $num_total_rows->total_pacients; ?> elementos listados de 6 en 6</h2>
	</div>
	<?php
//}
	
$users= array();
if((isset($_GET["q"]) ) && ($_GET["q"]!="" ) ) {
$sql = "select * from pacient where ";
if($_GET["q"]!=""){
	$sql .= " name like '%$_GET[q]%' ORDER BY name   ";
}
}

if((isset($_GET["q"]) ) && ($_GET["q"]!="" ) ) {
//if($_GET["q"]!=""){
	$users = PacientData::getBySQL($sql);
}
else {
	$users = PacientData::getAll();
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
			<th>Nombre completo</th>
			<th>Direccion</th>
			<th>Email</th>
			<th>Telefono</th>
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
				<td style="width:280px;">
				<a href="index.php?view=pacienthistory&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Historial</a>
				<a href="index.php?view=editpacient&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delpacient&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
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
			echo "<br><br><br><br><p class='alert alert-danger'>No hay pacientes</p>";
		}


		?>


	</div>
</div>