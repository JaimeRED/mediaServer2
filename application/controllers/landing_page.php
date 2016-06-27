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
    
    
}
