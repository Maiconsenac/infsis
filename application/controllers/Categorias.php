<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_categorias', 'categoriasM');
    }
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  

    public function index() {
        $this->verica_sessao();
        $dados['categorias'] = $this->categoriasM->select();
        $this->load->view('manut_categorias', $dados);
    }

    public function incluir() {
        $data = $this->input->post();

        if ($this->categoriasM->insert($data)) {
            redirect(base_url('categorias'));
        }
    }

    public function deletar($id) {
        if ($this->categoriasM->delete($id)) {
            redirect(base_url('categorias'));
        }
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['categorias'] = $this->db->get('categorias')->row();
        $this->load->view('alt_categorias', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->categoriasM->update($pegaID)) {
            redirect(base_url('categorias'));
        }
    }

}
