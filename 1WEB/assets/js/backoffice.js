document.getElementById("photo").addEventListener("change", function () {
  const fileName = this.files[0]?.name || "Aucun fichier choisi";
  document.getElementById("file-name").textContent = fileName;
});
