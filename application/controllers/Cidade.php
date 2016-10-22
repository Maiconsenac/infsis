<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_cidade', 'cidadeM');
    }   
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  
    public function index() {
        $this->verica_sessao();
        $this->load->model('model_estado', 'estadoM');
        $dados['estado'] = $this->estadoM->select();
        $dados['cidade'] = $this->cidadeM->select();
        $this->load->view('manut_cidade', $dados);
    }

    public function incluir() {
        $data = $this->input->post();

        if ($this->cidadeM->insert($data)) {
            redirect(base_url('cidade'));
        }
    }

    public function deletar($id) {
        if ($this->cidadeM->delete($id)) {
            redirect(base_url('cidade'));
        }
    }

    public function alterar($id) {
        $this->load->model('model_estado', 'estadoM');
        $dados['estado'] = $this->estadoM->select();
        $this->db->where('id', $id);
        $dados['cidade'] = $this->db->get('cidade')->row();
        $this->load->view('alt_cidade', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->cidadeM->update($pegaID)) {
            redirect(base_url('cidade'));
        }
    }

}
