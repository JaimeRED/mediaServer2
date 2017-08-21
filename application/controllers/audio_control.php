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
    
    public function upload(){
        if($this->input->post('submit')){
            //Upload to the local server
            $config['upload_path'] = './mediaServer2/archivos/musica/';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            
            if($this->upload->do_upload('file'))
            {
                //Get uploaded file information
                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name'];
                
                //File path at local server
                $source = 'uploads/'.$fileName;
                
                //Load codeigniter FTP class
                $this->load->library('ftp');
                
                //FTP configuration
                $ftp_config['hostname'] = 'localhost'; 
                $ftp_config['username'] = '';
                $ftp_config['password'] = '';
                $ftp_config['debug']    = TRUE;
                
                //Connect to the remote server
                $this->ftp->connect($ftp_config);
                
                //File upload path of remote server
                $destination = '/assets/'.$fileName;
                
                //Upload file to the remote server
                $this->ftp->upload($source, ".".$destination);
                
                //Close FTP connection
                $this->ftp->close();
                
                //Delete file from local server
                @unlink($source);
            }
        }
        $this->load->view('Radio_musica/subir_audio');

    }
}
