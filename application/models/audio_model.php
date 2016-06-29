<?php

class audio_model extends CI_Model{
    public function _construct(){
        parent::__construct();
    }
    
    public function guardar_a($id_audio=null, $titulo,$duracion=null, $directorio, $fecha ){
        $Data=array('titulo'=>$titulo, 'directorio'=>$directorio, 'fecha'=>$fecha);
        if($id_audio){
            $this->db->where('id_audio',$id_audio);
            $this->db->update('audio',$data);
            
        }else{
                $this->db->insert('audio',$data);
            }
            
        }
        public function listado_audios(){
        $this->db->select('*');
        $this->db->from('adio');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    
    public function buscar_a($id_audio){
        $this->db->select('*');
        $this->db->from('audio');
        $this->db->where('id_audio',$id_audio);
        $consulta=$this->db->get();
        $resultado=$consulta->row();
        return $resultado;
    }     
}

