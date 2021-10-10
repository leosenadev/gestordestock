<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model{
    
    public function verificar_login(){
        //METHODO SEM QUERY BUILDER
        /*
        
            $param = array(
                $this->input->post('txt_usuario'),
                md5($this->input->post('txt_senha'))
            );
            $resultado = $this->db->query("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?",$param);
            
        */
        //METHODO COM QUERY BUILDER
        /*
            
            $this->db->from("usuarios");
            $this->where('usuario',$this->input->post('txt_usuario'));
            $this->where('senha',md5($this->input->post('txt_senha')));
            $resultado = $this->get();
        
        */
        //METHODO COM QUERY BUILDER direto
           $resultado = $this->db->from('usuarios')->where('usuario',$this->input->post('txt_usuario'))->where('senha',md5($this->input->post('txt_senha')))->get();

        if($resultado->num_rows() == 0):
            return false;
        else:
            
            //Exemplo de retorno de dados
            /* 1
            $dados_usuario = $resultado->row();
            $dados_usuario->id_usuario;
            $dados_usuario->usuario;
            $dados_usuario->senha;
            */ 
            /* 2
            $dados_usuario = $resultado->result_array();
            $dados_usuario['id_usuario'];
            $dados_usuario['usuario'];
            $dados_usuario['senha'];
            */
            
            $dados_usuario = $resultado->row();
            
            $this->session->set_userdata('id_usuario',$dados_usuario->id_usuario);
            $this->session->set_userdata('usuario',$dados_usuario->usuario);
            
            return true;
        endif;
    }


}


?>