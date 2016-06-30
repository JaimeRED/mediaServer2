<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of audio_control
 *
 * @author janim
 */
class Audio_control extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        session_start();
        if($_SESSION){
            $data = array();
            $this->load->model('audio_model');
            $data['lAudio'] = $this->audio_model->listar_audio();
            $this->load->view('Radio_musica/audio_selector',$data);
        } else {
            $this->load->view('login');
        }
    }
    
    public function player(){
        session_start();
        if($_SESSION){
            $data = array();
            $id_audio = $this->input->post('audio');
            $this->load->model('audio_model');
            $data['dAudio'] = $this->audio_model->buscar_a($id_audio);
            $this->load->view('Radio_musica/reproductor',$data);
        } else {
            $this->load->view('login');
        }
    }
}
