<?php
include 'contato.class.php';
$contato = new Contato();

$lista = $contato->getAll();

?>

<html>
    <head>
        <title>Site de Contatos</title>
        <link rel="stylesheet" href="assets/css/estilo.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>

    </head>
    <body>
        
    <h1>Contatos</h1>
    <br/> 
    <a href="adicionar.html" class="modal_ajax">[ Adicionar]</a> 
    <br/> <br/>


    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>AÇÕES</th>
        </tr>
        <?php foreach ($lista as $cont):?>
            <tr>
                <td><?php echo $cont['id'];?></td>
                <td><?php echo $cont['nome'];?></td>
                <td><?php echo $cont['email'];?></td>
                <td>
                    <a href="editar.php?id=<?php echo $cont['id']?>" class="modal_ajax">[ Editar ]</a>
                    <a onclick="return confirm('Deseja excluir?');" href="excluir.php?id=<?php echo $cont['id'];?>">[ Excluir ]</a>
                </td>  
            </tr>
        <?php endforeach;?>
    </table>


    <div class="modal_bg">
        <div class="modal">

        </div>

    </div>












   
    </body>
</html>

