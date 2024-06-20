/* ----------------------- Open menu to delete and edit patient ---------------------- */

const expand = document.querySelectorAll(".expand");

expand.forEach((button) => {
  button.addEventListener("click", function () {
    const currentRotation = this.style.transform === "rotate(180deg)" ? 0 : 180;
    this.style.transform = `rotate(${currentRotation}deg)`;
    const hiddenRow = this.closest("tr").nextElementSibling;
    hiddenRow.classList.toggle("show-row");
    hiddenRow.classList.toggle("hide-row");
  });
});

/* ---------------------- open create new client dialog --------------------- */

const openDialog1 = document.getElementById("openDialog1"); // Vou buscar o botao
const dialog1 = document.getElementById("dialog1");
const closeModal = document.querySelectorAll(".close-modal");
const dialogEdit = document.getElementById("dialog1");
const formTitle = dialogEdit.querySelector("#form-title");
const formBtn = dialogEdit.querySelector("#form-btn");

openDialog1.addEventListener("click", () => {
  formTitle.textContent = "Criar Cliente";
  formBtn.textContent = "Criar novo cliente ";
  dialog1.showModal();
});

/* ---------------------- open and close create appointment dialog with AJAX --------------------- */

const openDialog2 = document.querySelectorAll(".openDialog2");
const dialog2 = document.getElementById("dialog2");
const nomePaciente = dialog2.querySelector(".php_nome");
const moradaPaciente = dialog2.querySelector(".php_morada");
const contactoPaciente = dialog2.querySelector(".php_contacto");
const emailPaciente = dialog2.querySelector(".php_email");
const nascimentoPaciente = dialog2.querySelector(".php_nascimento");
const idPaciente = dialog2.querySelector(".php_id");

openDialog2.forEach(function (button) {
  button.addEventListener("click", function () {
    let pessoaId = this.getAttribute("pessoa_id");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        idPaciente.value = data.id_pessoa;
        nomePaciente.textContent = data.nome;
        nascimentoPaciente.textContent = data.data_nascimento;
        moradaPaciente.textContent = data.morada;
        emailPaciente.textContent = data.email;
        contactoPaciente.textContent = data.telefone;

        dialog2.showModal();
      } else {
        alert("Erro ao processar solicitação.");
      }
    };
    xhr.send("id=" + pessoaId);
  });
});

/* ------------------------------- Edit Patient modal ------------------------------- */

const formEdit = dialogEdit.querySelector("#create-edit");
const editPacienteID = dialogEdit.querySelector("#php_id");
const editNome = dialogEdit.querySelector("#php_nome");
const editNascimento = dialogEdit.querySelector("#php_nascimento");
const editMorada = dialogEdit.querySelector("#php_morada");
const editPostal = dialogEdit.querySelector("#php_postal");
const editLocalidade = dialogEdit.querySelector("#php_localidade");
const editContacto = dialogEdit.querySelector("#php_contacto");
const editEmail = dialogEdit.querySelector("#php_email");

const editBtn = document.querySelectorAll(".edit");

editBtn.forEach((button) => {
  button.addEventListener("click", function () {
    let pessoaId = this.getAttribute("pessoa_id"); // Vamos buscar o atributo "pessoa_id", que estamos a passar no botão

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        formEdit.action = "func-edit-client.php";
        formTitle.textContent = "Editar cliente";
        editPacienteID.value = data.id_pessoa;
        editNome.value = data.nome;
        editNascimento.value = data.data_nascimento;
        editMorada.value = data.morada;
        editPostal.value = data.cod_postal;
        editLocalidade.value = data.localidade;
        editContacto.value = data.telefone;
        editEmail.value = data.email;
        formBtn.textContent = "Guardar alterações";

        dialog1.showModal();
      } else {
        alert("Erro ao processar solicitação.");
      }
    };
    xhr.send("id=" + pessoaId);
  });
});
/* ------------------------------- Close modal ------------------------------ */

closeModal.forEach((button) => {
  button.addEventListener("click", () => {
    dialog1.close();
    dialog2.close();
  });
});
