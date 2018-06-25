<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

class Empresa  extends REST_Controller {

    /**
     * Listar todas las empresas
     * @author: Luisana Lizarazo
     */
	public function index_get()
	{
		//$this->load->view('welcome_message');
		$this->load->model('Empresa_model');//->get_empresas();
        $this->response($this->Empresa_model->get_empresas());
    }

    /**
     * Consultar una empresa
     * @author: Luisana Lizarazo
     */
	public function find_get($id_empresa)
	{
		//$this->load->view('welcome_message');
		$this->load->model('Empresa_model');//->get_empresas();
        print_r($this->Empresa_model->consulta_empresa($id_empresa));
    }
    
    /**
     * Ingresar una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_post($nombre)
    {
        $this->load->model('Empresa_model');
        print_r($this->Empresa_model->ingresa_empresa($nombre));
    }

    /**
     * Actualizando el nombre de una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_put($id_empresa,$nombre)
    {
        $this->load->model('Empresa_model');
        if (count($this->Empresa_model->consulta_empresa($id_empresa)) > 0 ){
            print_r($this->Empresa_model->actualiza_empresa($nombre,$id_empresa));
        }else{
            print_r('No existe Empresa');
        }
    }

    /**
     * Eliminado el nombre de una empresa
     * @author: Luisana Lizarazo
     */
    public function empresa_delete($id_empresa)
    {
        $this->load->model('Empresa_model');
        if (count($this->Empresa_model->consulta_empresa($id_empresa)) > 0 ){
            print_r($this->Empresa_model->elimina_empresa($id_empresa));
        }else{
            print_r('No existe Empresa');
        }
    }



}
