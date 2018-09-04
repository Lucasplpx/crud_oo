<?php
include 'contato.class.php';

$contato = new Contato();

$info = $contato->getAll();

echo "<pre>";
print_r($info);
echo "<pre/>";

?>