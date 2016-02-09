<?php
	require_once 'model/PresstamosGateway.php';


	class PrestamosService{
		private $prestamosGateway = NULL;

		private function openDb() {
			if (!mysql_connect("localhost", "root", "")){
				throw new Exception("Error en la conexion con la base de datos");
			}
			if (!mysql_select_db("prestamos")){
				throw new Exception("No se encontro la base de datos");
			}
		}

		private function closeDb(){
        mysql_close();
    	}

    	public function __construct(){
        $this->prestamosGateway = new PrestamosGateway();
    	}

    	public function getAllPrestamos($order){
    		try{
    			$this->openDb;
    			$res = $this->prestamosGateway->selectAll($order);
    			$this->closeDb();
    			return $res;
    		}catch (Exception $e){
    			$this->closeDb();
    			throw $e;
    		}
    	}

    	public function getPrestamo($id){
        try{
            $this->openDb();
            $res = $this->prestamosGateway->selectById($id_persona);
            $this->closeDb();
            return $res;
        }catch (Exception $e){
            $this->closeDb();
            throw $e;
        }
        return $this->prestamosGateway->find($id_persona);
   		}

   		//-----------------------------------------------------------------____________

   		private function validatePrestamosParams( $id_persona, $codigo_art ){
        $errors = array();
        if( !isset($id_persona) || empty($id_persona) ){
            $errors[] = 'se requiere id';
        }
        if( empty($errors) ){
            return;
        }
        throw new ValidationException($errors);
    	}
    
    	public function createNewPrestamo( $id_persona, $codigo_art ) {
	        try {
	            $this->openDb();
	            $this->validatePrestamosParams($id_persona, $codigo_art);
	            $res = $this->prestamosGateway->insert($id_persona, $codigo_art);
	            $this->closeDb();
	            return $res;
	        } catch (Exception $e) {
	            $this->closeDb();
	            throw $e;
	        }
    	}
	}
?>