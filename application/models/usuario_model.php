<?php
class usuario_model extends CI_Model{
    public function _construct(){
        parent::__construct();
    }
    
    public function guardar_u($nombre,$username,$password,$categoria,$idusuario=null){
        $data=array('nombre'=>$nombre,'username'=>$username,'password'=>$password,'categoria'=>$categoria);
        if($idusuario){
            $this->db->where('idusuario',$idusuario);
            $this->db->update('usuarios',$data);
        }else{
            $this->db->insert('usuarios',$data);
        }
    }
    public function eliminar_u($idusuario){
        $this->db->where('idusuario',$idusuario);
        $this->db->where;
    }
          
    public function buscar_u($idusuario){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('idusuario',$idusuario);
        $consulta=$this->db->get();
        $resultado=$consulta->row();
        return $resultado;
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
