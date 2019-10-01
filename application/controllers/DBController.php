<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBController extends CI_Controller {

    public function __construct(){
        
        parent::__construct();

        $this->load->model('User');

    }


    public function installTables(){
        
        $this->User->makeTable();
        
        //parameters: login and password
        $this->User->ifExists('admin','admin');

        
    }



}