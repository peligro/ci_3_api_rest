<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('frontend');
    }
    public function get()
	{
        $this->load->model('api_model');
        $datos=$this->api_model->getDatos();
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($datos));
    }
}
