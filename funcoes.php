<?php
function redireciona($url, $mgs = "", $delay = 0)
{
    echo "<meta http-equiv='refresh' content='$delay; url=$url'>";
    if (!empty($mgs))
        echo "<h1> $mgs </h1>";
    die;
}

function conexao()
{
    //$conexao = mysqli_connect("localhost", "Connecta", "Connecta2024!#?", "bdConnecta_pedro");
    $conexao = mysqli_connect("localhost", "root", "", "bd_connecta");


    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    return $conexao;
}


session_start();

function verificarLogin()
{
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    } else {
        $email = $_SESSION['user'];
        $sql_query = mysqli_query(conexao(), "SELECT nome, especializacao from medicos WHERE email = '" . $email . "'");

        if ($sql_query) {
            $linha = mysqli_fetch_assoc($sql_query);
            $_SESSION['nome_utilizador'] = $linha["nome"];
            $_SESSION['spec'] = $linha['especializacao'];
        }
    }
}
