<?php 
require_once ("AccesoDatos.php");
class Usuarios
{
    protected $usuario;
    protected $contraseña;

    public function __construct($usuario, $contraseña){
        if($usuario !== NULL && $contraseña !== NULL){
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        }
    }

    public function GetUsuario(){
        return $this->usuario;
    }
    public function GetContraseña(){
        return $this->contraseña;
    }
    public function SetUsuario($value){
        $this->usuario = $value;
    }
    public function SetContraseña($value){
        $this->contraseña = $value;
    }

    public static function TraerTodosLosUsuarios()
	{
		$arrayRetorno = array();
		
		$objetoAcceso = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAcceso->RetornarConsulta('SELECT id,usuario,contraseña FROM usuarios');
		$consulta->Execute();
		while ($fila = $consulta->fetchObject("usuarios")) 
		 {
			 array_push($arrayRetorno,$fila);
		 }
		 return $arrayRetorno;
	}
}

?>