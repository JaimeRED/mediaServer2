<?php
class usuario_model extends CI_Model{
    public function _construct(){
        parent::__construct();
    }
    public function guardar_u($nombre,$username,$password,$categoria,$id_usuario){
        $data=array('nombre'=>$nombre,'username'=>$username,'password'=>$password,'categoria'=>$categoria);
        if($id_usuario != null){
            $this->db->where('id_usuario',$id_usuario);
            $this->db->update('usuario',$data);
        }else{
            $this->db->insert('usuario',$data);
        }
    }
    public function eliminar_u($idusuario){
        $this->db->where('id_usuario',$idusuario);
        $this->db->delete('usuario');
    }
          
    public function buscar_u($idusuario){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('id_usuario',$idusuario);
        $consulta=$this->db->get();
        $resultado=$consulta->row();
        return $resultado;
    }
    
    public function listar_usuarios(){
        $this->db->select('*');
        $this->db->from('usuario');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    
    public function verificar_u($user, $pass){
        $this->load->library('encryption');
        $this->db->select('password');
        $consulta = $this->db->get_where('usuario',array('username' => $user));
        $pwd = $consulta->row()->password;
        $decode_inp = $this->encryption->decrypt($pass);
        $decode_ins = $this->encryption->decrypt($pwd);
        if($decode_inp === $decode_ins){
            $this->db->select('nombre, categoria');
            $consulta = $this->db->get_where('usuario',array('username' => $user));
            $resultado = $consulta->row();
            return $resultado;
        }else{
            return null;
        }
    }
    public function mensaje(){
        echo 'hola';
    }
}
