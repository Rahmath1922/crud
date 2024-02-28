function openModal() {
  var modal = document.getElementById("modalTambahDosen");
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("modalTambahDosen");
  modal.style.display = "none";
}

//js edit dosen
function openEdit(id, name, nip, keahlian, status, email, tanggalbergabung) {
  var modal = document.getElementById("modalEditDosen");
  modal.style.display = "block";
  console.log(email);

  var editIdInput = document.getElementById("editId");
  var editNameInput = document.getElementById("editName");
  var editNipInput = document.getElementById("editNip");
  var editKeahlianInput = document.getElementById("editKeahlian");
  var editStatusInput = document.getElementById("editStatus");
  var editEmailInput = document.getElementById("editEmail");
  var editTanggalbergabungInput = document.getElementById(
    "editTanggalbergabung"
  );

  editIdInput.value = id;
  editNameInput.value = name;
  editNipInput.value = nip;
  editKeahlianInput.value = keahlian;
  editStatusInput.value = status;
  editEmailInput.value = email;
  editTanggalbergabungInput.value = tanggalbergabung;
}
function closeEdit() {
  var edit = document.getElementById("modalEditDosen");
  edit.style.display = "none";
}
