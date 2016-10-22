<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estado extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_estado', 'estadoM');
    }
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  

    public function index() {
        $this->verica_sessao();
        $this->load->model('model_pais', 'paisM');
        $dados['pais'] = $this->paisM->select();
        $dados['estado'] = $this->estadoM->select();
        $this->load->view('manut_estado', $dados);
    }

    public function incluir() {
        $data = $this->input->post();

        if ($this->estadoM->insert($data)) {
            redirect(base_url('estado'));
        }
    }

    public function deletar($id) {
        if ($this->estadoM->delete($id)) {
            redirect(base_url('estado'));
        }
    }

    public function alterar($id) {
        $this->load->model('model_pais', 'paisM');
        $dados['pais'] = $this->paisM->select();
        $this->db->where('id', $id);
        $dados['estado'] = $this->db->get('estado')->row();
        $this->load->view('alt_estado', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->estadoM->update($pegaID)) {
            redirect(base_url('estado'));
        }
    }

}
