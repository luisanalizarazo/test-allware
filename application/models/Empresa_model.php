<?php

/** 
 * Modelo Empresa
 * Modelo de la tabla Empresa
 * @author: Luisana Lizarazo 
*/

class Empresa_model extends CI_Model {
    function __construct(){
      parent::__construct();
    }

    /** 
      * Retorna todas las empresas
      * @author: Luisana Lizarazo 
    */
    function get_empresas() {
      return $this->db->select('*')->from('Empresa')->get()->result_array();
    }

    /** 
      * Consultar una Empresa
      * @author: Luisana Lizarazo 
    */
    function consulta_empresa($id_empresa) {
      
      return $this->db->select('*')->from('Empresa')
      ->where('id_empresa',$id_empresa)->get()->result_array();
    }

    /** 
      * Ingresa una empresa
      * @author: Luisana Lizarazo 
    */
    function ingresa_empresa($nombre_empresa) {
      $dato['nombre'] = $nombre_empresa;
      $this->db->insert('Empresa',$dato);
      return $this->db->insert_id(); 
    }

    /** 
      * Actualiza el nombre de una empresa
      * @author: Luisana Lizarazo 
    */
    function actualiza_empresa($nombre_empresa, $id_empresa) {
      $this->db->set('nombre',$nombre_empresa)
      ->where('id_empresa',$id_empresa)->update('Empresa');
    }

    /** 
      * Elimina una empresa
      * @author: Luisana Lizarazo 
    */
    function elimina_empresa($id_empresa) {
      $this->db->where('id_empresa',$id_empresa)->delete('Empresa');
    }



}


?>