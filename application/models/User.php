<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

    private $login;
    private $password;
    private $mail;
    private $hash;
    private $role;


    public function __construct(){

        $this->load->dbforge();

        //load database library

        $this -> load -> database();
        
        //load database utilities

        $this -> load -> dbutil();

        
    }

    public function makeTable(){
        
        echo "<p><b>Table 'User'</b>:  "; 

        if(!$this->db->table_exists('user')){

        
            $fields = array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'login' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '150',
                    'unique' => TRUE
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120',
                ),
                'hash' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '120'
                ),
                'role' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '160'
                )
            );

            $this->dbforge->add_key('id', TRUE);

            $this->dbforge->add_field($fields);

            $this->dbforge->create_table('user');

            echo " created.</p>";
        
        }else{
            echo " existed.</p>";
        }

    }

    public function add(){

    }

    public function sayHello(){
        $this->hash = password_hash("testtesowy",PASSWORD_BCRYPT);
        return $this->hash;
    }

    public function verify(){
        return password_verify("testtesowy",$this->hash);
    }
}

?>