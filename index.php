<?php
include 'contato.class.php';
$contato = new Contato();

$lista = $contato->getAll();

?>

<h1>Contatos</h1>
<br/> 
<a href="adicionar.html">[ Adicionar]</a> 
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
                <a href="editar.php?id=<?php echo $cont['id']?>">[ Editar ]</a>
                <a onclick="return confirm('Deseja excluir?');" href="excluir.php?id=<?php echo $cont['id'];?>">[ Excluir ]</a>
            </td>  
        </tr>
    <?php endforeach;?>
</table>