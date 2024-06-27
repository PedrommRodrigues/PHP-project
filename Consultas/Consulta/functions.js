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
