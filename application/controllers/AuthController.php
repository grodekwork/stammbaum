<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->library('session');

        $this->load->model('User');

    }

    public function index(){

        
        
        $newdata = array(
            "name" => "test1",
            "mail" => "test@test.com"    
        );

        $this->session->set_userdata($newdata);

        $this->session->unset_userdata("mail");

        if($this->session->has_userdata('mail')){

            echo $this->session->userdata('mail');

        }else{
            echo $this->User->sayHello();

            echo "<hr>";

            echo $this->User->verify();
         
        }
        



    }
    
}