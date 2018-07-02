<?php
class Api_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
   
   
    public function getDatos()
    {
        $query=$this->db
               ->select("*")
                        ->from("api_rest")
                ->get();        
        return $query->result();            
    }
    
}

