<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagen_model
 *
 * @author janim
 */
class imagen_model extends CI_Model{
       public function _construct(){
           parent::__construct();
           
       }
       
       public function listar_imagen(){
            $this->db->select('*');
            $this->db->from('imagen');
            $consulta=$this->db->get();
            $resultado=$consulta->result();
            return $resultado;
       }
   }

