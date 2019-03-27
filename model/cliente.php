<?php 

class cliente
{

private $pdo;

	public $id;
	public $dni;
	public $Nombre;
	public $Apellido;
	public $Correo;
	public $Telefono;

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

			$stm = $this->pdo->prepare("SELECT * FROM cliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar (cliente $data)

    {
    	try
    	{

    		$sql = "INSERT INTO cliente (dni, Nombre, Apellido, Correo, telefono)
    		VALUES (?, ?, ?, ?, ?)";
    		$this->pdo->prepare($sql)
    		->execute(
    		  	array(		

    		  $data->dni,
    		  $data->Nombre,
    		  $data->Apellido,
    		  $data->Correo,
    		  $data->telefono

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

    		$sql = "UPDATE cliente SET dni  = ?,
    								 Nombre = ?,
    								 Apellido =?, 
    								 Correo =? , 
    								 Telefono =?

    						WHERE id = ?";		 

    		$this->pdo->prepare($sql)
    		->execute(
    		  	array(		

    		  $data->dni,
    		  $data->Nombre,
    		  $data->Apellido,
    		  $data->Correo,
    		  $data->telefono,
    		   $data->id

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
    					->prepare("SELECT * FROM cliente WHERE id = ?");

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
    					->prepare("DELETE FROM cliente WHERE id = ?");

    					$stm->execute(array($id));
    		
    	}   catch (Exception $e) 
    		{

    			die($e->getMessage());
    		
    		}


    }


        public function obtaud($id)
    {

    	try 
    	{

    		$stm = $this->pdo
    					->prepare("SELECT * FROM auditoria WHERE id_registro = ?");

    					$stm->execute(array($id));
    					return $stm ->fetch(PDO::FETCH_OBJ);
    		
    	}   catch (Exception $e) 
    		{

    			die($e->getMessage());
    		
    		}

    }

        public function List_aud_insert()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM auditoria WHERE Accion_reg = '1' ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }



        public function List_aud_mod()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM auditoria WHERE Accion_reg = '3' ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


        public function List_aud_eli()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM auditoria WHERE Accion_reg = '2' ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }        


}


 ?>