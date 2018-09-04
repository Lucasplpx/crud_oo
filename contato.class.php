<?php


class Contato {

    private $pdo;


    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }


    public function adicionar($email , $nome = '') {
        // 1 passo = verificar se o email ja existe no sistema
        // 2 passo = adicionar

        if($this->existeEmail($email) == false){
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function getNome($email){
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch();

            $nome = $info['nome'];
            return $nome;
        } else {
            return '';
        }

        
    }

    public function getAll(){
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);
        

        if($sql->rowCount() > 0){
            $info = $sql->fetchAll();
            return $info;
        }else{
            return array();
        }
    }


    public function editar($nome, $email){
        if($this->existeEmail($email) == true){
            $sql = "UPDATE contatos SET nome = :nome WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function excluir($email){
        if($this->existeEmail($email)){
            $sql = "DELETE FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }


    }

    private function existeEmail($email){
        $sql = "SELECT email FROM contatos WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }

   

}


?>