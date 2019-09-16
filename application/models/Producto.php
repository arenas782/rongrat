<?php 

    class Producto extends CI_Model {
    
        public function getProducto($id){
            $query = $this->db->get_where('inv_productos', array('id'=>$id));
            if($query->num_rows()>0){
                
                return $query->row();        
        }
        return null;        
        }
        public function getProductos(){
            $query = $this->db->get('inv_productos');
            return $query->result();
        }
        public function addProducto($data=array()){
            if($this->db->insert('inv_productos',$data)){
                return true;
            }
            return false;
        }        
        public function addOperacion($data=array()){
            if($this->db->insert('entrada_salida_productos',$data)){
                return true;
            }
            return false;
        }        
        public function updateProducto($data=array(),$id){
            $this->db->where('id', $id);
            if($this->db->update('inv_productos', $data))
                return true;            
            return false;        
        }
    }
?>