<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    

    
    
    function email_exists($key){
        $this->db->where('email',$key);
        $query = $this->db->get('diosas');
        if ($query->num_rows() > 0)
            return true;    
        else
        return false;    
    }
    
    public function login($usuario){
        $query = $this->db->get_where('usuarios', array('usuario'=>$usuario));
        if($query->num_rows()>0){
            $row=$query->row();
            return $row;        
        }
        return null;             
    }
    public function getUsuario($id){
        $query = $this->db->get_where('usuarios', array('id'=>$id));
        if($query->num_rows()>0){
            $row=$query->row();
            return $row;        
        }
        return null;             
    }
    public function updateUsuario($data=array(),$id){
        $this->db->where('id', $id);
        if($this->db->update('usuarios', $data))
            return true;            
        return false;        
    }
    
}





