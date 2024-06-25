<?php
include('../../funcoes.php');
$conn = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas ORDER BY nome_pessoa;");

$id_pessoa = $_GET['id_pessoa'];

$sql = "SELECT * from pessoas where id_pessoa = $id_pessoa";

$query = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
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
        <div class="side-bar">
            <img src="../../Images/logo-icon-trans 1.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div>
                    <a class="sb-a" href="../../Consultas/">
                        <span class="bar "></span>
                        <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="clicked">
                    <a class="sb-a" href="../Pacientes/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                        <p>Pacientes</p>
                    </a>
                </div>
                <div>
                    <a class="sb-a" href="../../Medicos/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-stethoscope" style="margin: 10px 0px;"></i>
                        <p>Médicos</p>
                    </a>
                </div>
                <div>
                    <span class="bar"></span>
                    <i class="bar"></i>
                    <img src="../../images/icons/requests.svg" alt="">
                    <p>Requests</p>
                </div>
            </div>
            <div class="logout text-medium">
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
                    <img src="../../Images/icons/Bell.svg" alt="sino" />
                    <img class="picture" src="../../Images/doctor.svg" alt="imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main">Margaret Lim</p>
                        <p class="spec">Cardiologist</p>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Patients ----------------------------- -->

            <div class="bottom-right parte-baixo">
                <div class="section section-test">
                    <div class=" nome-section">
                        <p class="blue">Consulta</p>
                        <p class="text-gray">></p>
                        <p class="text-gray">Pedro Rodrigues</p>
                    </div>

                    <div class="contentor-detalhes">
                        <div class="detalhes">
                            <div class="detalhes-section">
                                <img src="../../images/icons/patient.svg" alt="">
                                <div>
                                    <strong>Pedro Rodrigues</strong>
                                    <p class="text-gray">data nasimento</p>
                                </div>
                            </div>
                            <div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img" src="../../images/icons/phone.svg" alt="">
                                    <p>939101129</p>
                                </div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img" src="../../images/icons/email.svg" alt="">
                                    <p>pedro@gmail.com</p>
                                </div>
                            </div>
                            <div class="detalhes-section">
                                <img class="detalhes-img" src="../../images/icons/map.svg" alt="">
                                <p>Avenida Conde D.Henrique<br> lote 173 cave direita</p>
                            </div>
                            <div>
                                <div class="detalhes-section">
                                    <img src="../../images/icons/patients.svg" alt="">
                                    <p>Dr. Pedro Rodrigues</p>
                                </div>
                                <div class="detalhes-section">
                                    <img class="detalhes-img" src="../../images/icons/United.svg" alt="">
                                    <p>United Healthcare</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="subtitulo">Anotações</h4>

                    <!-- bottom  -->

                    <div class="contentor-inferior">
                        <div class="contentor-detalhes detalhes-consulta">
                            <div class="conteudo-consulta">
                                <div class="coluna-detalhes">
                                    <i class="fa-regular fa-xl fa-calendar blue"></i>
                                    <div>
                                        <p class="date-text blue">21 Jan 2021</p>
                                        <p class="text-gray">15:30</p>
                                    </div>
                                </div>

                                <div>
                                    <p class="text-gray">Assunto</p>
                                    <p>Aumento de peso</p>
                                </div>
                                <div class="coluna-detalhes coluna-ultima">
                                    <img src="../../images/icons/patient.svg" alt="">
                                    <div>
                                        <p class="text-gray">Médico</p>
                                        <p>Dr Joao costa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="exams-section">
                                <form action="" class="form-consulta">
                                    <label for="">RCPM</label>
                                    <input class="inputs consulta-input" type="text">
                                    <label for="">CCM</label>
                                    <input class="inputs consulta-input " type="text">
                                    <label for="">Exame de estado geral</label>
                                    <textarea class="consulta-text-area" name="" id=""></textarea>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="functions.js"></script>
</body>

</html>