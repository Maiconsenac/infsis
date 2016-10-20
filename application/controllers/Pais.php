<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_pais', 'paisM');
    }
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('admin/login');
       } 
      }  

    public function index() {
        $this->verica_sessao();
        $dados['pais'] = $this->paisM->select();
        $this->load->view('manut_pais', $dados);
    }

    public function incluir() {
        $data = $this->input->post();

        if ($this->paisM->insert($data)) {
            redirect(base_url('pais'));
        }
    }

    public function deletar($id) {
        if ($this->paisM->delete($id)) {
            redirect(base_url('pais'));
        }
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['pais'] = $this->db->get('pais')->row();
        $this->load->view('alt_pais', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->paisM->update($pegaID)) {
            redirect(base_url('pais'));
        }
    }

}
