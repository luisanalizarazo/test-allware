<?php

/** 
 * Modelo Empleado
 * Modelo de la tabla Empleado
 * @author: Luisana Lizarazo 
*/

class Empleado_model extends CI_Model {
    function __construct(){
      parent::__construct();
    }

    /** 
      * Retorna todos los empleados
      * de una Empresa
      * @author: Luisana Lizarazo 
    */
    function get_empleados($id_empresa) {
        return $this->db->select('*')->from('Empleado')
        ->where('id_empresa',$id_empresa)->get()->result_array();
    }

    /** 
      * Consultar un Empleado
      * @author: Luisana Lizarazo 
    */
    function consulta_empleado($id_empleado) {
      
      return $this->db->select('*')->from('Empleado')
      ->where('id_empleado',$id_empleado)->get()->result_array();
    }
    /** 
      * Inserta un empleado
      * @author: Luisana Lizarazo 
    */
    function ingresa_empleado($datos) {
        $this->db->insert('Empleado',$datos);
        return $this->db->insert_id(); 
    }

    /** 
      * Actualiza un empleado
      * @author: Luisana Lizarazo 
    */
    function actualiza_empleado($dato) {
        $this->db
            ->set('nombre',$dato['nombre'])
            ->set('correo',$dato['correo'])
            ->set('fecha_nacimiento',$dato['fecha_nacimiento'])
            ->where('id_empleado',$dato['id_empleado'])->update('Empleado');
            return $this->db->insert_id();
    }

    /** 
      * Elimina una empleado
      * @author: Luisana Lizarazo 
    */
    function elimina_empleado($id_empleado) {
        $this->db->where('id_empleado',$id_empleado)->delete('Empleado');
        return $this->db->insert_id();
    }
}

?>