<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Empleado extends REST_Controller
{
    function __construct(){
        parent::__construct();
    }

    public function index_get(){}

    /**
     * Listar todos los empleados de una empresa
     * @author: Luisana Lizarazo
     */
    public function listado_get($id_empresa)
	{
		//$this->load->view('welcome_message');
		$this->load->model('Empleado_model');//->get_empresas();
        $this->response($this->Empleado_model->get_empleados($id_empresa),200);
    }

    /**
     * Consultar un empleado
     * @author: Luisana Lizarazo
     */
	public function find_get($id_empleado)
	{
        $this->load->model('Empleado_model');
        $result = $this->Empleado_model->consulta_empleado($id_empleado);
        if (count($result) > 0){
            $this->response($result[0],200);
        }else{
            $this->response(['Error' => 'No Existe el Empleado'],404);
        }
    }

    /**
     * Ingresar una empleado
     * @author: Luisana Lizarazo
     */
    public function empleado_post()
    {
        if ((!$this->post('id_empresa')) || (!$this->post('nombre')) ||
        (!$this->post('correo')) || (!$this->post('fecha_nacimiento')))
        {
            $this->response(array('Error' => 'Datos Incorrectos'),400);
        }else{
            $this->load->model('Empleado_model');
            $this->load->model('Empresa_model');
            if ( count($this->Empresa_model->consulta_empresa($this->post('id_empresa'))) > 0){
                $datos['id_empresa'] = $this->post('id_empresa');
                $datos['nombre'] = $this->post('nombre');
                $datos['correo']  = $this->post('correo');
                $datos['fecha_nacimiento'] = $this->post('fecha_nacimiento');
                $id = $this->Empleado_model->ingresa_empleado($datos);
                if (!is_null($id)){
                    $this->response(array('Id Empleado' => $id), 200);
                }else{
                    $this->response(array('Error' => 'Error al insertar un Empleado'),400);
                }
            }else{
                $this->response(array('Error' => 'Error No Existe el Empleado'),404);
            } 
        }
    }

    /**
     * Actualizando un empleado
     * @author: Luisana Lizarazo
     */
    public function empleado_put($id_empleado)
    {
        if (!$this->put('nombre') || !$id_empleado || !$this->put('correo') 
            || !$this->put('fecha_nacimiento')){
            $this->response(array('Error' => 'Datos Incorrectos'),400);
        }else{
            $this->load->model('Empleado_model');
            if (count($this->Empleado_model->consulta_empleado($id_empleado)) > 0 ){
                $datos['nombre'] = $this->put('nombre');
                $datos['correo']  = $this->put('correo');
                $datos['fecha_nacimiento'] = $this->put('fecha_nacimiento');
                $datos['id_empleado'] = $id_empleado;
                $this->Empleado_model->actualiza_empleado($datos);
                $this->response(array('Actualizado' => 'Empleado Editado Correctamente!'),200);
            }else{
                $this->response(array('Error' => 'El Empleado no existe'),404);
            }
        }
    }

    /**
     * Eliminado un empleado
     * @author: Luisana Lizarazo
     */
    public function empleado_delete($id_empleado)
    {
        $this->load->model('Empleado_model');
        if (count($this->Empleado_model->consulta_empleado($id_empleado)) > 0 ){
            $this->Empleado_model->elimina_empleado($id_empleado);
            $this->response(array('Eliminado' => 'Empleado Eliminado Correctamente!'),200);
        }else{
            $this->response(array('Error' => 'No esta eliminado'),400);
        }
    }
}