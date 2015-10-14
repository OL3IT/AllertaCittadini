<?php

/**

 * Telegram Bot Controller.

 * OL3 - Innovation Tecnologies

 * Licenza X11

 */ 

 

	class Connessione{		

		

		private $conn = null;

		

		public function __construct() {

			require_once ("../php/Configurazione.php");

			$configurazione = @new Configurazione;

			

			$DB_host = $configurazione->getDbHost();

			$DB_user = $configurazione->getDbUser();

			$DB_password = $configurazione->getDbPassword();

			$DB_name = $configurazione->getDbName();

			

			

			$cn= @new mysqli($DB_host, $DB_user, $DB_password, $DB_name);

			if (mysqli_connect_errno()){

				$this->conn=null;

				die('Connessione: Non riesco a connettermi a '.$DB_host.': ' .mysqli_connect_error());

			}else{

				$this->conn = $cn;				

			}

			

		}

		

		public function getConnection() {

			return($this->conn);

		}

	}

?>
