<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

     /**
     * Listar todos los empleados
     * @author: Luisana Lizarazo
     */
    public function listado_empleados($id_empresa)
	{
		//$this->load->view('welcome_message');
		$this->load->model('Empleado_model');//->get_empresas();
        print_r($this->Empleado_model->get_empleados($id_empresa));
    }

    /**
     * Ingresar una empleado
     * @author: Luisana Lizarazo
     */
    public function insertar_empleado($id_empresa,$nombre,$email,$fechaNac)
    {
        $this->load->model('Empleado_model');
        $this->load->model('Empresa_model');
        if (count($this->Empresa_model->consulta_empresa($id_empresa)) > 0){
            $datos['id_empresa'] = $id_empresa;
            $datos['nombre'] = $nombre;
            $datos['correo']  = $email;
            $datos['fecha_nacimiento'] = $fechaNac;
            print_r($this->Empleado_model->ingresa_empleado($datos));
        }else{
            print_r('No existe la Empresa');
        } 
    }

    /**
     * Actualizando un empleado
     * @author: Luisana Lizarazo
     */
    public function actualizar_empleado($id_empresa,$id_empleado,$nombre,$email,$fechaNac)
    {
        $this->load->model('Empresa_model');
        $this->load->model('Empleado_model');
        if ((count($this->Empresa_model->consulta_empresa($id_empresa)) > 0 ) && 
        (count($this->Empleado_model->consulta_empleado($id_empleado)) > 0 )){
            $datos['nombre'] = $nombre;
            $datos['correo']  = $email;
            $datos['fecha_nacimiento'] = $fechaNac;
            $datos['id_empleado'] = $id_empleado;
            print_r($this->Empleado_model->actualiza_empleado($datos));
        }else{
            print_r('No existe Empleado');
        }
    }

    /**
     * Eliminado un empleado
     * @author: Luisana Lizarazo
     */
    public function eliminar_empleado($id_empleado)
    {
        $this->load->model('Empleado_model');
        if (count($this->Empleado_model->consulta_empleado($id_empleado)) > 0 ){
            print_r($this->Empleado_model->elimina_empleado($id_empleado));
        }else{
            print_r('No existe Empleado');
        }
    }
}