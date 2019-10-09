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
            $p_pernil=$this->input->post('p_pernil');
            $paleta=$this->input->post('paleta');
            $p_paleta=$this->input->post('p_paleta');
            $peine=$this->input->post('peine');
            $p_peine=$this->input->post('p_peine');
            $costilla=$this->input->post('costilla');
            $p_costilla=$this->input->post('p_costilla');
            $nro_piezas=$this->input->post('nro_piezas');
            $nro_cerdos=$this->input->post('nro_cerdos');
            $fecha=$this->input->post('fecha');
            $fecha=date('Y-m-d',strtotime($fecha));
            $empaquetado=array('pernil'=>$pernil,'paleta'=>$paleta,'peine'=>$peine,
            'costilla'=>$costilla,'p_pernil'=>$p_pernil,'p_paleta'=>$p_paleta,'p_peine'=>$p_peine,
            'p_costilla'=>$p_costilla,'nro_piezas'=>$nro_piezas,
            'nro_cerdos'=>$nro_cerdos,'fecha'=>$fecha);
         
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
    
}
