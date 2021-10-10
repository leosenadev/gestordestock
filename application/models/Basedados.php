<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basedados extends CI_Model{

    public function reset(){
        //Metodo nativo do CI , Substituindo o query DELETE TABLE
        //Limpa as tabelas 

        $this->db->empty_table('usuarios');
        $this->db->empty_table('produtos');
        /// Reinicia os id auto increment

        $this->db->query("ALTER TABLE usuarios AUTO_INCREMENT = 1");
        $this->db->query("ALTER TABLE produtos AUTO_INCREMENT = 1");
        $this->db->query("ALTER TABLE movimentos AUTO_INCREMENT = 1");


    }
    public function inserir_usuarios(){

        $dados = array(
            "usuario" => "admin",
            "senha"=> md5("admin")
        );

        //Metodo nativo do CI , Substituindo o query INSERT
        $this->db->insert('usuarios',$dados);

    }
    public function inserir_produtos(){

        $this->db->empty_table('produtos');
        $this->db->query("ALTER TABLE produtos AUTO_INCREMENT = 1");

        $dados = array(
            array('designacao' =>'CPUs','quantidade'=>10),
            array('designacao' =>'Memórias','quantidade'=>10),
            array('designacao' =>'Monitores','quantidade'=>10),
            array('designacao' =>'Discos rígidos','quantidade'=>10)

        );
        //inser_batch() insere dados em massa
        $this->db->insert_batch('produtos',$dados);
        //======================================================


        $this->db->empty_table('movimentos');
        $this->db->query("ALTER TABLE movimentos AUTO_INCREMENT = 1");
        date_default_timezone_set("America/Bahia");
        $dados = array(
            array('id_produto' => 1,'quantidade'=>10, 'data_hora'=> date('Y-m-d H:i:s')),
            array('id_produto' => 2,'quantidade'=>10, 'data_hora'=> date('Y-m-d H:i:s')),
            array('id_produto' => 3,'quantidade'=>10, 'data_hora'=> date('Y-m-d H:i:s')),
            array('id_produto' => 4,'quantidade'=>10, 'data_hora'=> date('Y-m-d H:i:s')),
        );

        $this->db->insert_batch('movimentos',$dados);

    }
}

?>