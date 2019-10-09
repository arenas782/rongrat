<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	
	public function productos_individual()
	{
        if($this->session->userdata('usuario_logged_in')){
            $this->load->model('producto');    
            $this->load->model('operacion_producto');    
            $productos=$this->producto->getProductos();
            $data['productos']=$productos;
            $data2['titulo']="Reportes de producción";
            $data2['pagina']="reporte_individual";
    
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
                $data['id_producto']=$id_producto;
    
             
            }        
            $this->load->view('header',$data2);
            $this->load->view('reportes/index',$data);
            $this->load->view('footer');
        }
        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }


    public function productos_general()
	{
        if($this->session->userdata('usuario_logged_in')){

            $this->load->model('producto');    
            $this->load->model('operacion_producto');    
            $productos=$this->producto->getProductos();
            
            $data2['titulo']="Reportes de producción";
            $data2['pagina']="reporte_general";
    
            
            $desde=$this->input->post('desde');
            $hasta=$this->input->post('hasta');
            $data=array();
            if($desde && $hasta){
                $array=array();
                foreach ($productos as $p){
                    
                    $monto_entrada=0;
                    $monto_salida=0;
                    $cantidad_entrada=0;
                    $cantidad_salida=0;
                    $operaciones=$this->operacion_producto->getOperacionesProducto($p->id,$desde,$hasta);   
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
                    $producto=array('codigo'=>$p->codigo,'nombre'=>$p->nombre,'monto_entrada'=>$monto_entrada,
                    'monto_salida'=>$monto_salida,'cantidad_entrada'=>$cantidad_entrada,'cantidad_salida'=>$cantidad_salida);
                    array_push($array,$producto);
                }
                $array = json_decode(json_encode($array), true);
                $data['totales']=$array;  
                $data['desde']=$desde;
                $data['hasta']=$hasta; 
            }
            
            $this->load->view('header',$data2);
            $this->load->view('reportes/productos_general',$data);
            $this->load->view('footer');
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }


    public function stock_productos(){
        if($this->session->userdata('usuario_logged_in')){
            date_default_timezone_set('America/Caracas');
            $data="";
            $this->load->model('producto');
            $data['productos']=$this->producto->getProductos();
            
            //$this->load->view('reportes/pdf',$data);
            $html = $this->load->view('reportes/pdf_productos_stock',$data,TRUE);
            $this->load->library('pdfgenerator');
            $filename = 'reporte_stock_general';
            $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    
    public function pdf_productos_individual(){
        if($this->session->userdata('usuario_logged_in')){

            date_default_timezone_set('America/Caracas');        
            $this->load->model('producto');
            $this->load->model('operacion_producto');
            $id_producto=$this->input->get('id_producto');
            $desde=$this->input->get('desde');
            $hasta=$this->input->get('hasta');        
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
                $data['producto']=$this->producto->getProducto($id_producto);              
            }
            
            //$this->load->view('reportes/pdf_productos_individual',$data);
            $html = $this->load->view('reportes/pdf_productos_individual',$data,TRUE);
            $this->load->library('pdfgenerator');
            $filename = 'reporte_individual_productos';
            $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }
    
    public function pdf_productos_general(){
        if($this->session->userdata('usuario_logged_in')){

            date_default_timezone_set('America/Caracas');        
            $this->load->model('producto');
            $this->load->model('operacion_producto');
            $productos=$this->producto->getProductos();
            $desde=$this->input->get('desde');
            $hasta=$this->input->get('hasta');
            $data=array();
            if($desde && $hasta){
                $array=array();
                foreach ($productos as $p){
                    
                    $monto_entrada=0;
                    $monto_salida=0;
                    $cantidad_entrada=0;
                    $cantidad_salida=0;
                    $operaciones=$this->operacion_producto->getOperacionesProducto($p->id,$desde,$hasta);   
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
                    $producto=array('codigo'=>$p->codigo,'nombre'=>$p->nombre,'monto_entrada'=>$monto_entrada,
                    'monto_salida'=>$monto_salida,'cantidad_entrada'=>$cantidad_entrada,'cantidad_salida'=>$cantidad_salida);
                    array_push($array,$producto);
                }
                $array = json_decode(json_encode($array), true);
                $data['totales']=$array;  
                $data['desde']=$desde;
                $data['hasta']=$hasta; 
    
                //$this->load->view('reportes/pdf_productos_general',$data);
                $html = $this->load->view('reportes/pdf_productos_general',$data,TRUE);
                $this->load->library('pdfgenerator');
                $filename = 'reporte_general_productos';
                $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
            }
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }    


    public function empaquetado()
	{
        if($this->session->userdata('usuario_logged_in')){

            
            $this->load->model('empaquetado_model');    
            
            
            $data2['titulo']="Reporte de empaquetado";
            $data2['pagina']="reporte_empaquetado";
                
            $desde=$this->input->post('desde');
            $hasta=$this->input->post('hasta');
            $data=array();


            if($desde && $hasta){

                
                $empaquetado=$this->empaquetado_model->getReporteEmpaquetado($desde,$hasta);                
                $totales=array();
                $pernil=0.0;
                $p_pernil=0.0;
                $paleta=0.0;
                $p_paleta=0.0;
                $peine=0.0;
                $p_peine=0.0;
                $costilla=0.0;
                $p_costilla=0.0;
                $nro_cerdos=0.0;
                $nro_piezas=0.0;
                foreach($empaquetado as $e){
                    $pernil+=$e->pernil;
                    $p_pernil+=$e->p_pernil;
                    $paleta+=$e->paleta;
                    $p_paleta+=$e->p_paleta;
                    $peine+=$e->peine;
                    $p_peine+=$e->p_peine;
                    $costilla+=$e->costilla;
                    $p_costilla+=$e->p_costilla;
                    $nro_cerdos+=$e->nro_cerdos;
                    $nro_piezas+=$e->nro_piezas;
                    
                }
                $totales=array('pernil'=>$pernil,'p_pernil'=>$p_pernil,'paleta'=>$paleta,'p_paleta'=>$p_paleta,
                'peine'=>$peine,'p_peine'=>$p_peine,'costilla'=>$costilla,'p_costilla'=>$p_costilla,
                'nro_piezas'=>$nro_piezas,'nro_cerdos'=>$nro_cerdos);
                $data['totales']=$empaquetado;  
                $data['resumen']= json_decode(json_encode($totales), true);
                $data['desde']=$desde;
                $data['hasta']=$hasta; 
            }
            
            $this->load->view('header',$data2);
            $this->load->view('reportes/empaquetado',$data);
            $this->load->view('footer');
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }


    public function pdf_empaquetado(){
        if($this->session->userdata('usuario_logged_in')){

            date_default_timezone_set('America/Caracas');        
            
            $this->load->model('empaquetado_model');
            
            $desde=$this->input->get('desde');
            $hasta=$this->input->get('hasta');
            
            if($desde && $hasta){
                                    
                $totales=array();
                $pernil=0.0;
                $p_pernil=0.0;
                $paleta=0.0;
                $p_paleta=0.0;
                $peine=0.0;
                $p_peine=0.0;
                $costilla=0.0;
                $p_costilla=0.0;
                $nro_cerdos=0.0;
                $nro_piezas=0.0;
                $empaquetado=$this->empaquetado_model->getReporteEmpaquetado($desde,$hasta);                                
                foreach($empaquetado as $e){
                    $pernil+=$e->pernil;
                    $p_pernil+=$e->p_pernil;
                    $paleta+=$e->paleta;
                    $p_paleta+=$e->p_paleta;
                    $peine+=$e->peine;
                    $p_peine+=$e->p_peine;
                    $costilla+=$e->costilla;
                    $p_costilla+=$e->p_costilla;
                    $nro_cerdos+=$e->nro_cerdos;
                    $nro_piezas+=$e->nro_piezas;
                    
                }
                $totales=array('pernil'=>$pernil,'p_pernil'=>$p_pernil,'paleta'=>$paleta,'p_paleta'=>$p_paleta,
                'peine'=>$peine,'p_peine'=>$p_peine,'costilla'=>$costilla,'p_costilla'=>$p_costilla,
                'nro_piezas'=>$nro_piezas,'nro_cerdos'=>$nro_cerdos);
                $data['resumen']= json_decode(json_encode($totales), true);
                $data['totales']=$empaquetado;  
                $data['desde']=$desde;
                $data['hasta']=$hasta; 
    
                //$this->load->view('reportes/pdf_empaquetado',$data);
                $html = $this->load->view('reportes/pdf_empaquetado',$data,TRUE);
                $this->load->library('pdfgenerator');
                $filename = 'reporte_empaquetado';
                $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
            }
        }

        else{
			$this->session->set_flashdata('type','danger');
			$this->session->set_flashdata('msg','Inicia sesión para continuar');
			redirect('login/');
		}			
        
    }    
}
