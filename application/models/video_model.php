<?php
   class video_model extends CI_Model{
       public function _construct(){
           parent::__construct();
           
       }
       public function guardar_v($id_pelicula=null,$titulo, $duracion=null, $fecha_publicacion, $directorio,$descripcion){
           $data=array('titulo'=>$titulo,'directorio'=>$directorio,'descripcion'=>$descripcion);
           if($id_pelicula){
               $this->db->where('id_pelicula',$id_pelicula);
               $this->db->update('pelicla',$data);
           }else{
               $this->db->insert('pelicula',$data);
           }
           
       }
       
       public function Eliminar_v($id_pelicula){
           $this->db->where('id_pelicula',$id_pelicula);
           $this->db->where;
       }
       public function lista_videos(){
           $this->this->db->select('id_pelicula, titulo, directorio, duracion, descripcion, ');
           $this->db->from('pelicula');
           $consulta=$this->db->get();
           $resultado=$consulta->result();
           return $resultado;
           
       }
       
       
   }

