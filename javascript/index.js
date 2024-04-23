function openForm() {
  document.getElementById("formPopup").style.display = "block";
  document.getElementById("overlay").style.display = "block";
}

function closeForm() {
  document.getElementById("formPopup").style.display = "none";
  document.getElementById("overlay").style.display = "none";
}

document.getElementById("openFormButton").addEventListener("click", openForm);
document.getElementById("overlay").addEventListener("click", closeForm);