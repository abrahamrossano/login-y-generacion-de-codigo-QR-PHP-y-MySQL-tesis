<?php
date_default_timezone_set('America/Mexico_City');
class JLog{
    private $archivo;
    private $dirrecion;

	function __construct($rutaAr)
	{
        $this->setNombre(date("d-m-Y"));
        $this->setRuta($rutaAr);
	}

    public function getNombre(){
         return $this->archivo;
    }
	
	private function setNombre($value){
		$this->archivo = "/log-".$value.".log";
    }

    public function getRuta(){
		return $this->dirrecion;
    }
	
	private function setRuta($value){
		$this->dirrecion = $value;
		try
		{
			
			if (!file_exists($this->dirrecion))
				mkdir ($this->dirrecion,0777,true);
		}
		catch (Exception $ex)
		{
			echo $ex->getMessage();
		}
    }

    public function escribe($cad){

		$gestor = fopen($this->getRuta().$this->getNombre(), "a");
        $t = "[".date("Y-m-d H:i:s") . "]: " . $cad . PHP_EOL;
		fwrite($gestor,$t);
        fclose($gestor);
    }


}
?>