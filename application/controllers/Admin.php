<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('admin/login');
       } 
      }    
    
    public function index() {
        $this->verica_sessao();
        $this->load->model('model_produtos', 'produtosM');
        $this->load->model('model_marcas', 'marcasM');
        $dados['produtos'] = $this->produtosM->select();
        $dados['marcas'] = $this->marcasM->select();
        $this->load->view('index_admin', $dados);
    }
   public function login(){        
        $this->load->view('login');  
    }
    
    public function logar(){
        
        $this->load->model('model_usuarios', 'usuarios');
        
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        
        $verifica = $this->usuarios->verificaUsuario($email, $senha);
        
        if(isset($verifica)){
            $sessao['nome'] = $verifica->nome;
            $sessao['id'] = $verifica->id;
            $sessao['logado'] = TRUE;
            $this->session->set_userdata($sessao);
            
        }
        redirect();
    }
    
    public function sair(){
        
        $this->session->sess_destroy();
        redirect();        
    }

}
