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
        $this->db->from('audio');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    
    public function buscar_a($id_audio){
        $this->db->select('*');
            $this->db->from('audio a'); 
            $this->db->join('imagen i', 'a.id_imagen = i.id_imagen');
            $this->db->where('a.id_audio',$id_audio);
            $this->db->order_by('a.id_audio','asc');         
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            if($consulta->num_rows() != 0)
            {
                return $resultado;
            }
            else
            {
                return false;
            }
    }     
    
       public function Eliminar_v($id_audio){
           $this->db->where('id_audio',$id_audio);
           $this->db->delete('audio');
       }
       
       public function listar_audio(){
            $this->db->select('*');
            $this->db->from('audio a'); 
            $this->db->join('imagen i', 'a.id_imagen = i.id_imagen');
            $this->db->order_by('a.id_audio','asc');         
            $consulta = $this->db->get();
            $resultado = $consulta->result();
            if($consulta->num_rows() != 0)
            {
                return $resultado;
            }
            else
            {
                return false;
            }
       }
}

