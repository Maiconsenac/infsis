<?php
/**
 * Created by IntelliJ IDEA.
 * User: christian
 * Date: 14/10/16
 * Time: 19:54
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

//        $this->load->view('html-header');

          $this->load->view('home');
//        $this->load->view('footer');
//        $this->load->view('html-footer');
    }
}