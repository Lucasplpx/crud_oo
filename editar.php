<?php 
include 'contato.class.php';
$contato = new Contato();


if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $info = $contato->getInfo($id);

    if(empty($info['email'])){
        header("Location: index.php");
        exit;
    }
    
}else{
    header("Location: index.php");
    exit;
}

?>

<h1>Editar / Alterar</h1>


<form action="aditar_submit.php" method="post">

    <input type="hidden" name="id" value="<?php echo $info['id']?>"/>

    <label for="nome">Nome</label><br/><br/>
    <input type="text" name="nome" value="<?php echo $info['nome']?>" id="nome"/> <br/><br/>

    <label for="email">E-mail</label><br/><br/>
    <input type="email" name="email" value="<?php echo $info['email']?>" id="email"/> <br/><br/>

    <input type="submit" value="Alterar"/>

</form>