const fileInput = document.querySelector("#file");
const fileLabel = document.querySelector(".custom_file_upload");

fileInput.addEventListener("change", function () {
  const fileName = fileInput.value.split("\\").pop();
  fileLabel.textContent = fileName || "Faylı endir";
});
