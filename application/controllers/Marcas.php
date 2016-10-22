<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_marcas', 'marcasM');
    }
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  

    public function index() {
        $this->verica_sessao();
        $dados['marcas'] = $this->marcasM->select();
        $this->load->view('manut_marcas', $dados);
    }

    public function incluir() {
        $data = $this->input->post();

        if ($this->marcasM->insert($data)) {
            redirect(base_url('marcas'));
        }
    }

    public function deletar($id) {
        if ($this->marcasM->delete($id)) {
            redirect(base_url('marcas'));
        }
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['marcas'] = $this->db->get('marca')->row();
        $this->load->view('alt_marcas', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->marcasM->update($pegaID)) {
            redirect(base_url('marcas'));
        }
    }

}
