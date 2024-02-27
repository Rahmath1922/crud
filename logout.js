const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

// membuka modal tambah data
function openModal() {
  var modal = document.getElementById("modalTambah");
  modal.style.display = "block";
}
// Fungsi buat menutup close modal tambah
function closeModal() {
  var modal = document.getElementById("modalTambah");
  modal.style.display = "none";
}

// js Edit
function openEdit(id, name, nim, city, email) {
  var modal = document.getElementById("modalEdit");
  modal.style.display = "block";
  console.log(email);

  // mengisi data formulir siswa yang sesuai
  var editIdInput = document.getElementById("editId");
  var editNameInput = document.getElementById("editName");
  var editNimInput = document.getElementById("editNim");
  var editCityInput = document.getElementById("editCity");
  var editEmailInput = document.getElementById("editEmail");

  // Contoh pengisian formulir langsung
  editIdInput.value = id;
  editNameInput.value = name;
  editNimInput.value = nim;
  editCityInput.value = city;
  editEmailInput.value = email;
}

// Fungsi untuk menutup modal edit
function closeEdit() {
  var edit = document.getElementById("modalEdit");
  edit.style.display = "none";
}

// chekbox
function toggleCheckboxes(source) {
  checkboxes = document.getElementsByName("checked_ids[]");
  for (var i = 0, n = checkboxes.length; i < n; i++) {
    checkboxes[i].checked = source.checked;
  }
}


