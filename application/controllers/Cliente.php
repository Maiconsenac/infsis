<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {
    
      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('admin/login');
       } 
      }  

    public function index() {
        $this->verica_sessao();
        $this->load->view('index_cliente');
    }

}
