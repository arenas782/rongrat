<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

	
	public function index()
	{
        $this->load->model('producto');    
        $productos=$this->producto->getProductos();
        $data['productos']=$productos;
		$this->load->view('header');
		$this->load->view('inventario/listado',$data);
		$this->load->view('footer');
    }
    public function nuevo()
	{
		$this->load->view('header');
		$this->load->view('inventario/nuevo');
		$this->load->view('footer');
    }
    public function operacion()
	{
        $this->load->model('producto');    
        $productos=$this->producto->getProductos();
        $data['productos']=$productos;
		$this->load->view('header');
		$this->load->view('inventario/operacion',$data);
		$this->load->view('footer');
    }
    public function nuevo_guardar()
	{
        $this->load->model('producto');
        $codigo=$this->input->post('codigo');
        $nombre=$this->input->post('nombre');
        $costo=$this->input->post('costo');
        $precio=$this->input->post('precio');
        $stock=$this->input->post('stock');
        $producto=array('codigo'=>$codigo,'nombre'=>$nombre,'costo'=>$costo,'precio'=>$precio,'stock'=>$stock);
     
        if($this->producto->addProducto($producto)){
            $this->session->set_flashdata('status','Producto agregado exitosamente');
				redirect('inventario/', 'refresh');
        }
    }
    public function operacion_guardar(){
        $this->load->model('producto');
        $id_producto=$this->input->post('id_producto');
        $tipo_operacion=$this->input->post('tipo_operacion');
        $cantidad=$this->input->post('cantidad');
        $monto=$this->input->post('monto');
        $total=$this->input->post('total');
        $fecha=$this->input->post('fecha');        
        $nro_documento=$this->input->post('nro_documento');        
        $fecha=date('Y-m-d H:i:s',strtotime($fecha));
        $stock_restante=$this->input->post('stock_restante');
        $operacion=array('id_producto'=>$id_producto,'tipo_operacion'=>$tipo_operacion,'cantidad'=>$cantidad,
        'monto'=>$monto,'total'=>$total,'fecha'=>$fecha,'stock'=>$stock_restante,'nro_documento'=>$nro_documento);
        if($this->producto->addOperacion($operacion)){
            $data=array('stock'=>$stock_restante);
            if($this->producto->updateProducto($data,$id_producto)){
                $this->session->set_flashdata('status','Operación agregada exitosamente');
				redirect('inventario/', 'refresh');
            }
            
        }
        
    }
    
    public function info_producto($id){
        $this->load->model('producto');
        $producto=$this->producto->getProducto($id);
        echo json_encode($producto);
    }
}
