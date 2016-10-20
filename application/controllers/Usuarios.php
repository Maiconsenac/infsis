<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_usuarios', 'usuariosM');
    }
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('admin/login');
       } 
      }  
    
    public function index() {
        $this->verica_sessao();
        $dados['usuarios'] = $this->usuariosM->select();
        $this->load->view('manut_usuarios', $dados);
    }

    public function open_new_usuarios() {
        $this->load->view('cad_usuarios');
    }

    public function incluir() {
        //$this->output->enable_profiler(TRUE);
        
        $dados = $this->input->post();
        $dados['senha'] = md5($this->input->post('senha'));

        if ($this->usuariosM->insert($dados)) {
            redirect(base_url('usuarios'));
        }
        
        
    }

    public function deletar($id) {
        if ($this->usuariosM->delete($id)) {
            redirect(base_url('usuarios'));
        }
    }

    public function alterar($id) {
        $this->db->where('id', $id);
        $dados['usuarios'] = $this->db->get('usuarios')->row();
        $this->load->view('alt_usuarios', $dados);
    }

    public function grava_alteracao() {
        $pegaID = $this->input->post();
        $this->db->where('id', $pegaID['id']);
        if ($this->usuariosM->update($pegaID)) {
            redirect(base_url('usuarios'));
        }
    }

}
