<h1 class="page-header">REGISTROS ELIMINADOS</h1>



    <select 
onchange="location.href=this.options[this.selectedIndex].value"  class="btn btn-primary pull-left"
name="Auditoria" 
size="1">
<option value="#" selected>Elija una accion de auditoria </option>
<option  value="?c=cliente&a=aud_insert">Registrados</option>
<option value="?c=cliente&a=aud_elim">Eliminados</option>
<option value="?c=cliente&a=aud_mod">Editados</option>

</select>

<a href="index.php" class="btn btn-primary pull-right"> Regresar </a>

<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">Id registro</th>
            <th style="width:180px; background-color: #5DACCD; color:#fff">Usuario</th>
            <th style="width:120px;  background-color: #5DACCD; color:#fff">Fecha</th>
            <th style="width:100px; background-color: #5DACCD; color:#fff">DNI</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">Nombre</th>            
            <th style="width:60px; background-color: #5DACCD; color:#fff">Apellido</th>
            <th style="width:60px; background-color: #5DACCD; color:#fff">Correo</th>
            <th style="width:60px; background-color: #5DACCD; color:#fff">Telefono</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->model->List_aud_eli() as $r): ?> 
        <tr>
            <td><?php echo $r->Id_registro; ?></td>
            <td><?php echo $r->Usuario_reg; ?></td>
            <td><?php echo $r->Fecha_reg; ?></td>        
            <td><?php echo $r->dni_reg; ?></td>
            <td><?php echo $r->Nombre_reg; ?></td>  
            <td><?php echo $r->Apellido_reg; ?></td>
            <td><?php echo $r->Correo_reg; ?></td> 
             <td><?php echo $r->Telefono_reg; ?></td>     

        </tr>

    <?php endforeach; ?>

    </tbody>
    </table>


    <script source="assets/js/datatable.js"></script>