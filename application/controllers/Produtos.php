<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //nome do arquivo contendo as functions da model
        //2º parametro (opcional) nome a ser usado para referenciar model marcas
        $this->load->model('model_produtos', 'produtosM');
    }

      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  
    
    public function index() {
        $this->verica_sessao();
        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $dados['produtos'] = $this->produtosM->select();
        $this->load->view('manut_produtos', $dados);
    }

    public function open_new_produtos() {
        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $this->load->view('cad_produtos', $dados);
    }

    public function incluir() {
        //recebe os dados do form
        $dados = $this->input->post();

        //define as configurações para armazenar a foto do veículo
        $config['upload_path'] = './fotos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1624;
        $config['max_height'] = 768;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $tipo = "0";
            $mensa = "Erro... Arquivo Inválido ";
        } else {
            $arquivo = $this->upload->data();
            $dados['foto'] = $arquivo['file_name'];

            //inseri registro na tabela de veiculos
            $inc = $this->produtosM->insert($dados);

            // incluir no banco de dados
            if ($inc) {
                $tipo = "1";
                $mensa = "Ok! Produto Corretamente Cadastrado";
            } else {
                $tipo = "0";
                $mensa = "Erro... Produto não cadastrado";
            }
        }

        // define a variaavel de sessao com a mensagem exibida
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        redirect(base_url('produtos'));
    }

    public function alterar($id) {
        $dados['produto'] = $this->produtosM->find($id);

        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();

        $this->load->view('alt_produtos', $dados);
    }

    public function grava_alteracao() {
        $idFoto = $this->input->post('id');

        $produto = $this->produtosM->find($idFoto);

        //recebe os dados do form
        $dados = $this->input->post();

        $mensa = "";
        if ($_FILES["foto"]['tmp_name'] != null) {

            //define as configurações para armazenar a foto do veículo
            $config['upload_path'] = './fotos/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $tipo = "0";
                $mensa = "Erro... Arquivo Inválido " . $this->upload->display_errors();
            } else {
                $arquivo = $this->upload->data();
                $dados['foto'] = $arquivo['file_name'];
                //remove a foto do veículo
                unlink('./fotos/' . $produto->foto);
            }
        }

        //altera o registro na tabela de veiculos
        $alt = $this->produtosM->update($dados);

        // verifica se alterou
        if ($alt) {
            $tipo = "1";
            $mensa .= "Ok! Produto Corretamente Alterado";
        } else {
            $tipo = "0";
            $mensa .= "Erro... Produto não foi alterado";
        }

        // define a variaavel de sessao com a mensagem exibida
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        //recarrega listagem de veículos
        redirect(base_url('produtos'));
    }

    public function deletar($id) {
        //obtém os dados do veículo para posterior exclusão da foto
        $produto = $this->produtosM->find($id);

        $exc = $this->produtosM->delete($id);

        // verifica se alterou
        if ($exc) {
            $tipo = "1";
            $mensa .= "Ok! Produto Excluido Corretamente";

            //remove a foto do veículo
            unlink('./fotos/' . $produto->foto);
        } else {
            $tipo = "0";
            $mensa .= "Erro... Produto não foi excluido";
        }

        // define a variaavel de sessao com a mensagem exibida
        $this->session->set_flashdata('tipo', $tipo);
        $this->session->set_flashdata('mensa', $mensa);

        //recarrega listagem de veículos
        redirect(base_url('produtos'));
    }

    public function pesquisar() {
        $pesquisa = $this->input->post('pesquisado');

        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $dados['produtos'] = $this->produtosM->realizaPesquisa($pesquisa); //realiza a pesquisa na model
        $this->load->view('manut_produtos', $dados);
    }

    public function pesquisarCategoria() {
        $idCategoria = $this->input->post('idCategoria');

        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $dados['produtos'] = $this->produtosM->realizaPesquisaCategoria($idCategoria); //realiza a pesquisa na model
        $this->load->view('manut_produtos', $dados);
    }

    public function pesquisarMarca() {
        $idMarca = $this->input->post('idMarca');

        $this->load->model('model_marcas', 'marcasM');
        $this->load->model('model_categorias', 'categoriasM');
        $dados['marcas'] = $this->marcasM->select();
        $dados['categorias'] = $this->categoriasM->select();
        $dados['produtos'] = $this->produtosM->realizaPesquisaMarca($idMarca); //realiza a pesquisa na model
        $this->load->view('manut_produtos', $dados);
    }

}
