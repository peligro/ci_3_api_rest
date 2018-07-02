<?php
require_once("conectar.php");

class Datos extends Conectar
{
    private $con;
    public function __construct()
    {
        $this->con=parent::con();
        parent::setNames();
    }
   
 

 

    public function getDatos($sql)
    {
       
        //el método prepare retorna un objeto que tiene sus propios métodos
        $datos=$this->con->prepare($sql);
        //el execute ejecuta la consulta SQL
        $datos->execute();
        //el fetchAll toma los datos, los pone un array es bidimensional
        return $datos->fetchAll();
    }
    public function setDatos($sql)
    {
       
        //el método prepare retorna un objeto que tiene sus propios métodos
        $datos=$this->con->prepare($sql);
        //el execute ejecuta la consulta SQL
        $datos->execute();
    }
}
