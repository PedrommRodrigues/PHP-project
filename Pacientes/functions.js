/* ---------------------- open and close create new client dialog --------------------- */

const openDialog1 = document.getElementById("openDialog1"); // Vou buscar o botao
const dialog1 = document.getElementById("dialog1");
const closeModal = document.getElementById("close-modal");

openDialog1.addEventListener("click", () => {
  dialog1.showModal();
});

closeModal.addEventListener("click", () => {
  dialog1.close();
});
