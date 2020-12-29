<?php

class Process
{
    private $host = 'localhost';
    private $dbname = 'regitros';
    private $username = '';
    private $password = '';

    private $pdo;
    public $msg_error = "";

    public function connectDB()
    {
        try {
            global $pdo;
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        } catch (PDOException $e) {
            $this->msg_error = "Connection denied:" . $e->getMessage();
        }
    }

    public function register($username, $password)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM cadastroUsuarios WHERE username = :e");
        $sql->bindParam(":e", $username);
        
        if ($sql->execute()) {                                                                                        //Read more about PDOStatement::execute at 
                                                                                                                      //https://docs.microsoft.com/pt-br/sql/connect/php/pdostatement-execute?view=sql-server-ver15
            if ($sql->rowCount() > 0) {
                return "User already exists. Try again!";
            } else {
                $sql = $pdo->prepare("INSERT INTO cadastroUsuarios (username, password) VALUES (:u, :p)");
                $sql->bindParam(":u", $username);
                $sql->bindParam(":p", md5($password));
                if ($sql->execute()) {
                    return true;
                } else {
                    return "Unable to insert";
                }
            }
        } else {
            return "Impossible to check. Try again later!";
        }
    }

    public function login($username, $password)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id FROM cadastroUsuarios WHERE username = :u AND password = :p");
        $sql->bindParam(':u', $username);
        $sql->bindParam(':p', md5($password));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data_DB = $sql->fetch();
            session_start();
            $_SESSION['id_user'] = $data_DB['id'];
            return true;
        } else {
            return false;
        }
    }

    public function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
