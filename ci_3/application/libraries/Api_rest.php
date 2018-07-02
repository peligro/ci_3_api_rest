<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase de comunicación API REST
 *
 * PHP version 7
 *
 * Licencia
 *
 * El código de esta API pertenece en su totalidad a fyf
 *
 * @category  API
 * @library   HTTP
 * @author    www.cesarcancino.com
 * @source    https://github.com/peligro/ci_3_api_rest
 *
 */
class Api_rest
{
    private $CI;
    private $dominio;
    private $api_key;
    private $token;
    private $name;

	public function __construct()
	{
       $this->CI		=& get_instance();
       $this->dominio='http://192.168.1.59/tamila/test/api_rest/v1/';
       $this->api_key="AKCAQEAv88cCDDH8WsT1xyrZqq684VJUPJzO";
       $this->name="Nombre Aplicación";
       $this->token=$this->crearToken();
    }   
    public function getInstancia()
    {
        return $this->CI;
    }
    public function getDominio()
    {
        return $this->dominio;
    }
    public function crearHeaders()
    {
       $headers=array();
       //$headers[] = 'Token:'.$this->getToken();
       $headers[] = 'Token: 123456';
       return $headers;
    }
    private function crearToken()
    {
        $ts = strtotime(date("Y-m-d",time()));
        $forged_msg = $this->name."-".$ts;
        $forged_hash = hash_hmac('MD5', $forged_msg, $this->api_key);
        $token = $forged_hash."-".$ts;
        return $token;
    }
    /**
      * @name getDatos
      * @descripción Método que permite listar los datos desde una Petición Rest vía GET
      * @param $url | de tipo string
      * @método GET 
      * @return Retorna el listado de datos, formateado como arreglo bidimensional de tipo objeto ($dato->campo)
      * */
    public function getDatos($url)
    {
       $curl = curl_init($this->getDominio().$url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, $this->crearHeaders()); 
       curl_setopt($curl, CURLINFO_HEADER_OUT, true);  
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       $curl_response = curl_exec($curl);
       $http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
       curl_close($curl);
       //echo $http_code.'<hr />';
       return $curl_response;
       //return json_decode($curl_response);
    }
    /**
      * @name getPost
      * @descripción Método que permite enviar datos vía POST
      * @param $url | de tipo string
      * @param $data | array(clave=>valor)
      * @método POST
      * @return Retorna el estado de la petición. Si es 201 es una petición exitosa.
      * */
    public function getPost($url,$data=array())
    {
       $curl = curl_init($this->getDominio().$url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, $this->crearHeaders()); 
       curl_setopt($curl, CURLINFO_HEADER_OUT, true);  
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
       $curl_response = curl_exec($curl);
       $http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
       curl_close($curl);
       //echo $http_code.'<hr />';
       //echo $curl_response;
       return $http_code;
    
    }
     /**
      * @name getPut
      * @descripción Método que permite enviar datos vía PUT, idealmente para editar registros
      * @param $url | de tipo string
      * @param $data | de tipo array('nombre'=>'valor')
      * @método PUT
      * @return Retorna el valor de la modificación.
      * */
    public function getPut($url,$data=array())
    {
        $curl = curl_init($this->getDominio().$url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->crearHeaders()); 
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS,http_build_query($data));
$http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
        $curl_response = curl_exec($curl);
       $http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
       curl_close($curl);
       return $curl_response;
    }
    /**
      * @name getDelete
      * @descripción Método que permite enviar petición DELETE
      * @param $url | de tipo string
      * @método DELETE
      * @return Retorna el valor de la modificación.
      * */
    public function getDelete($url)
    {
       $curl = curl_init($this->getDominio().$url);
       curl_setopt($curl, CURLOPT_HTTPHEADER, $this->crearHeaders()); 
       curl_setopt($curl, CURLINFO_HEADER_OUT, true);  
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
       $http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
       $curl_response = curl_exec($curl);
       $http_code = curl_getinfo($curl, CURLINFO_HEADER_OUT);
       curl_close($curl);
       return $curl_response;
    }
}