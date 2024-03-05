// MODAL EDIT
function openEdit(id, name, nik, field, email, notelp, gender) {
    var modal = document.getElementById("modalEditPegawai");
    modal.style.display = "block";

    var editIdInput = document.getElementById("editId");
    var editNameInput = document.getElementById("editName");
    var editNikInput = document.getElementById("editNik");
    var editFieldInput = document.getElementById("editField");
    var editNotelpInput = document.getElementById("editNotelp");
    var editEmailInput = document.getElementById("editEmail");
    var editGenderInput = document.getElementById("editGender");

    editIdInput.value = id;
    editNameInput.value = name;
    editNikInput.value = nik;
    editFieldInput.value = field;
    editEmailInput.value = email;
    editNotelpInput.value = notelp;
    editGenderInput.value = gender;
}
function closePegawai() {
   var edit = document.getElementById("modalEditPegawai");
   edit.style.display = "none";
 }
 window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalEditPegawai');
    if(e.target === modal) {
     modal.style.display = 'none';
    }
 });



 // MODAL TAMBAH PEGAWAI
function openModal() {
    var modal = document.getElementById("modalTambahPegawai");
    modal.style.display = "block";    
   }
   
   function closeModal() {
        var modal = document.getElementById("modalTambahPegawai");
        modal.style.display = "none";
   }
   window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalTambahPegawai');
    if(e.target === modal){
      modal.style.display='none';
    }
   });
 
   