<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestao extends CI_Controller{

    public function home(){
        if(!$this->session->has_userdata('id_usuario')):

            redirect("geral");
        else:

            $this->load->view("layout/_header");
            $this->load->view("layout/cabecalho");

            $this->load->model("stock");
            
            $dados['produto'] = $this->stock->tudo();
            $dados['totalproduto'] = $this->stock->totalproduto();

            $this->load->view("stock/inicio",$dados);
            $this->load->view("layout/rodape_interno");
            $this->load->view("layout/_footer");
        endif;
    }
    public function editar($id){
        if(!$this->session->has_userdata('id_usuario')):
            redirect("geral");
        else:
            $this->load->view("layout/_header");
            $this->load->view("layout/cabecalho");

            $this->load->model("stock");
            
            $dados['produto'] = $this->stock->dados_produto($id)[0];

            $this->load->view("stock/editar",$dados);
            $this->load->view("layout/rodape_interno");
            $this->load->view("layout/_footer");
            
        endif;

    }
    public function editarGuardar($id){
                        
            $this->load->model("stock");
            $resultado = $this->stock->editar_produto($id);
            //Se o resultado for falso( existir itens apresenta a mensagem)
            if(!$resultado['resultado']):
                $this->load->view("layout/_header");
                $this->load->view("layout/cabecalho");
                //Busca o produto exitente
               $this->load->model("stock");
               $dados['produto'] = $this->stock->dados_produto($id)[0];
                //============================
               $dados['mensagem'] = $resultado['mensagem'];
               //passa os dados de mensagens e atualiza o produto existente
               $this->load->view("stock/editar",$dados);
                //==================================
                $this->load->view("layout/rodape_interno");
                $this->load->view("layout/_footer");
                
            else:
                //se for true atualiza novos dados e apresenta a home
                redirect("gestao/home");
                //===================================
            endif;   
            
    }
    public function novo(){
        $this->load->view("layout/_header");
        $this->load->view("layout/cabecalho");
        $this->load->view("stock/novo");
        $this->load->view("layout/rodape_interno");
        $this->load->view("layout/_footer");

    }
    public function novoGravar(){
        $this->load->model("stock");
        $resultado = $this->stock->novo_produto();

        if(!$resultado['resultado']):
        $this->load->view("layout/_header");
        $this->load->view("layout/cabecalho");

        $this->load->view("stock/novo",$resultado);
        $this->load->view("layout/rodape_interno");
        $this->load->view("layout/_footer");

        else:
            redirect("gestao/home");
        endif;

    }
    public function Eliminar($id,$resposta=false){

        $this->load->model("stock");
             

        if(!$resposta):
            $dados['produto'] = $this->stock->dados_produto($id)[0];

            $this->load->view("layout/_header");
            $this->load->view("layout/cabecalho");
    
            $this->load->view("stock/eliminar",$dados);
            $this->load->view("layout/rodape_interno");
            $this->load->view("layout/_footer");
    
        else:

            $resultado = $this->stock->eliminar($id);
             redirect("gestao/home");
        endif;
        

    }
    public function adicionar($id){
       
        if(is_null($this->input->post("txt_quantidade"))):
            $this->load->view("layout/_header");
            $this->load->view("layout/cabecalho");

            $this->load->model("stock");
            $dados['produto'] = $this->stock->dados_produto($id)[0];

            $this->load->view("stock/adicionar",$dados);
            $this->load->view("layout/rodape_interno");
            $this->load->view("layout/_footer");

        else:
            //Adiciona o valor
            $this->load->model("stock");
            $this->stock->alterar_quantidade($id,$this->input->post("txt_quantidade"));
            redirect("gestao/home");

        endif;


    }
    public function subtrair($id){
       

        if(is_null($this->input->post("txt_quantidade"))):
            $this->load->view("layout/_header");
            $this->load->view("layout/cabecalho");

            $this->load->model("stock");
            $dados['produto'] = $this->stock->dados_produto($id)[0];

            $this->load->view("stock/subtrair",$dados);
            $this->load->view("layout/rodape_interno");
            $this->load->view("layout/_footer");

        else:
            //subtrair o valor
            $this->load->model("stock");
            $this->stock->alterar_quantidade($id,-$this->input->post("txt_quantidade"));
            redirect("gestao/home");

        endif;
    }
    public function movimentos(){
        $this->load->view("layout/_header");
        $this->load->view("layout/cabecalho");
        $this->load->model("stock");
        $dados['movimentos'] =$this->stock->movimentos();

        $this->load->view("stock/movimentos",$dados);
        $this->load->view("layout/rodape_interno");
        $this->load->view("layout/_footer");
    }
    public function limparRegistroMovimentos(){
        $this->load->model("stock");
        $this->stock->limpar_movimentos();
        $this->movimentos();
    }

}

?>