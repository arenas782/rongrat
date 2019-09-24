<?php 

    class Empaquetado_model extends CI_Model {
    
        public function getEmpaquetado($id){
            $query = $this->db->get_where('empaquetado', array('id'=>$id));
            if($query->num_rows()>0){                
                return $query->row();        
        }
        return null;        
        }
        public function getEmpaquetados(){
            $query = $this->db->get('empaquetado');
            return $query->result();
        }
        public function addEmpaquetado($data=array()){
            if($this->db->insert('empaquetado',$data)){
                return true;
            }
            return false;
        }        
        public function getUltimosEmpaquetados(){            
            $this->db->order_by('fecha','desc');
            $this->db->limit('50');
            $query=$this->db->get('empaquetado');
            return $query->result();
        }
                
        public function getReporteEmpaquetado($desde,$hasta){
            $desde=date('Y-m-d',strtotime($desde));
            $hasta=date('Y-m-d',strtotime($hasta));            
            $this->db->where("fecha >=",$desde);
            $this->db->where("fecha <=",$hasta);
            $this->db->order_by('fecha','desc');
            $query = $this->db->get('empaquetado');
            return $query->result();
        }
    }
?>