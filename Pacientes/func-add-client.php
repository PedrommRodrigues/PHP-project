<?php

include('../funcoes.php');
$conexao = conexao();

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$location = $_POST['location'];
$postal = $_POST['postal-code'];
$contact = $_POST['contact'];
$email = $_POST['email'];

$insert_pessoa = "INSERT INTO pessoas (nome, morada, localidade, cod_postal, telefone, email, data_nascimento)
 VALUES ('" . $name . "','" . $address . "','" . $location . "','" . $postal . "','" . $contact . "','" . $email . "','" . $birthday . "')";

echo $insert_pessoa;

$func_add_person = mysqli_query($conexao, $insert_pessoa);

if ($func_add_person) {
    header("Location: index.php");
} else {
    header("Location: index.php");
}
