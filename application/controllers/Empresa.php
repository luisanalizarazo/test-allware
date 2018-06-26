<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Empresa extends REST_Controller {

 
    /**
     * Listar todas las empresas
     * @author: Luisana Lizarazo
     */
	public function index_get()
	{
		//$this->load->view('welcome_message');
        $this->load->model('Empresa_model');//->get_empresas();
        $this->response($this->Empresa_model->get_empresas(),200);
    }

    /**
     * Consultar una empresa
     * @author: Luisana Lizarazo
     */
	public function find_get($id_empresa)
	{
		//$this->load->view('welcome_message');
        $this->load->model('Empresa_model');//->get_empresas();
        $result = $this->Empresa_model->consulta_empresa($id_empresa);
        if (count($result) > 0){
            $this->response($result[0],200);
        }else{
            $this->response(['error' => 'No Existe la Empresa'],404);
        }
    }
    
    /**
     * Ingresar una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_post()
    {
        if (!$this->post('nombre'))
        {
            $this->response(array('Error' => 'Dato Incorrecto'),400);
        }else{
            $this->load->model('Empresa_model');
            $id = $this->Empresa_model->ingresa_empresa($this->post('nombre'));
        
            if (!is_null($id)){
                $this->response(array('Id Empresa' => $id), 200);
            }else{
                $this->response(array('Error' => 'Error al insertar una Empresa'),400);
            }
        }
        
    }

    /**
     * Actualizando el nombre de una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_put($id_empresa)
    {
        $this->load->model('Empresa_model');
        if (!$this->put('nombre') || !$id_empresa)
        {
            $this->response(array('Error' => 'Datos Incorrectos'),400);
        } else {
            $result = $this->Empresa_model->actualiza_empresa($this->put('nombre'),$id_empresa);
            if (!is_null($result)){
                $this->response(array('Actualizado' => 'Empresa Editada Correctamente!'),200);
            }else{
                $this->response(array('Error' => 'No esta actualizado'),400);
            }
        }
    }

    /**
     * Eliminado el nombre de una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_delete($id_empresa)
    {
        $this->load->model('Empresa_model');
        $result = $this->Empresa_model->elimina_empresa($id_empresa);
        if (!is_null($result)){
            $this->response(array('Eliminado' => 'Empresa Eliminada Correctamente!'),200);
        }else{
            $this->response(array('Error' => 'No esta eliminado'),400);
        }
    }



}
