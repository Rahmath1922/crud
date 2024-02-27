// // Fungsi untuk menangani klik tombol "Hapus Terpilih"
// document.getElementById("deleteButton").addEventListener("click", function () {
//   var selectedCheckboxes = document.querySelectorAll(
//     'input[name="checked_ids[]"]:checked'
//   );
//   if (selectedCheckboxes.length > 0) {
//     var confirmation = confirm(
//       "Apakah Anda yakin ingin menghapus data terpilih?"
//     );
//     if (confirmation) {
//       hapusTerpilih();
//     }
//   } else {
//     alert("Tidak ada data yang dipilih.");
//   }
// });

// // Fungsi untuk menangani klik tombol "Batal"
// document.getElementById("cancelButton").addEventListener("click", function () {
//   batal();
// });

// // Fungsi untuk menampilkan atau menyembunyikan tombol "Hapus Terpilih" dan "Batal" berdasarkan checkbox yang dipilih
// function toggleButtonVisibility() {
//   var selectedCheckboxes = document.querySelectorAll(
//     'input[name="checked_ids[]"]:checked'
//   );
//   var deleteButton = document.getElementById("deleteButton");
//   var cancelButton = document.getElementById("cancelButton");

//   if (selectedCheckboxes.length > 0) {
//     deleteButton.style.display = "inline-block";
//     cancelButton.style.display = "inline-block";
//   } else {
//     deleteButton.style.display = "none";
//     cancelButton.style.display = "none";
//   }
// }

// // Event listener untuk setiap perubahan pada checkbox
// document
//   .querySelectorAll('input[name="checked_ids[]"]')
//   .forEach(function (checkbox) {
//     checkbox.addEventListener("change", function () {
//       toggleButtonVisibility();
//     });
//   });

  