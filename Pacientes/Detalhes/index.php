<?php
include('../../funcoes.php');
$conexao = conexao();

verificarLogin();

$id_pessoa = $_GET['id_pessoa'];

$sql = "SELECT * FROM pessoas, consultas, medicos WHERE pessoas.id_pessoa = consultas.id_pessoa AND consultas.id_medico = medicos.id_medico AND pessoas.id_pessoa = $id_pessoa ORDER BY consultas.data DESC ";

$query_sql = mysqli_query($conexao, $sql);

if ($query_sql) {
    $linha = mysqli_fetch_assoc($query_sql);
    $nome_pessoa = $linha['nome_pessoa'];
    $nascimento = $linha['data_nascimento'];
    $contacto = $linha['telefone'];
    $morada = $linha['morada'];
    $localidade = $linha['localidade'];
    $email = $linha['email'];
    $medico = $linha['nome'];
    $assunto = $linha['assunto'];
    $data = $linha['data'];
    $horario = $linha['horario'];
    $medico = $linha['nome'];
}

$nome_utilizador = $_SESSION['nome_utilizador'];
$spec_utilizador = $_SESSION['spec'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../../UI/menu-create-client.css">
    <link rel="stylesheet" href="../../UI/menu-create-appointment.css">
    <link rel="stylesheet" href="../../styles.css">
    <link rel="stylesheet" href="../../UI/header.css">
    <link rel="stylesheet" href="../../UI/sidebar.css">
    <link rel="stylesheet" href="../../UI/content-card.css">
    <link rel="stylesheet" href="../../UI/table.css">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div id="sb" class="side-bar phone">
            <img src="../../images/logotipo.svg" alt="connected clinic" class="logo" />
            <i id="close-sb" class="fa-solid fa-xl fa-x close"></i>
            <div class="sb-menu text-medium">
                <div class="phone-menu-item">
                    <a class="sb-a" href="../../Consultas/">
                        <span class="bar "></span>
                        <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="clicked  phone-menu-item">
                    <a class="sb-a clicked" href="../../Pacientes/">
                        <span class="bar active"></span>
                        <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                        <p style="font-weight: 600;">Pacientes</p>
                    </a>
                </div>
                <div class="phone-menu-item">
                    <a class="sb-a" href="../../Medicos/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-stethoscope" style="margin: 10px 0px;"></i>
                        <p>Médicos</p>
                    </a>
                </div>
            </div>
            <div class="logout text-medium class=" phone-menu-item"">
                <a class="sb-a" href="../logout.php">
                    <span class="bar"></span>
                    <img src="../../images/icons/log-out.svg" alt="">
                    <p>Log Out</p>
                </a>
            </div>
        </div>

        <!-- --------------------------- Fim de Sidebar ---------------------------- -->


        <!-- ------------------------------- Header -------------------------------- -->
        <div class="right-part">
            <div class="header">
                <div class="hospital text-main">
                    <img src="../../images/icons/home.svg" alt="" style="color: #A1ACB1;">
                    <p>Kansas City Family Medical Care</p>
                </div>
                <div class="user">
                    <img class="phone" src="../../images/icons/Bell.svg" alt="sino" />
                    <img class="picture phone" src="../../images/icons/patient.svg" alt="imagem do utilizador" title="Imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main"><?php echo $nome_utilizador; ?></p>
                        <p class="spec"><?php echo $spec_utilizador; ?></p>
                    </div>
                    <i id="open-sb" class="fa-solid fa-xl fa-bars hamburger"></i>

                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Patients ----------------------------- -->
            <div class="bottom-right parte-baixo">
                <div class="section section-test">
                    <div class=" nome-section">
                        <p class="blue">Paciente </p>
                        <p class="text-gray">></p>
                        <p class="text-gray"><?php echo $nome_pessoa; ?></p>
                    </div>

                    <!-- detalhes pessoa -->

                    <div class="contentor-detalhes">
                        <div class="detalhes">
                            <div class="detalhes-section">
                                <img class="phone" src="../../images/icons/patient.svg" alt="">
                                <div>
                                    <strong><?php echo $nome_pessoa; ?></strong>
                                    <p class="text-gray"><?php echo $nascimento; ?></p>
                                </div>
                            </div>
                            <div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img " src="../../images/icons/phone.svg" alt="">
                                    <p><?php echo $contacto; ?></p>
                                </div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img" src="../../images/icons/email.svg" alt="">
                                    <p><?php echo $email; ?></p>
                                </div>
                            </div>
                            <div class="detalhes-section phone">
                                <img class="detalhes-img" src="../../images/icons/map.svg" alt="">
                                <p><?php echo $morada; ?>, <?php echo $localidade; ?></p>
                            </div>
                            <div class="phone">
                                <div class="detalhes-section">
                                    <img src="../../images/icons/patients.svg" alt="">
                                    <p><?php echo $medico; ?></p>
                                </div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img" src="../../images/icons/United.svg" alt="">
                                    <p>United Healthcare</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="subtitulo">Consultas</h4>



                    <!-- bottom left -->
                    <div class="contentor-inferior">
                        <div class="contentor-inferior-esq">
                            <?php
                            $consultas = mysqli_query($conexao, "SELECT * FROM consultas, medicos, pessoas WHERE pessoas.id_pessoa = consultas.id_pessoa AND consultas.id_medico = medicos.id_medico AND pessoas.id_pessoa = $id_pessoa ORDER BY data DESC");

                            while ($consulta = mysqli_fetch_assoc($consultas)) {
                                $pressao = $consulta['pressao'];
                                $data_consulta = $consulta['data'];
                                $hora_consulta = $consulta['horario'];
                                $medico_consulta = $consulta['nome'];
                                $assunto = $consulta['assunto'];
                                $id_consulta = $consulta['id_consulta'];
                            ?>


                                <div class="contentor-detalhes detalhes-consulta " id_consulta="<?php echo $id_consulta; ?>">
                                    <div class="coluna-detalhes">
                                        <i class="fa-regular fa-xl fa-calendar blue phone"></i>
                                        <div>
                                            <p class="date-text blue"><?php echo $data_consulta; ?></p>
                                            <p class="text-gray"><?php echo $hora_consulta; ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-gray">Assunto</p>
                                        <p><?php echo $assunto; ?></p>
                                    </div>
                                    <div class="coluna-detalhes coluna-ultima">
                                        <img class="phone" src="../../images/icons/patient.svg" alt="">
                                        <div>
                                            <p class="text-gray">Médico</p>
                                            <p>Dr(a) <?php echo $medico_consulta; ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                        <!-- bottom right -->

                        <div class="contentor-inferior-drt">
                            <div class="inferior-drt-header">
                                <h5 class="text-blue">Notas de consulta</h5>
                                <img src="../../images/icons/edit.svg" alt="">
                            </div>
                            <strong>Pressão arterial média</strong>
                            <p id="pa" class="space-bottom"></p>
                            <strong>Resultado de Exames</strong>
                            <p id="exames" class="space-bottom"></p>
                            <strong>Exame de estado geral</strong>
                            <p id="eeg" class="space-bottom"></p>
                            <strong> Notas</strong>
                            <p id="notas"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="functions.js"></script>
</body>

</html>