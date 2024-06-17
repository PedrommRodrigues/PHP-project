<?php
include('../funcoes.php');
$conexao = conexao();

verificarLogin();

$consulta_sql = mysqli_query($conexao, "SELECT * FROM pessoas, consultas WHERE pessoas.id_pessoa = consultas.id_pessoa;");

// Calculating the number of lines on patients table 

$count = mysqli_query($conexao, "SELECT COUNT(*) AS count FROM pessoas;");

if ($count) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($count);
} else {
    echo "Error: " . mysqli_error($conexao);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="modal-create-client.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../UI/header.css">
    <link rel="stylesheet" href="../UI/sidebar.css">
    <link rel="stylesheet" href="../UI/content-card.css">
    <link rel="stylesheet" href="../UI/table.css">



</head>

<body>
    <div class="container">
        <!-- ------------------------------- Sidebar ------------------------------- -->
        <div class="side-bar">
            <img src="../Images/logo-icon-trans 1.svg" alt="connected clinic" class="logo" />
            <div class="sb-menu text-medium">
                <div>
                    <a href="../Consultas/">
                        <span class="bar "></span>
                        <img src="../images/icons/appointments.svg" alt="Marcações">
                        <p>Consultas</p>
                    </a>
                </div>
                <div class="clicked">
                    <span class="bar active"></span>
                    <img src="../images/icons/patients.svg" alt="Pacientes">
                    <p>Pacientes</p>
                </div>
                <div>
                    <span class="bar"></span>
                    <img src="../images/icons/dashboard.svg" alt="Dashboard">
                    <i class="bar"></i>
                    <p>Dashboard</p>
                </div>
                <div>
                    <span class="bar"></span>
                    <i class="bar"></i>
                    <img src="../images/icons/requests.svg" alt="">
                    <p>Requests</p>
                </div>
            </div>
            <div class="logout text-medium">
                <a href="../logout.php">
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
                    <button>
                        <img src="../images/icons/chevron.svg" alt="" />
                    </button>
                </div>
                <div class="user">
                    <img src="../Images/icons/Bell.svg" alt="sino" />
                    <img class="picture" src="../Images/doctor.svg" alt="imagem do utilizador" />
                    <div class="user-info">
                        <p class="text-main">Margaret Lim</p>
                        <p class="spec">Cardiologist</p>
                    </div>
                </div>
            </div>

            <!-- ---------------------------- Fim de header ---------------------------- -->

            <!-- ---------------------------- Patients ----------------------------- -->
            <div class="bottom-right">
                <div class="section">

                    <!-- ----------------------- Content on top of table ----------------------- -->

                    <div class="section-header">
                        <h1 class="text-h2">Pacientes</h1>
                        <div id="openDialog1" class="add-menu">
                            <img class="add-btn" src="../images/icons/add.svg" alt="Adicionr" title="adicionar novo paciente">
                            <p class="add-text">Adicionar novo paciente</p>
                        </div>

                    </div>


                    <!-- ------------------------------ Container ------------------------------ -->
                    <div class="card-section">
                        <div class="table-header">
                            <p class="counter text-h4">
                                <?php echo $row['count'] ?>
                                <span style="font-weight: 400;">pacientes no total</span>

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
                                        <p class="text-main">Legivel para: Tudo</p>
                                        <img src="../images/icons/chevron.svg" />
                                    </div>
                                    <div class="menu">
                                        <input class="text-main search-input"" type=" text" placeholder="Pesquisa">
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
                                        <th>Médico</th>
                                        <th>Marcar consulta</th>
                                        <th>Eligivel</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!--  ----------------- Line with each line of data on the list ----------------  -->

                                    <?php
                                    while ($linha = mysqli_fetch_assoc($consulta_sql)) {
                                        $nome = $linha['nome'];
                                        $assunto = $linha['assunto'];
                                        $data = $linha['data'];
                                        $covid = $linha['covid'];

                                    ?>
                                        <tr>
                                            <th>
                                                <div class="united">
                                                    <h4 class="text-h4"><?php echo $nome; ?></h4>
                                                </div>
                                                <div class="united">
                                                    <img src="../Images/icons/United.svg" />
                                                    <p class="text-medium" style="color: #A1ACB1">
                                                        United Healthcare
                                                    </p>
                                                </div>
                                            </th>
                                            <td><?php echo $assunto ?></td>
                                            <td class="center">
                                                <div class="type">
                                                </div>
                                                <div class="centered">
                                                    <div><?php echo $data; ?></div>
                                                    <div>
                                                        <p class="bold">
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="color:#06A689">
                                                Covid
                                            </td>
                                            <td class="actions">
                                            </td>
                                            <td>
                                                <button class="details">
                                                    <div class="img">
                                                        <img src="../Images/icons/document.svg" />
                                                    </div>
                                                </button>
                                                <button class="message call-blue">
                                                    <div class="img">
                                                        <img src="../Images/icons/chat.svg" />
                                                    </div>
                                                </button>
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


        <!--  ------------------------------- teste modal ------------------------------  -->

        <dialog id="dialog1">

            <div class="add-card">
                <div class="card-header">
                    <h2>Criar novo cliente</h2>
                </div>
                <div class="card-form">
                    <label>Nome</label>
                    <input class="inputs" name="name" type="text" required />
                    <label>Data de nascimento</label>
                    <input class="inputs" name="birthday" type="date" value="" min="1950-01-01" max="2027-12-31" required />
                    <label>Morada</label>
                    <input class="inputs" name="address" type="text" value="" required />
                    <label>Código postal</label>
                    <input class="inputs" name="postal-code" type="text" value="" required />
                    <label>Localidade</label>
                    <input class="inputs" name="location" type="text" value="" required />
                    <label>Contacto</label>
                    <input class="inputs" name="contact" type="tel" value="" />
                    <label>Email</label>
                    <input class="inputs" name="email" type="email" required />
                    <div class="submit-section">
                        <button class="btn-cancel text-medium">
                            Cancelar
                        </button>
                        <button class="btn-accept text-medium ">
                            Criar novo cliente
                        </button>
                    </div>
                </div>
            </div>
        </dialog>


        <script src="functions.js"></script>
</body>

</html>