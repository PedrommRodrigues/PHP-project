<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM medicos ORDER BY nome;");

// Calculating the number of lines on patients table 

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM medicos;");

if ($count) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($count);
} else {
    echo "Error: " . mysqli_error($conexao);
}

$nome_utilizador = $_SESSION['nome_utilizador'];
$spec_utilizador = $_SESSION['spec'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../UI/menu-create-client.css">
    <link rel="stylesheet" href="../UI/menu-create-appointment.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div class="side-bar">
            <img src="../images/logotipo.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div>
                    <a class="sb-a" href="../Consultas/">
                        <span class="bar "></span>
                        <i class="fa-solid fa-xl fa-calendar-days" style="margin: 10px 0px;"></i>
                        <p>Consultas</p>
                    </a>
                </div>
                <div>
                    <a class="sb-a" href="../Pacientes">
                        <span></span>
                        <i class="fa-solid fa-xl fa-user" style="margin: 10px 0px;"></i>
                        <p>Pacientes</p>
                    </a>
                </div>
                <div class="clicked">
                    <span class="bar"></span>
                    <i class="bar active" class="bar"></i>
                    <i class="fa-solid fa-xl fa-stethoscope" style="margin: 10px 0px;"></i>
                    <p>Médicos</p>
                </div>
                <!-- <div>
                    <span class="bar"></span>
                    <i class="bar"></i>
                    <img src="../images/icons/requests.svg" alt="">
                    <p>Requests</p>
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

            <!-- ---------------------------- Patients ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Médicos</h1>
                        <div id="openDialog1" class="add-menu">
                            <img class="add-btn" src="../images//icons/add.svg" alt="Adicionar" title="adicionar novo médico">
                            <p class="add-text">Adicionar novo médico</p>
                        </div>
                    </div>


                    <!-- ------------------------------ Container ------------------------------ -->
                    <div class="card-section">
                        <div class="table-header">
                            <p class="counter text-h4">
                                <?php echo $row['count'] ?>
                                <span style="font-weight: 400;">Médicos no total</span>

                            </p>

                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <div class="header-container">
                                <div class="header-menu">
                                    <div class="menu">
                                        <p class="text-main">Type: All</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>

                                    <div class="menu">
                                        <input id="pesquisa" class="text-main search-input"" type=" text" placeholder="Pesquisa">
                                        <img src="../images/icons/lupe.svg" />
                                    </div>
                                </div>
                            </div>
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                            <!-- ------------------------- Trocar para select -------------------------- -->
                        </div>
                        <div class="patient-list-container">
                            <table>
                                <thead class="text-semibold">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Especialização</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome'];
                                        $id_medico = $linha['id_medico'];
                                        $spec = $linha['especializacao'];
                                        $email = $linha['email'];
                                    ?>
                                        <tr class="linha-tabela">
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4 nome"><?php echo $nome; ?></h4>
                                                </div>

                                            </th>
                                            <td><?php echo $spec ?></td>
                                            <td class="center">
                                                <div class="type">
                                                </div>
                                                <div class="centered">
                                                    <?php echo  $email; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="exams text-medium " style="padding-left: 0px">
                                                </div>
                                            </td>
                                            <td class="actions">
                                            </td>
                                            <td class="last-td">

                                                <img class="expand" src="../images/icons/chevron.svg" alt="expand" />
                                            </td>
                                        </tr>
                                        <tr class="hidden hide-row border">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div id_medico="<?php echo $id_medico; ?>" class=" hidden-buttons edit cancel-td">
                                                    <img src="../images/icons/edit.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold edit-patient">Editar médico</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div id_medico="<?php echo $id_medico; ?>" class="cancel-td hidden-buttons delete-patient">
                                                    <img class="cancelar-round-btn-red delete-patient" src="../images/icons/close.svg" alt="Apagar cliente" title="Apagar cliente">
                                                    <p class="text-semibold delete-patient">Apagar médico</p>
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
        </div>

        <!-- ---------------------------- Fim de Appointments ----------------------------- -->




        <!--  ------------------------------- create patient modal ------------------------------  -->

        <dialog id="dialog1">
            <div class="add-card">
                <div class="card-header">
                    <h2 id="form-title">Criar novo médico</h2>
                </div>
                <div class="card-form">
                    <form action="func-add-client.php" method="post" id="create-edit">
                        <input id="php_id" class="php_id" name="id_medico" value=""></input>
                        <label>Nome</label>
                        <input id="php_nome" class="inputs " name="name" type="text" />
                        <label>Morada</label>
                        <input id="php_morada" class="inputs " name="address" type="text" value="" />
                        <label>Código postal</label>
                        <input id="php_postal" class="inputs" name="postal-code" type="text" value="" />
                        <label>Localidade</label>
                        <input id="php_localidade" class="inputs " name="location" type="text" value="" />
                        <label>Contacto</label>
                        <input id="php_contacto" class="inputs " name="contact" type="tel" value="" />
                        <label>Email</label>
                        <input id="php_email" class="inputs " name="email" type="email" />
                        <label>Especialização</label>
                        <select id="php_espec" name="espec" class="inputs">
                            <option value="Cardiologia">Cardiologia</option>
                            <option value="Medicina Geral">Medicina Geral</option>
                            <option value="Ortopedia">Ortopedia</option>
                            <option value="Estomatologia">Estomatologia</option>
                            <option value="Dermatologia">Dermatologia</option>
                            <option value="Pediatria">Pediatria</option>
                            <option value="Ginecologia">Ginecologia</option>
                            <option value="Neurologia">Neurologia</option>
                            <option value="Psiquiatria">Psiquiatria</option>
                            <option value="Oftalmologia">Oftalmologia</option>
                            <option value="Oncologia">Oncologia</option>
                            <option value="Endocrinologia">Endocrinologia</option>
                            <option value="Urologia">Urologia</option>
                            <option value="Gastroenterologia">Gastroenterologia</option>
                            <option value="Nefrologia">Nefrologia</option>
                            <option value="Hematologia">Hematologia</option>
                            <option value="Reumatologia">Reumatologia</option>
                            <option value="Infectologia">Infectologia</option>
                            <option value="Pneumologia">Pneumologia</option>
                            <option value="Radiologia">Radiologia</option>
                        </select>
                        <div class="submit-section">
                            <button type="reset" class="btn-cancel text-medium close-modal">
                                Cancelar
                            </button>
                            <button id="form-btn" type="submit" class="btn-accept text-medium">
                                Criar novo cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>


        <!-- ------------------------- delete medic  -------------------------- -->

        <dialog id="dialog3">
            <div class="">
                <div class="dialog3-top">
                    <img src="../images/icons/atencao.svg" alt="" style="width: 50px;">
                    <div>
                        <p class="text-h4">Pretende elimintar este médico?</p>
                        <p class="dialog-gray-text">Não é possivel reverter esta ação!</p>
                    </div>
                </div>
                <div>
                    <button id="btn-close" class="btn-cancel">Cancelar</button>
                    <a id="remove-link" href="" class="btn-red">Confirmar</a>
                </div>
            </div>
        </dialog>

        <!-- ------------------------- notificaçao -------------------------- -->

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

        <script src="functions.js"></script>
</body>

</html>