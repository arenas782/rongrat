<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empaquetado extends CI_Controller {

	
	public function index()
	{

        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('empaquetado_model');    
            $ultimos_empaquetados=$this->empaquetado_model->getUltimosEmpaquetados();
            $data['ultimos_empaquetados']=$ultimos_empaquetados;
            $data2['titulo']="Listado de empaquetados";
            $data2['pagina']="empaquetado";
            $this->load->view('header',$data2);
            $this->load->view('empaquetado/listado',$data);
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
            $data2['titulo']="Registro de empaquetado";
            $data2['pagina']="nuevo_empaquetado";
            $this->load->view('header',$data2);		
            $this->load->view('empaquetado/nuevo');
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
            $this->load->model('empaquetado_model');
            $pernil=$this->input->post('pernil');
            $paleta=$this->input->post('paleta');
            $peine=$this->input->post('peine');
            $costilla=$this->input->post('costilla');
            $nro_piezas=$this->input->post('nro_piezas');
            $nro_cerdos=$this->input->post('nro_cerdos');
            $fecha=$this->input->post('fecha');
            $fecha=date('Y-m-d',strtotime($fecha));
            $empaquetado=array('pernil'=>$pernil,'paleta'=>$paleta,'peine'=>$peine,
            'costilla'=>$costilla,'nro_piezas'=>$nro_piezas,'nro_cerdos'=>$nro_cerdos,'fecha'=>$fecha);
         
            if($this->empaquetado_model->addEmpaquetado($empaquetado)){
                $this->session->set_flashdata('type','success');
                $this->session->set_flashdata('msg','Empaquetado agregado exitosamente');
                    redirect('empaquetado/', 'refresh');
            }
            else{
                $this->session->set_flashdata('type','danger');
                $this->session->set_flashdata('msg','Ha ocurrido un error');
                redirect('empaquetado/', 'refresh');
            }
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    
    public function editar_producto($id)
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');
            $id_producto=$id;
            $producto=$this->producto->getProducto($id_producto);
            $data2['titulo']="Listado de productos";
            $data2['pagina']="empaquetado";
            $data['producto']=$producto;
            $this->load->view('header',$data2);
            $this->load->view('inventario/editar',$data);
            $this->load->view('footer');
            
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			                
    }
    public function update_producto()
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');
            $id=$this->input->post('id');
            $codigo=$this->input->post('codigo');
            $nombre=$this->input->post('nombre');
            $costo=$this->input->post('costo');
            $precio=$this->input->post('precio');
            $stock=$this->input->post('stock');
            $valor=$this->input->post('valor');
            $producto=array('codigo'=>$codigo,'nombre'=>$nombre,'costo'=>$costo,
            'precio'=>$precio,'stock'=>$stock,'valor'=>$valor);
         
            if($this->producto->updateProducto($producto,$id)){
                $this->session->set_flashdata('type','success');
                $this->session->set_flashdata('msg','Producto editado exitosamente');
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
}
