<?php
include 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $contato->editar($id,$nome, $email);

    header("Location: index.php");
}