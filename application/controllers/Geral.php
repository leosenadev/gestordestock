<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geral extends CI_Controller {

    
  public function index(){
   
    if($this->session->has_userdata('id_usuario')):
      $this->menuInicial();
    else:
      $this->quadroLogin();
    endif;
   
  
  }//=============================================

  public function quadroLogin(){
    //se existr uma sessao ativa, salta o quadro do menu inicial
    if($this->session->has_userdata('id_usuario')):
      $this->menuInicial();
    endif;

    $this->load->view("layout/_header");
    $this->load->view("layout/cabecalho");

    $this->load->view("usuarios/login");

    $this->load->view("layout/rodape");
    $this->load->view("layout/_footer");
    
  }//=============================================

  public function menuInicial(){
    //caso nao existir uma sessao retorna ao quadro de login - se existir redireciona para o menu inicial
    if(!$this->session->has_userdata('id_usuario')):
      $this->quadroLogin();
    else:
      //vai para o menu inicial - Pagina do sistema
      redirect("gestao/home");
    endif;


  }
  
  //=============================================
  public function verificarLogin(){
      //Verifica se existe uma sessao ativa e apresenta o menu inicial
      if($this->session->has_userdata('id_usuario')):
        $this->menuInicial();
      else:
       //caso nao existir verifica os dados de autenticacao
        $this->load->model('usuarios');
        //Se validadado :
        if($this->usuarios->verificar_login()):
          //Apresenta o menu inicial
          $this->menuInicial();

        else:
          //
          $this->loginInvalido();

        endif;
      endif;

  }//=============================================
  public function loginInvalido(){
    if($this->session->has_userdata('id_usuario')):
      $this->menuInicial();
    else:
      $this->load->view("layout/_header");
      $this->load->view("layout/cabecalho");

      $dados = [
        "mensagem" => "Usuario e senha incorreto !",
        "tipo" => "danger"
      ];
    
      $this->load->view("layout/mensagem",$dados);
      $this->load->view("usuarios/login");
      $this->load->view("layout/rodape");
      $this->load->view("layout/_footer");

    endif;

  }
  //=============================================
  public function logout(){
    if($this->session->has_userdata('id_usuario')):
      //retira as sessoes de login

      $this->session->unset_userdata('id_usuario');
      $this->session->unset_userdata('usuario');

    endif;

    $this->menuInicial();
  }


  //=============================================
  public function setup(){
    $this->load->view("layout/_header");
    $this->load->view("setup/setup");
    $this->load->view("layout/_footer");
    

  }
  //=============================================
  public function resetdb(){
    //Carreaga a Model
    $this->load->model("basedados");
    $this->basedados->reset();
    //===================================
    $this->load->view("layout/_header");
    $this->load->view("setup/setup");
    $dados = array(
      "mensagem" => "DB Resetado !",
      "tipo" =>"success"
    );

    
    $this->load->view("layout/mensagem",$dados);
    $this->load->view("layout/_footer");
  }
  //==============================================
  public function inserirusuarios(){
    
    //Carrega a Model
    $this->load->model("basedados");
    $this->basedados->inserir_usuarios();
    //=====================================
    $this->load->view("layout/_header");
    $this->load->view("setup/setup");

    $dados = array(
      "mensagem" => "Novo usuário cadastrado ! <strong> Usuário e senha: admin</strong>",
      "tipo" =>"success"
    );
    $this->load->view("layout/mensagem",$dados);
    
    $this->load->view("layout/_footer");
  }
  public function inserirprodutos(){
    $this->load->model('basedados');
    $this->basedados->inserir_produtos();

    $this->load->view("layout/_header");
    $this->load->view("setup/setup");

    $dados = array(
      "mensagem" => "Incluido novos produtos",
      "tipo"    =>"success"
    );

    $this->load->view("layout/mensagem",$dados);
    $this->load->view("layout/_footer");

  }
}
?>