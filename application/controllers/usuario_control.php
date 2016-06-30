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
            redirect('http://localhost/mediaServer2/index.php');
        }
    }
    
    public function seleccion(){
        $method = $this->input->post('menu');
        echo $method;
    }
    
    Public function lista_usuarios(){
        $data = array();
        $this->load->model('usuario_model');
        $data['lusuarios'] = $this->usuario_model->listar_usuarios();
        $this->load->view('Usuarios/lista_users',$data);
    }
    
    public function guardar($id_usuario = null){
        $data = array();
        $this->load->model('usuario_model');
        $this->load->library('encryption');
        if($id_usuario != null){
            $usuario = $this->usuario_model->buscar_u($id_usuario);
            $data['id_usuario'] = $usuario->id_usuario;
            $data['nombre'] = $usuario->nombre;
            $data['username'] = $usuario->username;
            $data['categoria'] = $usuario->categoria;
            $data['password'] = $this->encryption->decrypt($usuario->password);
        }else{
            $data['id_usuario'] = null;
            $data['nombre'] = null;
            $data['username'] = null;
            $data['categoria'] = null;
            $data['password'] = null;
        }
        $this->load->view('Usuarios/usuario_form',$data);
    }
    
    public function guardar_post($id_usuario = null){
        if($this->input->post()){
            $this->load->library('encryption');
            $id_usuario = $this->input->post('id_usuario');
            $nombre = $this->input->post('nombre');
            $username = $this->input->post('usuario');
            $categoria = $this->input->post('categoria');
            $password = $this->input->post('pwd');
            $encodPass = $this->encryption->encrypt($password);
            $this->load->model('Usuario_model');
            $this->Usuario_model->guardar_u($nombre,$username,$encodPass,$categoria,$id_usuario);
            redirect('http://localhost/mediaServer2/index.php/Usuario_control/index');
        }
        $this->usuario_control->lista_usuarios();
    }
    
    public function eliminar($id_usuario){
        $this->load->model('usuario_model');
        $this->usuario_model->eliminar_u($id_usuario);
        $this->lista_usuarios();
    }
}
