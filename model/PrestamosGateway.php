<?php
	class PrestamosGateway{
		public function selectAll($order){
			if ( !isset($order) ){
				$order = 'id_persona';
			}
			$dbOrder	= mysql_real_escape_string($order);
			$dbres		= mysql_query("SELECT * FROM prestamo ORDER BY $dbOrder ASC");

			$prestamos = array();
			while( ($obj = mysql_fetch_object($dbres))!=NULL){
				$prestamos[] = $obj;
			}

			return $prestamos;
		}

		public function selectById($id_persona){
			$dbIdPersona = mysql_real_escape_string($id_persona);
        
	        $dbres = mysql_query("SELECT * FROM contacts WHERE id=$dbId");
	        
	        return mysql_fetch_object($dbres);
		}

		public function insert($id_persona, $codigo_art){
			$dbIdPersona	= ($id_persona != NULL)?"'".mysql_real_escape_string($id_persona)."'":'NULL';
			$dbCodArt 		= ($codigo_art != NULL)?"'".mysql_real_escape_string($codigo_art)."'":'NULL';

			mysql_query("INSERT INTO prestamo (id_persona, codigo) VALUES ($id_persona, $codigo_art)");
        	
        	return mysql_insert_id();
		}

		public function delete($id_persona) {
	        $dbId = mysql_real_escape_string($id_persona);
	        mysql_query("DELETE FROM cprestamo WHERE id_persona=$dbId");
    	}
	}
?>