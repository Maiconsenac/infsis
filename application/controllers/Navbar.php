<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar extends CI_Controller {

    public function open_login() {
        $this->load->view('login');
    }

      public function verica_sessao(){
    
       if(!$this->session->logado){                      
           redirect('usuarios/login');
       } 
      }  
    
}
