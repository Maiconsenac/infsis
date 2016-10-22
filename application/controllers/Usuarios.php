<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_usuarios', 'usuariosM');
    }

    public function verica_sessao() {
        $this->load->model('model_produtos', 'produtosM');
        $this->load->model('model_marcas', 'marcasM');
        $dados['produtos'] = $this->produtosM->select();
        $dados['marcas'] = $this->marcasM->select();
        if (!$this->session->logado) {
            $this->load->view('index_cliente', $dados);
        } else {
            if ($this->session->nivel == 2) {
                $this->load->view('index_admin', $dados);
            } else {
                $this->load->view('index_cliente', $dados);
            }
        }
    }

    public function index() {
        $this->verica_sessao();
        $this->load->model('model_produtos', 'produtosM');
        $this->load->model('model_marcas', 'marcasM');
        $dados['produtos'] = $this->produtosM->select();
        $dados['marcas'] = $this->marcasM->select();
    }

    public function login() {
        $this->load->view('login');
    }

    public function logar() {

        $email = $this->input->post('email');
        $senha = $this->input->post('senha');

        $verifica = $this->usuariosM->verificaUsuario($email, $senha);

        if (isset($verifica)) {
            $sessao['nome'] = $verifica->nome;
            $sessao['id'] = $verifica->id;
            $sessao['nivel'] = $verifica->nivel;
            $sessao['logado'] = TRUE;
            $this->session->set_userdata($sessao);
        }
        redirect();
    }

    public function sair() {

        $this->session->sess_destroy();
        redirect();
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
