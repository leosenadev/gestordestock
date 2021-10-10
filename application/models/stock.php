<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Model{

    public function tudo(){

       return $this->db->get('produtos')->result_array();

    }
    //=====================================================================
    public function dados_produto($id){

        return $this->db->from("produtos")->where('id_produto',$id)->get()->result_array();

    }
    //=====================================================================
    public function editar_produto($id){
        //Verifica a existencia do produto
        $designacao = $this->input->post('txt_designacao');

        $resultado = $this->db->from('produtos')->where('id_produto',$id)->where('designacao',$designacao)->get();

        if($resultado->num_rows() != 0):
            return array(
                "resultado"=>false,
                "mensagem"=>"Produto existente !"
            );
        endif;

        //Atualiza o produto
        $this->db->set("designacao",$designacao)->where("id_produto",$id)->update("produtos");
        
        return array("resultado"=>true,"mensagem"=>'');
    }
    //=====================================================================
    public function novo_produto(){
        $designacao = $this->input->post("txt_designacao");
        //Verifica a existencia do produto
        $resultado = $this->db->from("produtos")->where("designacao",$designacao)->get();

        if($resultado->num_rows() != 0):
            //se existir emite uma alerta de erro
            return array("resultado"=>false,"mensagem"=>"Já existe um produto com a mesma designação");
        endif;

        //Grava novos dados
        $dados = array("designacao"=>$designacao,"quantidade"=>0);
        $this->db->insert("produtos",$dados);

        return array("resultado"=>true,"mensagem"=>'');
    }
    //=====================================================================
    public function eliminar($id){

        $this->db->from("produtos")->where("id_produto",$id)->delete();
    }
    //=====================================================================
    public function totalProduto(){

        $total = $this->db->from("produtos")->get();
        return $total->num_rows();
    }
    //=====================================================================
   
    //=====================================================================
    public function alterar_quantidade($id,$quantidade){

        //Altera a quantidade do produto
        $this->db->where("id_produto",$id)->set("quantidade","quantidade + ".$quantidade,FALSE)->update("produtos");

        //Adiciona nova entrada em 'movimentos'
        date_default_timezone_set("America/Bahia");

        $dados = array(
            'id_produto' =>  $id,
            'quantidade' =>  $quantidade,
            'data_hora' => date("Y-m-d H:i:s")
        );

        $this->db->insert("movimentos",$dados);
    }
    //=====================================================================
    public function movimentos(){
        $resultados = $this->db->select('m.*, p.designacao designacao, p.quantidade temp')
                               ->from("movimentos as m")
                               ->join("produtos as p","m.id_produto = p.id_produto","left")
                               ->get();
        return $resultados->result_array();
    }
    public function limpar_movimentos(){
        $this->db->empty_table("movimentos");
        $this->db->query("ALTER TABLE movimentos AUTO_INCREMENT =1");
    }
}
?>