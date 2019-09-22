<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

	
	public function index()
	{

        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');    
            $productos=$this->producto->getProductos();
            $data['productos']=$productos;
            $data2['titulo']="Listado de productos";
            $data2['pagina']="inventario";
            $this->load->view('header',$data2);
            $this->load->view('inventario/listado',$data);
            $this->load->view('footer');
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    public function nuevo()
	{
        if($this->session->userdata('usuario_logged_in')){
            $data2['titulo']="Registro de productos";
            $data2['pagina']="nuevo_producto";
            $this->load->view('header',$data2);		
            $this->load->view('inventario/nuevo');
            $this->load->view('footer');
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    public function operacion()
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');        
            $productos=$this->producto->getProductos();
            $data['productos']=$productos;
            $data2['titulo']="Operaciones de productos";
            $data2['pagina']="operacion_producto";    
            $this->load->view('header',$data2);
            $this->load->view('inventario/operacion',$data);
            $this->load->view('footer');
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    public function nuevo_guardar()
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');
            $codigo=$this->input->post('codigo');
            $nombre=$this->input->post('nombre');
            $costo=$this->input->post('costo');
            $precio=$this->input->post('precio');
            $stock=$this->input->post('stock');
            $valor=$this->input->post('valor');
            $producto=array('codigo'=>$codigo,'nombre'=>$nombre,'costo'=>$costo,
            'precio'=>$precio,'stock'=>$stock,'valor'=>$valor);
         
            if($this->producto->addProducto($producto)){
                $this->session->set_flashdata('type','success');
                $this->session->set_flashdata('msg','Producto agregado exitosamente');
                    redirect('inventario/', 'refresh');
            }
            else{
                $this->session->set_flashdata('type','danger');
                $this->session->set_flashdata('msg','Ha ocurrido un error');
                redirect('inventario/', 'refresh');
            }
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    public function operacion_guardar(){
        if($this->session->userdata('usuario_logged_in')){
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
            $nuevo_valor=$this->input->post('valor');
            switch ($tipo_operacion){
                case 'e':
                    $nuevo_valor+=$total;
                    break;
                case 's';
                    $nuevo_valor-=$total;
                    break;
            }
            $operacion=array('id_producto'=>$id_producto,'tipo_operacion'=>$tipo_operacion,'cantidad'=>$cantidad,
            'monto'=>$monto,'total'=>$total,'fecha'=>$fecha,'stock'=>$stock_restante,'nro_documento'=>$nro_documento,'valor'=>$nuevo_valor);
            if($this->producto->addOperacion($operacion)){
                $data=array('stock'=>$stock_restante,'valor'=>$nuevo_valor);
                if($this->producto->updateProducto($data,$id_producto)){
                    $this->session->set_flashdata('type','success');
                    $this->session->set_flashdata('msg','Operación agregada exitosamente');
                    redirect('inventario/', 'refresh');
                }
                else{
                    $this->session->set_flashdata('type','danger');
                    $this->session->set_flashdata('msg','Ha ocurrido un error');
                    redirect('inventario/', 'refresh');
                }
                
            }
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			                
    }
    
    public function info_producto($id){
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');
            $producto=$this->producto->getProducto($id);
            echo json_encode($producto);
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }



    public function listado()
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');
            $this->load->model('operacion_producto');
            $productos=$this->producto->getProductos();
            $data['operaciones']=$this->operacion_producto->getOperaciones();
            $data2['titulo']="Operaciones de productos";
            $data2['pagina']="operaciones_productos";
            $this->load->view('header',$data2);
            $this->load->view('inventario/listado_operaciones',$data);
            $this->load->view('footer');
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			        
    }
}
