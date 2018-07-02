<?php
session_start();
abstract class Conectar
{
    private $pdo;
    
    public function con()
    {
        try
        {
            //return $this->pdo=new PDO("mysql:dbname=usayuknow;host=usayuknow.cq7fnet6d8ra.us-west-2.rds.amazonaws.com","usuk","ruBq3sAs6nzY");
            return $this->pdo=new PDO("mysql:dbname=tamila;host=localhost","root","");
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }  
    public function setNames()
    {
       return $this->pdo->query("SET NAMES 'utf8'"); 
    } 
} 