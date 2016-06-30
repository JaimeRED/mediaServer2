<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_control
 *
 * @author janim
 */
class Usuario_control extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index(){
        session_start();
        if($_SESSION){
            if($_SESSION['categoria'] == 'admin'){
                $this->load->view('Usuarios/menu_usuario');
            }
        } else {
            redirect('http://localhost/mediaServer2.0/index.php');
        }
    }
    
}
