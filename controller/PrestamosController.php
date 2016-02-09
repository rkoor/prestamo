<?php
	require_once 'model/PrestamosService.php';

	class PrestamoController{
		private $prestamosService = NULL;
		public function __construct(){
			$this->prestamosService = new PrestamosService();
		}

		public function redirect($location){
			header('Location: '.$location);
		}

		public function handleRequest(){
			$op = isset($_GET['op'])?$_GET['op']:NULL;
			try{
				if( !$op || $op == 'list' ){
					$this->listPrestamos();
				} elseif ($op == 'new'){
					$this->savePrestamo();
				} elseif ($op == 'delete'){
					$this->deletePrestamo();
				} elseif ($op == 'show') {
					$this->showPrestamo();
				} else {
					$this->showError("Pagina no encontrada", "Pagina para el verbo" .$op."no se encontro" );
				}
			}catch (Exception $e){
				$this->showError("Application error", $e->getMessage());
			}
		}

		public function listPrestamos(){
			$orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
			$prestamos = $this->prestamosService->getAllPrestamos($orderby);
			include 'view/prestamo.php';
		}

		public function savePrestamo(){
			$title = 'nuevo prestamo';

			$id_persona = '';
			$codigo_art = '';

			$errors = array();

			if ( isset ($_POST['from-submitted']) ){
				$id_persona	=isset($_POST['id_persona'])?	$_POST['id_persona']	:NULL;
				$codigo_art	=isset($_POST['codigo_art'])?	$_POST['codigo_art']	:NULL;

				try{
					$this->prestamosService->createNewPrestamo($id_persona, $codigo_art);
					$this->redirect('index.php');
					return;
				} catch (ValidationException $e) {
                $errors = $e->getErrors();
            	}
			}

			include 'view/prestamo-form.php';
		}

		public function deletePrestamo(){
			$id_persona = isset($_GET['id_persona'])?$_GET['id']:NULL;
			if ( !$id_persona ){
				throw new Exception ('Error');
			}
			$this->prestamosService->getPrestamo($id_persona);
			$this->redirect('index.php');
		}

		public function showPrestamo(){
			$id_persona = isset($_GET['id_persona'])?$_GET['id_persona']:NULL;
			if( !$id_persona ){
				throw new Exception("Error Processing Request", 1);
			}
			$prestamo = $this->prestamosService->getPrestamo($id_persona);

			include 'view/contact.php';
		}

		public function showError($title, $message){
			include 'view/error.php';
		}

	}
?>