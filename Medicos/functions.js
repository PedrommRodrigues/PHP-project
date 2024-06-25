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

/* ---------------------- open create new medic dialog --------------------- */

const openDialog1 = document.getElementById("openDialog1"); // Vou buscar o botao
const dialog1 = document.getElementById("dialog1");
const closeModal = document.querySelectorAll(".close-modal");
const dialogEdit = document.getElementById("dialog1");
const formTitle = dialogEdit.querySelector("#form-title");
const formBtn = dialogEdit.querySelector("#form-btn");

openDialog1.addEventListener("click", () => {
  formTitle.textContent = "Criar Médico";
  formBtn.textContent = "Criar novo médico";
  dialog1.showModal();
});

/* ------------------------------- Edit medic modal ------------------------------- */

const formEdit = dialogEdit.querySelector("#create-edit");
const editMedicoID = dialogEdit.querySelector("#php_id");
const editNome = dialogEdit.querySelector("#php_nome");
const editPassword = dialogEdit.querySelector("#php_nascimento");
const editMorada = dialogEdit.querySelector("#php_morada");
const editPostal = dialogEdit.querySelector("#php_postal");
const editLocalidade = dialogEdit.querySelector("#php_localidade");
const editContacto = dialogEdit.querySelector("#php_contacto");
const editEmail = dialogEdit.querySelector("#php_email");
const editEspec = dialogEdit.querySelector("#php_espec");

const editBtn = document.querySelectorAll(".edit");

editBtn.forEach((button) => {
  button.addEventListener("click", function () {
    let medicoId = this.getAttribute("id_medico"); // Vamos buscar o atributo "pessoa_id", que estamos a passar no botão

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        formEdit.action = "func-edit-medic.php";
        formTitle.textContent = "Editar médico";
        editMedicoID.value = data.id_medico;
        editNome.value = data.nome;
        // editPassword.value = data.password;
        editEspec.value = data.especializacao;
        editMorada.value = data.morada;
        editPostal.value = data.cod_postal;
        editLocalidade.value = data.localidade;
        editContacto.value = data.contacto;
        editEmail.value = data.email;
        formBtn.textContent = "Guardar alterações";

        dialog1.showModal();
      } else {
        alert("Erro ao processar solicitação.");
      }
    };
    xhr.send("id=" + medicoId);
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

/* ------------------------- func to delete patient ------------------------- */

const deleteBtn = document.querySelectorAll(".delete-patient");
const dialog3 = document.getElementById("dialog3");
const cancelDelete = document.getElementById("btn-close");
const removeLink = document.getElementById("remove-link");

deleteBtn.forEach((btn) => {
  const id_medico = btn.getAttribute("id_medico");

  btn.addEventListener("click", () => {
    removeLink.href = `func-remove-medic.php?id_medico=${id_medico}`;
    dialog3.showModal();
  });
});

cancelDelete.addEventListener("click", () => {
  dialog3.close();
});

/* ------------------------------- Close modal ------------------------------ */

closeModal.forEach((button) => {
  button.addEventListener("click", () => {
    dialog1.close();
    dialog2.close();
  });
});
