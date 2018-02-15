<?php include_once('JLog.php');

class database {
	public $sql = "";
	public $id;
	public $errorNum = 0;
	public $errorMsg = "";
	public $pos;
	private $rows= 0;
	private $cod ="";

	function database($host,$user,$passwd,$db,$cod="utf8")
	{
		if (!function_exists( 'mysqli_connect' ))
		{
			die('El soporte de MySQLi no esta disponible, intente m&aacute;s tarde');
		}
		if(!($this->id = mysqli_connect($host,$user,$passwd,$db)))
		{
			die('No se pudo conectar con la base de datos, intente m&aacute;s tarde');
		}
		/*if(!mysqli_select_db($db))
		{
			die('No se encontro la base de datos, intente m&aacute;s tarde');
		}	*/

		$this->cod = $cod;
		$this->setCode();
	}

	function setUtf8(){
		$this->setQuery("SET NAMES 'utf8'");
		$this->query();
	}

	function setCode(){
		$this->setQuery("SET NAMES '".$this->cod."'");
		$this->query();
	}

	function setQuery($query)
	{
		$this->sql = trim($query);
		$texto=trim($query);
		if ( preg_match ( "(insert|update)",  $texto) )
			$this->log($texto,$_SERVER["PHP_SELF"]);
	}

	function getQuery()
	{
		return $this->sql;
	}
	function getid()
	{
		return 	mysqli_insert_id();
	}

	function getAffected()
	{
		return mysqli_affected_rows();
	}

	function queryDB($db_busca)
	{
		$this->errorNum = 0;
		$this->errorMsg = "";
		$this->rows = 0;
		//$this->pos = mysql_query($this->sql,$this->id);
		if( ($this->pos = mysqli_db_query($db_busca,$this->sql,$this->id)) === false )
		{
			$this->errorNum = mysqli_errno($this->id);
			$this->errorMsg = mysqli_error($this->id) . "<br> SQL: ".$this->sql;
			$this->log($this->errorMsg,$_SERVER["PHP_SELF"]);
			return null;
		}

		if ( stripos($this->sql, "select") !== false){
			$numeroFilas= 0;
			if( (@$numeroFilas = mysqli_num_rows($this->pos)) !== false ){
				$this->rows= $numeroFilas;
			}else{
				$this->log(mysqli_error($this->id) . "\n\r SQL: ".$this->sql,$_SERVER["PHP_SELF"]);
			}
		}else
			$this->rows=0;

		return $this->pos;
	}

	function query()
	{
		$this->errorNum = 0;
		$this->errorMsg = "";
		$this->rows = 0;
		//$this->pos = mysql_query($this->sql,$this->id);
		if( ($this->pos = mysqli_query($this->id, $this->sql)) === false )
		{
			$this->errorNum = mysqli_errno($this->id);
			$this->errorMsg = mysqli_error($this->id) . "<br> SQL: ".$this->sql;
			$this->log($this->errorMsg,$_SERVER["PHP_SELF"]);
			return null;
		}

		if ( stripos($this->sql, "select") !== false){
			$numeroFilas= 0;
			if( (@$numeroFilas = mysqli_num_rows($this->pos)) !== false ){
				$this->rows= $numeroFilas;
			}else{
				$this->log(mysqli_error($this->id) . "\n\r SQL: ".$this->sql,$_SERVER["PHP_SELF"]);
			}
		}else
			$this->rows=0;

		return $this->pos;
	}

	function loadMatrix()
	{
		$ret = array();
		if(!($pos = $this->query()))
			return null;
		while($result = $pos->fetch_row())
			$ret[] = $result;
		$pos->free();
		return $ret;
	}
	function getnumrows()
	{
		return  $this->rows; //mysql_num_rows($this->query());
	}
	function loadMatrixAssoc()
	{

		$ret = array();
		if(!($pos = $this->query()))
		{
			die($this->getErrorMsg());//mientras
			return null;
		}

		while($result = $pos->fetch_assoc())
		{
			while (list($llave, $valor) = each($result)) {
				$aux[$llave]=htmlentities($valor);
			}
			$ret[] = $aux;
		}
		$pos->free();
		return $ret;
	}

	function loadMatrixAssocDB($db_base)
	{

		$ret = array();
		if(!($pos = $this->queryDB($db_base)))
		{
			die($this->getErrorMsg());//mientras
			return null;
		}

		while($result = $pos->fetch_assoc())
		{
			while (list($llave, $valor) = each($result)) {
				$aux[$llave]=htmlentities($valor);
			}
			$ret[] = $aux;
		}
		$pos->free();
		return $ret;
	}

	function getErrorMsg()
	{
		//$this->errorMsg
		return "No se puede realizar la consulta: $this->errorNum ";
	}
	function close()
	{
		if(!mysqli_close($this->id))
		{
			die("No se pudo cerrar la conexi&oacute;n con MySQL");
		}
	}

	function log($texto,$url)
	{
		$logtext= $url. " | " . $texto;
		if (!is_null($texto))
		{
			if (class_exists("JLog")){
				$log = new JLog(PATH_LOG);
				$log->escribe($logtext);
				$log = NULL;
			}
		}
	}

	public function real_escape_string($string) {
		// para hacer la función de escapar el string.
		return $this->id->real_escape_string($string);
	  }

}

/**
 * 	nose para que sirva
*	@Param string $theValue valor
*	@Param string $theType  tipo de dato, puede ser
*                      :text, textSinComillas, textLike, long, int, float, double, date, defined, mysql
*	@return string
**/
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
	{
	  if ($theType != "mysql")
	   {
		 $palabras_que_nodeben_ir = array("\\\"","\\\'","\\");
		 $theValue = str_replace($palabras_que_nodeben_ir, "",  $theValue);
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	   }

	  switch ($theType) {
		case "text":
		  $theValue = ($theValue != "") ? "'" . ($theValue) . "'" : "NULL"; //html_entity_decode($theValue,ENT_QUOTES,"UTF-8")  html_entity_decode($theValue,ENT_QUOTES,"ISO-8859-1")
		  break;
		case "textSinComillas":
		  $theValue = ($theValue != "") ? ($theValue) : "NULL";
		  break;
		case "textLike":
		  $theValue = ($theValue != "") ? "'%" . html_entity_decode($theValue,ENT_QUOTES,"UTF-8") . "%'" : "NULL";
		  break;
		case "long":
		case "int":
		  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
		  break;
		case "float":
		case "double":
		  $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
		  break;
		case "date":
		  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
		  break;
		case "defined":
		  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
		  break;
		case "mysql":
		  $theValue = $theValue;
		  break;
	  }
	  return $theValue;
	}

	function mysql_n($fecha){
		ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
		$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
		return $lafecha;
	}

//Convierte fecha de normal a mysql

function n_mysql($fecha){
	ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
	//echo $mifecha.$fecha;
	$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
	return $lafecha;
}
?>
