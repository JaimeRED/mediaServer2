<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of landing_page
 *
 * @author janim
 */
class landing_page extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        session_start();
        if($_SESSION){
            $this->load->view('index');
        } else {
            $this->load->view('login');
        }
    }
    public function login_post($user,$pass){
        session_start();
        $this->load->library('encryption');
        $this->load->model('usuario_model');
        $coded = $this->encryption->encrypt($pass);
        $var = $this->usuario_model->verificar_u($user,$coded);
        if($var != NULL){
            $_SESSION['nombre'] = $var['nombre'];
            $_SESSION['categoria'] = $var['categoria'];
            $this->load->view('index');
        } else {
            session_destroy();
        }
    }
    
}
