<?php 

    class Operacion_producto extends CI_Model {    
        
        public function getOperaciones(){
            $this->db->order_by('fecha','desc');
            $query = $this->db->get('entrada_salida_productos');
            return $query->result();
        }

        public function getOperacionesProducto($id,$desde,$hasta){
            $desde=date('Y-m-d H:i:s',strtotime($desde));
            $hasta=date('Y-m-d H:i:s',strtotime($hasta));
            $this->db->where('id_producto',$id);
            $this->db->where("fecha >=",$desde);
            $this->db->where("fecha <=",$hasta);
            $this->db->order_by('fecha','desc');
            $query = $this->db->get('entrada_salida_productos');
            return $query->result();
        }
        
        public function getUltimasOperaciones(){            
            $this->db->order_by('fecha','desc');
            $this->db->limit('10');
            $query=$this->db->get('entrada_salida_productos');
            return $query->result();
        }
        
    }
?>
