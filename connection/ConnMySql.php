<?php

namespace connection;

require_once 'envConn/.MySqlConfgiEnv';

class ConnMySql extends \PDO
{
	public function __construct()
	{
		try{
			parent:: __construct(DNS,USER,PASS);
			$this->exec('SET CHARACTER SET utf8');
			$this->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
			$this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}
		catch(\PDOException $e){
			exit('Error en la conexion de datos.' . $e->getMessage());
		}
	}
}