function openModal() {
    var modal = document.getElementById('modalTambahJurusan');
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById('modalTambahJurusan');
    modal.style.display= "none";
}

window.addEventListener('click', function(e) {
    var modal = document.getElementById('modalTambahJurusan');
    if(e.target === modal) {
        modal.style.display='none';
    }
});