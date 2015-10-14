<?php

class Configurazione{
	private $dbHost = '';
	private $dbUser = '';
	private $dbPassword = '';
	private $dbName = '';

	public function getDbHost(){
			return($this->dbHost);	
	}
	
	public function getDbUser(){
			return($this->dbUser);	
	}
	
	public function getDbPassword(){
			return($this->dbPassword);	
	}
	
	public function getDbName(){
			return($this->dbName);	
	}
}
?>
