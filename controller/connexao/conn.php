<?php
class conn{
    private $servername;
    private $username;
    private $password;
    private $db;


    function __construct($servername,$username,$password,$db)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

    function conectar(){
        $conn = new mysqli($this->servername, $this->username, $this->password,$this->db);
        return $conn;
    }

    function query($sql){
        $this->conectar()->query($sql);
    }
    
}


?>