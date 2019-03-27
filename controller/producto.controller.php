<?php
class ProductoController{	


	private $model;

	public function __CONSTRUCT(){
		$this->model = new producto();
	}

	public function Index(){

		require_once "view/header.php";
		require_once "view/producto/producto.php";
	}
	public function Crud() {

	$cliente = new producto();

		if (isset($_REQUEST ['id'])){
	        $cliente = $this->model->Obtener($_REQUEST['id']);

		}
	require_once 'view/header.php';
	require_once 'view/producto/producto-editar.php';
	}	
	public function Guardar(){
		$producto = new producto();

		$producto->prd_id      	   = $_REQUEST['prd_id'];
		$producto->prd_nombre      = $_REQUEST['prd_nombre'];
		$producto->prd_descripcion = $_REQUEST['prd_descripcion'];
		$producto->prd_medio       = $_REQUEST['prd_medio'];
		$producto->prv_id		   = $_REQUEST['prv_id'];

		if ($_FILES['media']['name']) {
			$foto = date('ymdhis') . '-' . strtolower($_FILES['prv_medio']['name']);
			move_uploaded_file($_FILES['media'], ['tmp_name'], 'uploads/'.$foto);
			$alm->media=$foto;
		}
			
	$producto->prd_id > 0
	? $this->model->Actualizar($producto)
	: $this->model->Registrar($producto);


	header('Location: index.php');

	}
	public function Eliminar()
	{

		$this->model->Eliminarpro($_REQUEST['id']);
		header('Location: index.php');

	}
}	

?>