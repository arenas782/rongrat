<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->model('operacion_producto');
		$this->load->model('producto');
		$data2['titulo']="Inversiones Rongrat";
		$data2['pagina']="inicio";
		$data['ultimas_operaciones']=$this->operacion_producto->getUltimasOperaciones();
		$this->load->view('header',$data2);
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}
}
