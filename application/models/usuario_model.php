<?php

class Usuario_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function ver_usuario($user,$pass){
        $this->db->select('nombre, categoria');
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
    
}