<?php
include("funcoes.php");

$conexao = conexao();

$email = $_POST['email'];
$password = $_POST['password'];

// Check if the person is already created

$emailExists = "SELECT * FROM medicos WHERE email = '" . $email . "'";

$consulta_sql = mysqli_query($conexao, $emailExists) or die(mysqli_error($link));

$resultado = mysqli_fetch_assoc($consulta_sql);



if ($resultado) {
    echo "<script> alert(\"Email already exists!\")</script>";
    redireciona("index.php", "", 0);
} else {

    // Func to add register to DB

    $comando_registo = "INSERT INTO medicos (email, password) VALUES ('" . $email . "', '" . $password . "')";

    $inserir_registo = mysqli_query($conexao, $comando_registo);
    if ($inserir_registo) {
        redireciona("index.php", "", 0);
    } else {
        echo "<script> alert(\" Falha a registar pessoa!!\")</script>";
        redireciona("index.php", "", 0);
    }
}
