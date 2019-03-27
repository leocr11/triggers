<h1 class="page-header">
    <?php echo $producto->id != null ? $producto->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=producto">producto</a></li>
  <li class="active"><?php echo $producto->id != null ? $producto->prd_nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=producto&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $producto->id; ?>" />
      <div class="form-group">
        <label>DNI</label>
        <input type="text" name="dni" value="<?php echo $producto->dni; ?>" class="form-control" placeholder="Ingrese su dni" required>
    </div>
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $producto->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $producto->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" required>
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="email" name="Correo" value="<?php echo $producto->prd_; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required>
    </div>
     <div class="form-group">
        <label>foto</label>
        <input type="text" name="telefono" value="<?php echo $producto->prd_medio; ?>" class="form-control" placeholder="Ingrese su telefono" required>
    </div>
        
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>