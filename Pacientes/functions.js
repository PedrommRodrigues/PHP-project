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

/* ---------------------- open create appointment dialog with AJAX --------------------- */

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
        nomePaciente.textContent = data.nome_pessoa;
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

    console.log(pessoaId);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        formEdit.action = "func-edit-client.php";
        formTitle.textContent = "Editar paciente";
        editPacienteID.value = data.id_pessoa;
        editNome.value = data.nome_pessoa;
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

/* -------------------------- Notification handler -------------------------- */

// Função para remover a mensagem de sucesso após 5 segundos e com click na img
function hideSuccessMessage() {
  const successMessage = document.getElementById("success-message");
  const closeNotification = document.getElementById("close-notification");

  closeNotification.addEventListener("click", () => {
    successMessage.remove();
  });

  if (successMessage) {
    setTimeout(() => {
      successMessage.style.opacity = "0";
      setTimeout(() => {
        successMessage.remove();
      }, 500);
    }, 5000);
  }
}

// Chama a função quando a página é carregada
window.onload = hideSuccessMessage;

/* ------------------------- func to delete patient ------------------------- */

const deleteBtn = document.querySelectorAll(".delete-patient");
const dialog3 = document.getElementById("dialog3");
const cancelDelete = document.getElementById("btn-close");
const removeLink = document.getElementById("remove-link");

deleteBtn.forEach((btn) => {
  const id_pessoa = btn.getAttribute("id_pessoa");

  btn.addEventListener("click", () => {
    removeLink.href = `func-remove-patient.php?id_pessoa=${id_pessoa}`;
    dialog3.showModal();
  });
});

cancelDelete.addEventListener("click", () => {
  dialog3.close();
});

/* ------------------------- func to filter by name ------------------------- */

const searchInput = document.getElementById("pesquisa");
const rows = document.querySelectorAll(".linha-tabela");

searchInput.addEventListener("input", (e) => {
  const searchNome = e.target.value.trim().toLowerCase();

  rows.forEach((row) => {
    const nome = row.querySelector(".text-h4").textContent.toLowerCase();

    if (nome.includes(searchNome)) {
      row.style.display = "table-row";
    } else {
      row.style.display = "none";
    }
  });
});

/* ------------------------ exames executados a cores ----------------------- */

// document.addEventListener("DOMContentLoaded", function () {
//   let rows = document.querySelectorAll(".linha-tabela");

//   rows.forEach(function (row) {
//     let id = row.getAttribute("data-pessoa-id");

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "func-processa_consulta_appt.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//     xhr.onload = function () {
//       if (xhr.status === 200) {
//         let data = JSON.parse(xhr.responseText);
//         console.log(xhr.responseText);
//         const eeg = data.eeg;
//         const exames = data.exames;
//         const pa = data.pressao;

//         const eegElement = row.querySelector(".eeg");
//         const examesElement = row.querySelector(".re");
//         const paElement = row.querySelector(".pa");

//         if (eegElement) eegElement.classList.toggle("green-text", eeg !== "");
//         if (examesElement)
//           examesElement.classList.toggle("green-text", exames !== "");
//         if (paElement) paElement.classList.toggle("green-text", pa !== "");
//       } else {
//         console.error("Erro ao processar solicitação.");
//       }
//     };

//     xhr.send("id=" + id);
//   });
// });

document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM totalmente carregado e analisado");
  let rows = document.querySelectorAll(".linha-tabela");

  rows.forEach(function (row) {
    let id = row.getAttribute("data-pessoa-id");
    console.log("ID da pessoa:", id); // Adicione esta linha para depuração

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta_appt.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log("Resposta do servidor:", xhr.responseText); // Adicione esta linha para depuração
        try {
          let data = JSON.parse(xhr.responseText);

          const eeg = data.eeg;
          const exames = data.exames;
          const pa = data.pressao;

          const eegElement = row.querySelector(".eeg");
          const examesElement = row.querySelector(".re");
          const paElement = row.querySelector(".pa");

          if (eegElement) {
            eegElement.classList.toggle("green-text", eeg === null);
            console.log(
              "eegElement encontrado e classe aplicada:",
              eegElement.classList.contains("green-text")
            );
          } else {
            console.warn("eegElement não encontrado para ID:", id);
          }

          if (examesElement) {
            examesElement.classList.toggle("green-text", exames === null);
            console.log(
              "examesElement encontrado e classe aplicada:",
              examesElement.classList.contains("green-text")
            );
          } else {
            console.warn("examesElement não encontrado para ID:", id);
          }

          if (paElement) {
            paElement.classList.toggle("green-text", pa === null);
            console.log(
              "paElement encontrado e classe aplicada:",
              paElement.classList.contains("green-text")
            );
          } else {
            console.warn("paElement não encontrado para ID:", id);
          }
        } catch (e) {
          console.error("Erro ao analisar JSON:", e);
        }
      } else {
        console.error("Erro ao processar solicitação. Status:", xhr.status);
      }
    };

    xhr.onerror = function () {
      console.error("Erro na requisição AJAX");
    };

    xhr.send("id=" + id);
  });
});

/* ---------------------------- open and close sb --------------------------- */

const open = document.getElementById("open-sb");
const close = document.getElementById("close-sb");
const sidebar = document.getElementById("sb");

open.addEventListener("click", () => {
  sidebar.classList.remove("phone");
});

close.addEventListener("click", () => {
  sidebar.classList.add("phone");
});

/* ----------------------------- Ultima consulta ---------------------------- */

document.addEventListener("DOMContentLoaded", function () {
  let rows = document.querySelectorAll(".linha-tabela");
  const ultimaConsulta = document.querySelectorAll(".ultima-consulta");

  rows.forEach(function (row) {
    let id = row.getAttribute("data-pessoa-id");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta_appt.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        const ultimaData = data.data;
        const text = row.querySelector(".ultima-consulta");

        if (ultimaData) {
          text.textContent = ultimaData;
        } else {
          text.textContent = "Ainda não passou por consulta";
        }
      } else {
        console.error("Erro ao processar solicitação.");
      }
    };

    xhr.send("id=" + id);
  });
});
