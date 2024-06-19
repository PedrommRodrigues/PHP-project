/* ----------------------- Open menu to delete patient ---------------------- */

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

openDialog1.addEventListener("click", () => {
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

closeModal.addEventListener("click", () => {
  dialog1.close();
  dialog2.close();
});
