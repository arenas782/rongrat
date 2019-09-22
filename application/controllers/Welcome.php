<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		if($this->session->userdata('usuario_logged_in')){
			$this->load->library('encryption');
			$this->load->model('operacion_producto');
			$this->load->model('producto');
			$data2['titulo']="Inversiones Rongrat";
			$data2['pagina']="inicio";
			$data['ultimas_operaciones']=$this->operacion_producto->getUltimasOperaciones();
			$this->load->view('header',$data2);
			$this->load->view('welcome_message',$data);
			$this->load->view('footer');
		}
		else { 
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Usuario no registrado');
			redirect('/login', 'refresh');
		}			
		
		
		
		
	}


	public function login(){
		session_destroy();		 
		$this->load->view('login');		
	}


	public function check_login(){
		$this->load->library('encryption');
		$this->load->model('usuario');
		$password=$this->input->post('password');
		$usuario=$this->input->post('usuario');
		$usuario=$this->usuario->login($usuario);		//primero chequea si el usuario existe con el correo indicado
		if($usuario!==null){			
			if(strcmp($password,$this->encryption->decrypt($usuario->password))!==0){ //si existe, compara las claves
				$this->session->set_flashdata('type','danger');
				$this->session->set_flashdata('msg',$this->encryption->decrypt($usuario->password));
				redirect('/login', 'refresh');	//si no coinciden, lo envia al login
			}				
			else{ //si todo coincide, crea una nueva sesion y  redirige al index
				$newdata = array(
					'nombre'  => $usuario->nombre,
					'email'     => $usuario->email,
					'usuario_logged_in' => TRUE,
					'id_usuario' =>	$usuario->id,
					'usuario'=>$usuario->usuario		
						
			);				
			$this->session->set_userdata($newdata);			
			redirect('/', 'refresh');
			} 
		}					
		else { 
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Usuario no registrado');
			redirect('/login', 'refresh');
		}			
	}
	public function logout(){		
		session_destroy();		 //destruye la sesion actual
		redirect('/login', 'refresh');	
	}

	
	public function perfil(){
		if($this->session->userdata('usuario_logged_in')){
			$this->load->model('usuario');
			$data['usuario']=$this->usuario->getUsuario($this->session->userdata('id_usuario'));
			$data2['titulo']="Perfil de usuario";
			$data2['pagina']="perfil";
			$this->load->view('header',$data2);
			$this->load->view('perfil',$data);
			$this->load->view('footer');
		}
		else { 
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Usuario no registrado');
			redirect('/login', 'refresh');
		}			
	}

	public function actualizar_perfil()
	{
        if($this->session->userdata('usuario_logged_in')){
			$this->load->model('usuario');
			$this->load->library('encryption');
			$id=$this->input->post('id');
            $nombre=$this->input->post('nombre');
            $email=$this->input->post('email');
            $telefono=$this->input->post('telefono');
            
            $password=$this->input->post('password');
            $password2=$this->input->post('password2');
			$usuario=array('nombre'=>$nombre,'email'=>$email,'telefono'=>$telefono);

			$msg="Tu pefil ha sido actualiazado. ";

			if($password!="" && $password2!="" && (strcmp($password,$password2)==0)){
				$usuario['password']=$this->encryption->encrypt($password);
				$msg.="Tu password fue actualizada";
			}
			
			else{
				$msg.="Tu password no fue actualizada. ";
			}

			if($this->usuario->updateUsuario($usuario,$id)){
				$this->session->set_flashdata('type','success');
                $this->session->set_flashdata('msg',$msg);
                redirect('perfil/', 'refresh');
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
