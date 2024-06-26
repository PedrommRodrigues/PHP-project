/* ---------------------- // Mostra consulta selecionad --------------------- */

const consulta = document.querySelectorAll(".detalhes-consulta");

consulta.forEach((btn) => {
  btn.addEventListener("click", () => {
    const id_consulta = btn.getAttribute("id_consulta");
    consulta.forEach((btn) => btn.classList.remove("active-appt"));

    btn.classList.toggle("active-appt");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func-processa_consulta.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
      if (xhr.status === 200) {
        let data = JSON.parse(xhr.responseText);

        if (!data.error) {
          document.getElementById("pa").textContent = data.pressao;
          document.getElementById("exames").textContent = data.exames;
          document.getElementById("eeg").textContent = data.eeg;
          document.getElementById("notas").textContent = data.notas;
        } else {
          alert("Erro: " + data.error);
        }
      } else {
        alert("Erro ao processar solicitação.");
      }
    };

    xhr.send("id=" + id_consulta);
  });
});
