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

        $this->makeUser();



    }

    public function makeUser(){

        $this->db->where('login','admin');
        $this->db->from('user');

        if($this->db->count_all_results()==0){

            $data = [
                "login" => "admin",
                "password" => password_hash("admin",PASSWORD_BCRYPT),
                "hash" => password_hash("admin",PASSWORD_BCRYPT),
                "role" => "addmin"
            ];
    
            $this->db->insert("user",$data);

        }else{

            echo "<p>User exists</p>";

        }


       


    }

    public function ifExists($login,$password){

        $this->db->select('password');
        $this->db->from('user');
        $this->db->where('login',$login);
        $this->db->limit(1);
        $query=$this->db->get();

        
        $user = $query->row();

        if(password_verify($password,$user->password)==1){
            echo "Client checked";
        }else{
            echo "Client blocked";
        }
        


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