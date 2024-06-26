<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas, consultas, medicos WHERE pessoas.id_pessoa = consultas.id_pessoa AND consultas.id_medico = medicos.id_medico AND consultas.consultado = 0 ORDER BY consultas.data, consultas.horario;");

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM consultas WHERE consultado = 0;");

if ($count) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($count);
} else {
    echo "Error: " . mysqli_error($conexao);
}


/* ---------------------------------- Dados do usuario --------------------------------- */

$nome_utilizador = $_SESSION['nome_utilizador'];
$spec_utilizador = $_SESSION['spec'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../UI/menu-create-client.css">
    <link rel="stylesheet" href="../UI/menu-create-appointment.css">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div class="side-bar">
            <img src="../images/logotipo.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div class="clicked">
                    <span class="bar active"></span>
                    <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                    <p>Consultas</p>
                </div>
                <div>
                    <a class="sb-a" href="../Pacientes/">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                        <p>Pacientes</p>
                    </a>
                </div>
                <div>
                    <a class="sb-a" href="../Medicos">
                        <span class="bar"></span>
                        <i class="fa-solid fa-xl fa-stethoscope" style="margin: 10px 0px;"></i>
                        <p>Médicos</p>
                    </a>
                </div>
                <!-- <div>
                    <a href="Consulta/"><span class="bar"></span>
                        <img src="../images/icons/dashboard.svg" alt="Dashboard">
                        <p>Dashboard</p>
                    </a>
                </div> -->
            </div>
            <div class="logout text-medium">
                <a class="sb-a" href="../logout.php">
                    <span class="bar"></span>
                    <img src="../images/icons/log-out.svg" alt="">
                    <p>Log Out</p>
                </a>
            </div>
        </div>

        <!-- --------------------------- Fim de Sidebar ---------------------------- -->


        <!-- ------------------------------- Header -------------------------------- -->
        <div class="right-part">
            <div class="header">
                <div class="hospital text-main">
                    <img src="../images/icons/home.svg" alt="" style="color: #A1ACB1;">
                    <p>Kansas City Family Medical Care</p>
                </div>
                <div class="user">
                    <img src="../images/icons/Bell.svg" alt="sino" />
                    <img class="picture" src="../images/icons/patient.svg" alt="imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main"><?php echo $nome_utilizador; ?></p>
                        <p class="spec"><?php echo $spec_utilizador; ?></p>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Appointments ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Consultas</h1>
                        <div class="menu">
                        </div>
                    </div>


                    <!-- ------------------------------ container ------------------------------ -->
                    <div class="card-section">
                        <div class="table-header">
                            <p class="counter text-h4">
                                <?php echo $row['count'] ?>
                                consultas
                            </p>
                            <div class="header-container">
                                <div class="header-menu">
                                    <div class="menu">
                                        <p class="text-main">Type: All</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <p class="text-main">Legivel para: Tudo</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <input id="pesquisa" class="text-main search-input"" type=" text" placeholder="Pesquisa">
                                        <img src="../images/icons/lupe.svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-list-container">
                            <table>
                                <thead class="text-semibold">
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Assunto</th>
                                        <th>Data</th>
                                        <th>Médico</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome_pessoa'];
                                        $assunto = $linha['assunto'];
                                        $data = $linha['data'];
                                        $id_consulta = $linha['id_consulta'];
                                        $time = $linha['horario'];
                                        $type = $linha['tipo_consulta'];
                                        $id_pessoa = $linha['id_pessoa'];
                                        $medico = $linha['nome'];
                                        $espec = $linha['especializacao'];
                                        $email = $linha['email'];
                                    ?>
                                        <tr class=" click-event">
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4 nome"><?php echo $nome; ?></h4>
                                                    <img class="hide check" src="../images/icons/check-one.svg" />
                                                    <img class="hide double" src="../images/icons/check-double.svg" />
                                                </div>
                                                <div class="united">
                                                    <img src="../images/icons/United.svg" />
                                                    <p class="text-medium" style="color: #A1ACB1">
                                                        United Healthcare
                                                    </p>
                                                </div>
                                            </th>
                                            <td><?php echo $assunto ?></td>
                                            <td class="center">
                                                <div class="date-cell">
                                                    <div class="type">
                                                        <img src="../images/icons/<?php echo $type ?>.svg" alt="">
                                                    </div>
                                                    <div>
                                                        <p class="php_date"><?php echo $data; ?></p>
                                                        <strong> <?php echo $time; ?>h</strong>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p><?php echo $medico; ?></p>
                                                <p class="text-gray"><?php echo $espec ?></p>
                                            </td>
                                            <td class="actions">
                                                <button onclick="checkIn(this)" title="Cliente chegou" class="call-blue text-medium check-btn" nomePessoa="<?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?>">
                                                    Check In
                                                </button>
                                                <button onclick="chamar(this)" title="Chamar para consulta" class="call-green text-medium double-btn" nomePessoa="<?php echo htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'); ?>"> Chamar </button>
                                                <a href="Consulta/index.php?id_consulta=<?php echo $id_consulta; ?>" class="call-orange text-medium consulta hide">Consulta</a>
                                            </td>
                                            <td>
                                                <div class="cancel-td-specific cancel-td">
                                                    <a href="../Pacientes/Detalhes?id_pessoa=<?php echo $id_pessoa; ?>" class="details">
                                                        <div class="img">
                                                            <img src="../images/icons/document.svg" />
                                                        </div>
                                                    </a>
                                                    <a href="mailto:<?php echo $email; ?>" class="message call-blue">
                                                        <div class="img">
                                                            <img src="../images/icons/chat.svg" />
                                                        </div>
                                                    </a>
                                                    <img id_pessoa="<?php echo $id_pessoa; ?>" class="expand" src="../images/icons/chevron.svg" alt="expand" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="hidden hide-row  border">
                                            <td class="hidden-line">
                                                <div class="exams">
                                                    <div class="check">
                                                        <img class="eeg-img escondido" src="../images/icons/check-one.svg" alt="">
                                                        <p class="eeg">Consulta bem estar</p>
                                                    </div>
                                                    <div class="check">
                                                        <img class="pam-img escondido" src="../images/icons/check-one.svg" alt="">
                                                        <p class="pam" title="Pressao arterial média">PAM</p>
                                                    </div>
                                                    <div class="check">
                                                        <img class="re-img escondido" src="../images/icons/check-one.svg" alt="">
                                                        <p class="re" title="Resultados de exames">RE</p>
                                                    </div>

                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div pessoa_id="<?php echo $id_pessoa; ?>" class=" hidden-buttons edit cancel-td">
                                                    <img src="../images/icons/edit.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold edit-patient">Editar consulta</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div id_consulta="<?php echo $id_consulta; ?>" class="delete-appointment delete_appt cancel-td">
                                                    <img class="cancelar-round-btn" src="../images/icons/close.svg" alt="Calcelar consulta" title="Cancelar consulta">
                                                    <p class="text-semibold testep">Cancelar consulta</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ---------------------------- Fim de Appointments ----------------------------- -->

        </div>


        <dialog id="dialog3">
            <div class="">
                <div class="dialog3-top">
                    <img src="../images/icons/atencao.svg" alt="" style="width: 50px;">
                    <div>
                        <p class="text-h4">Pretende cancelar esta consulta?</p>
                        <p class="dialog-gray-text">Não é possivel reverter esta ação!</p>
                    </div>
                </div>
                <div>
                    <button class="btn-cancel">Cancelar</button>
                    <a id="remove-link" href="" class="btn-red" href="">Confirmar</a>
                </div>
            </div>
        </dialog>

        <!--  ------------------------------- create appointment modal ------------------------------  -->

        <dialog id="dialog2">
            <div class="add-card">
                <div class="card-header">
                    <h2>Editar consulta</h2>
                </div>
                <div class="client-details">
                    <p>Paciente</p>
                    <p id="php_nome" class="text-h4 "></p>
                    <p id="php_nascimento" class="text-medium text-gray"></p>
                </div>
                <div class="client-contacts">
                    <div>
                        <img src="../images/icons/phone.svg" alt="phone" title="telemovel">
                        <p id="php_contacto"></p>
                    </div>
                    <div>
                        <img src="../images/icons/email.svg" alt="envelope" title="envelope">
                        <p id="php_email"></p>
                    </div>
                    <div>
                        <img src="../images/icons/map.svg" alt="ponto no mapa" title="ponto no mapa">
                        <p id="php_morada"></p>
                    </div>
                </div>
                <div class="card-form">
                    <form method="post" metod="post" action="func-edit-appt.php">
                        <input id="php_id" class="php_id" name="id_pessoa" value=""></input>
                        <label for="medic">Médico</label>
                        <select id="medic" name="medic" class="inputs" value="">
                            <?php
                            $sql = "SELECT * FROM medicos ";
                            $consulta_sql = mysqli_query($conexao, $sql);


                            while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                $nome_medico = $linha['nome'];
                                $id_medico = $linha['id_medico'];
                                $spec = $linha['especializacao'];

                            ?>
                                <option value="<?php if (isset($id_medico)) {
                                                    echo $id_medico;
                                                } ?>"><?php if (isset($nome_medico)) {
                                                            echo $nome_medico;
                                                        } ?> - <?php if (isset($nome_medico)) {
                                                                    echo $spec;
                                                                } ?> </option>
                            <?php } ?>
                        </select>
                        <label for="date">Data da consulta</label>
                        <input id="appt_date" class="inputs" name="date" type="date" value="" min="2000-01-01" max="2027-12-31" />
                        <label for="appt_time">Horário</label>
                        <input id="appt_time" class="inputs" name="appt_time" type="time" value="" />
                        <label>Motivo</label>
                        <input id="motive" class="inputs" name="motive" type="text" value="" />
                        <label for="type_appt">Tipo de consulta</label>
                        <select id="type_appt" name="type_appt" value="" class="inputs">
                            <option value="presencial">Presencial</option>
                            <option value="teleconsulta">Teleconsulta</option>
                        </select>
                        <div class="submit-section">
                            <button type="reset" class="btn-cancel text-medium close-modal">
                                Cancelar
                            </button>
                            <button class="btn-accept text-medium ">
                                Editar consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>

        <!-- ---------------------------- Notificação ----------------------------- -->

        <?php
        if (isset($_SESSION['success'])) {
            echo '<div id="success-message" class="notification-message">
                                            <div class="circle">
                                            </div>
                                            <div class="notification-text">
                                                <p class="text-atualizado">' . $_SESSION['notification-type'] . '</p>
                                                <p class="text-nome">' . $_SESSION['nome'] . '</p>
                                            </div>
                                            <div>
                                                <img id="close-notification" class="cross-notification" src="../images/icons/cross.svg" alt="">
                                            </div>
                                        </div>';
            unset($_SESSION['success']);
            unset($_SESSION['notification-type']);
            unset($_SESSION['nome']);
        }
        ?>

        <!-- ---------------------------- notificações chamada e checkIN ----------------------------- -->

        <div id="success-message" class="notification-message">
            <div class="circle">
            </div>
            <div class="notification-text">
                <p class="texto-topo"></p>
                <p class="texto-nome"></p>
            </div>
            <div>
                <img id="close-notification" class="cross-notification" src="../images/icons/cross.svg" alt="">
            </div>
        </div>

        <script src="functions.js"></script>
</body>

</html>