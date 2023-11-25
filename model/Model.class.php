<?php
/*  Model principal, realiza a conexão com o banco
 *  Utilizada por todas Models
 */
class Model
{
	private $con;
	
	function __construct()
	{
		try{
			$this->con = new PDO(SERVIDOR, USUARIO, SENHA);
		}catch( PDOException $Exception ) {
			echo '<pre>';
    		$jsOut = '{ "Msg" : "'.$Exception->getMessage( ).'", "Code" : '.$Exception->getCode() .' }';
			echo $jsOut;
			echo '</pre>';
			die();
		}
	}

	public function getData($sql){
	  	$sql = $this->con->prepare($sql);
      	$sql->execute();
      	return $sql->fetchAll();
	}

	public function getDataEncapsule($sql,$data){
		$sql = $this->con->prepare($sql);
		$sql->execute($data);
		return $sql->fetchAll();
	}

	public function insertData($sql){
		$sql = $this->con->prepare($sql);
		return $sql->execute() == true ? true : false;
	}

	public function insertDataEncapsule($sql,$data){
		$sql = $this->con->prepare($sql);
		return $sql->execute($data) == true ? true : false;
	}

}