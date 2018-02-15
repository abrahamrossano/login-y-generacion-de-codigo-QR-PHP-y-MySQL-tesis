<?php
class consulta{
	private $sql;
	private $datos= array("nombre"=>"", "ape_p"=>"", "ape_m"=>"","mail"=>"","empresa"=>"","id_user"=>"");

	function consulta($sql){
		$this->sql = $sql;
	}

	function setDatos($dat){
		foreach($this->datos as $k =>$v)
			$this->datos[$k]= $dat[$k];
	}
    
    function getHistorial($usu){
		$query = sprintf("select * from historial inner join usuario on usua=idusuario inner join hospital on id_hospital=idhospital where correo= %s",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getAntecedente($usu){
		$query = sprintf("select antecedente.antecedente, tipo.nombre, antecedente.idantecedentes from antecedente inner join tipo on tipo.idtipo=antecedente.id_tipo inner join usuario on idusuario=id_usuario where correo= %s and antecedente.baja = false",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getInfoUsuario($usu){
		$query = sprintf("select * from datos inner join datousuario on datousuario.id_dato=datos.id_datos inner join usuario on usuario.idusuario=datousuario.id_usuario and correo = %s ",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getUsuarioID($usu){
		$query = sprintf("select idusuario from usuario where correo = %s ",
		GetSQLValueString($usu,"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
	}
    
    function getTipo(){
		$query = "SELECT * FROM tipo ";
		$this->sql->setUtf8();
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if ($this->sql->errorNum==0)
			return $res;
		else
			return array();
    }

	function actEntradas(){
		$query = sprintf("UPDATE user SET nombre = %s, ape_p = %s, ape_m = %s, mail = %s, id_empresa1 = %s WHERE id_user = %s",
			GetSQLValueString($this->datos["nombre"],"text"),
			GetSQLValueString($this->datos["ape_p"],"text"),
			GetSQLValueString($this->datos["mail"],"text"),
			GetSQLValueString($this->datos["empresa"],"int"),
			GetSQLValueString($this->datos["mail"],"text"),
            GetSQLValueString($this->datos["id_user"],"int"));
			$this->sql->setQuery($query);
			$this->sql->query();
			if ($this->sql->errorNum==0) {
				$re = 0;
			} else {
				$re = 1;
			}

		return $re;
	}

	function eliLog($usu){
		$query = sprintf("UPDATE login SET baja = true WHERE id = %s ",
        GetSQLValueString($usu,"int"));
        $this->sql->setQuery($query);
        $this->sql->query();
		if ($this->sql->errorNum==0) {
			$re = 0;
		} else {
			$re = 1;
		}

		return $res;
	}

	function insEntradas(){
		$re = 0;
		//Busamos si el usuario no se sido dado de alta previamente.
		$query= sprintf("SELECT entrada.idEntrada FROM entrada WHERE entrada.titulo = %s AND entrada.baja = false ",
				GetSQLValueString($this->datos["titulo"],"text"));
		$this->sql->setQuery($query);
		$res=$this->sql->loadMatrixAssoc();
		if(count($res) == 0){
			//al no existir se debe insertar el usuario
			$ins = sprintf("INSERT INTO entrada (titulo, texto, archivo, imagen, autor, fechaReg, baja) VALUES (%s, %s, %s, %s, %s, NOW(), false) ",
				GetSQLValueString($this->datos["titulo"],"text"),
				GetSQLValueString($this->datos["texto"],"text"),
				GetSQLValueString($this->datos["archivo"],"text"),
				GetSQLValueString($this->datos["imagen"],"text"),
				GetSQLValueString($this->datos["autor"],"text"));

			$this->sql->setQuery($ins);
			$this->sql->query();

			if ($this->sql->errorNum==0)
				$re = 0;
			else
				$re = 2;

		} else {
			$re = 1;
		}

		return $re;
	}

}

?>
