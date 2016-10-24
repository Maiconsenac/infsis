<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function verica_sessao() {

        if (!$this->session->logado) {
            redirect('usuarios/login');
        }
    }

    public function index() {
        $this->verica_sessao();
        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $this->load->model('model_produtos', 'produtosM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $dados['produtos'] = $this->produtosM->select();
        $this->load->view('index_admin', $dados);
    }

}
