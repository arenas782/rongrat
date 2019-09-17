<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	
	public function productos()
	{
        $this->load->model('producto');    
        $this->load->model('operacion_producto');    
        $productos=$this->producto->getProductos();
        $data['productos']=$productos;
        $data2['titulo']="Reportes de producción";
        $data2['pagina']="reportes";

        $id_producto=$this->input->post('producto');
        $desde=$this->input->post('desde');
        $hasta=$this->input->post('hasta');
    
        if($id_producto && $desde && $hasta){
            $operaciones=$this->operacion_producto->getOperacionesProducto($id_producto,$desde,$hasta);
            $monto_entrada=0;
            $monto_salida=0;
            $cantidad_entrada=0;
            $cantidad_salida=0;
            foreach ($operaciones as $o)
                if($o->tipo_operacion=="e"){
                    $monto_entrada+=$o->total;
                    $cantidad_entrada+=$o->cantidad;
                }
                    
                else 
                    if($o->tipo_operacion=="s"){
                        $monto_salida+=$o->total;
                    $cantidad_salida+=$o->cantidad;
                    }
            

            $data['operaciones']=$operaciones;
            $data['desde']=$desde;
            $data['hasta']=$hasta;
            $data['cantidad_entrada']=$cantidad_entrada;
            $data['cantidad_salida']=$cantidad_salida;
            $data['monto_entrada']=$monto_entrada;
            $data['monto_salida']=$monto_salida;
         
        }
        

		$this->load->view('header',$data2);
		$this->load->view('reportes/index',$data);
		$this->load->view('footer');
    }
    
}
