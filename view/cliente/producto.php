<h1 class="page-header">CRUD con el patrón MVC - Arquitectura </h1>


    <a class="btn btn-primary pull-right" href="?c=cliente&a=Crud"  >Agregar</a>

    <select 
onchange="location.href=this.options[this.selectedIndex].value"  class="btn btn-primary pull-left"
name="Auditoria" 
size="1">
<option value="cliente/cliente.php" selected>Elija una accion de auditoria </option>
<option  value="?c=cliente&a=aud_insert">Registrados</option>
<option value="?c=cliente&a=aud_elim">Eliminados</option>
<option value="?c=cliente&a=aud_mod">Editados</option>

</select>
<select 
onchange="location.href=this.options[this.selectedIndex].value"  class="btn btn-primary pull-left"
name="Auditoria" 
size="1">
<option value="cliente/cliente.php" selected>producto </option>
<option  value="?c=producto&a=listar">consulta</option>

</select>
    

<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">DNI</th>
            <th style="width:180px; background-color: #5DACCD; color:#fff">Nombre</th>
            <th style="width:120px;  background-color: #5DACCD; color:#fff">Apellido</th>
            <th style="width:100px; background-color: #5DACCD; color:#fff">Correo</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">Telefono</th>            
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->model->Listar() as $r): ?> 
        <tr>
            <td><?php echo $r->dni; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>        
            <td><?php echo $r->Correo; ?></td>
            <td><?php echo $r->Telefono; ?></td>  
            <td> <a class="btn btn-warning"href="?c=cliente&a=Crud&id=<?php echo $r->id; ?>">EDITAR</a> </td>
            <td> <a class="btn btn-danger"onclick="javascript : return confirm('Seguro que desea eliminar este usuario??');"  href="?c=cliente&a=Eliminar&id=<?php echo $r->id; ?>">ELIMINAR</a></td>

        </tr>

    <?php endforeach; ?>

    </tbody>
    </table>


    <script source="assets/js/datatable.js"></script>

    

     