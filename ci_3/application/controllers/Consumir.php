<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumir extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
    }
    public function get()
	{
        $this->load->library('api_rest');
        $datos=json_decode($this->api_rest->getDatos('peticion/11'));
        $this->layout->view('get',compact('datos'));
	}
	public function post()
	{
        $this->load->library('api_rest');
        $this->api_rest->getPost('peticion',array('parametro1'=>'César','parametro2'=>'Cancino'));
        $this->layout->view('post');
	}
	public function put()
	{
        $this->load->library('api_rest');
        $this->api_rest->getPut('peticion/13',array('parametro1'=>'Juan','parametro2'=>'Pérez'));
        $this->layout->view('put');
	}
	public function delete()
	{
        $this->load->library('api_rest');
        $this->api_rest->getDelete('peticion/13');
        $this->layout->view('delete');
	}
}
