
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script> 
$(document).ready(function() { 

$(".is_medic_check").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});
});
</script>



<?php $user = UserData::getById($_GET["id"]);?>
<?php $medics = MedicData::getAll();?>
<div class="row">
	<div class="col-md-12">
<div class="card">
  <div class="card-header" data-background-color="blue">
      <h4 class="title">Editar Usuario</h4>
  </div>
  <div class="card-content table-responsive">

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateuser" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
<p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
    <div class="checkbox">
      <label>
        <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
      </label>
    </div>
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Es doctor</label>
    <div class="col-md-6">
    <div class="checkbox">
      <label>
        <input class="is_medic_check" type="checkbox" name="is_medic_check" onchange="valueChanged()" <?php if($user->is_medic){ echo "checked";}?>>      
      </label>
    </div>
    </div> 
  </div>

  
  
  <?php if($user->is_medic){ ?>
  <fieldset class="answer">  
  <div class="form-group" id="answer_check">
    <label for="inputEmail1" class="col-lg-2 control-label" >Medico</label>
    <div class="col-lg-4">
      <select name="id_medic" class="form-control" required>
      <option value="">-- SELECCIONE --</option>
        <?php foreach($medics as $p):?>          
          <option value="<?php echo $p->id; ?>" <?php if($p->id==$user->id_medic){ echo "selected"; }?>><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  </fieldset>
  <?php } elseif(is_null($user->id_medic)) { ?>
    
      <fieldset class="answer">  
      <div class="form-group" id="answer_check">
        <label for="inputEmail1" class="col-lg-2 control-label" >Medico</label>
        <div class="col-lg-4">
          <select name="id_medic" class="form-control" required>
          <option value="">-- SELECCIONE --</option>
            <?php foreach($medics as $p):?>          
              <option value="<?php echo $p->id; ?>"><?php echo $p->id." - ".$p->name." ".$p->lastname; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </fieldset>


  <?php } else { ?>
    <p>Default Content</p>
  <?php } ?>
 

  



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Es administrador</label>
    <div class="col-md-6">
        <div class="checkbox">
    <label>
      <input type="checkbox" name="is_admin" <?php if($user->is_admin){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>
</div>
</div>