<?php 

class producto
{

private $pdo;

	public $prd_id;
	public $prd_nombre;
	public $prd_descripcion;
	public $prd_medio;
	public $prv_id;

	public function __CONSTRUCT()

	{
		try 
		{
			$this->pdo = Database::StartUp();

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar (producto $data)

    {
    	try
    	{

    		$sql = "INSERT INTO producto (prd_nombre, prd_descripcion, prd_medio, prv_id)
    		VALUES (?, ?, ?, ?, ?)";
    		$this->pdo->prepare($sql)
    		->execute(
    		  	array(		

    		  $data->prd_nombre,
    		  $data->prd_descripcion,
    		  $data->prd_medio,
    		  $data->prv_id,

    		)
    		);

    	}  catch (Exception $e)
    	{
    		  die($e->getMessage());
    	}
    }


    public function Actualizar($data)

    {

    	    	try
    	{

    		$sql = "UPDATE producto SET 
    								 prd_nombre      =?,
    								 prd_descripcion =?, 
    								 prd_medio       =?, 
    								 prv_id      =?

    						WHERE prd_id = ?";		 

    		$this->pdo->prepare($sql)
    		->execute(
    		  	array(		

    		  $data->prd_nombre,     
    		  $data->prd_descripcion,
    		  $data->prd_medio,      
    		  $data->prv_id,
    		)
    		);

    	}  catch (Exception $e)
    	{
    		  die($e->getMessage());
    	}

    }

    public function Obtener($id)
    {

    	try 
    	{

    		$stm = $this->pdo
    					->prepare("SELECT * FROM producto WHERE prd_id = ?");

    					$stm->execute(array($id));
    					return $stm ->fetch(PDO::FETCH_OBJ);
    		
    	}   catch (Exception $e) 
    		{

    			die($e->getMessage());
    		
    		}

    }

    public function Eliminar($id)
    {

   		    	try 
    	{

    		$stm = $this->pdo
    					->prepare("DELETE FROM producto WHERE prd_id = ?");

    					$stm->execute(array($id));
    		
    	}   catch (Exception $e) 
    		{

    			die($e->getMessage());
    		
    		}


    }


}


 ?>