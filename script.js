document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pelangganForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const nama = document.getElementById('nama').value.trim();
        const no_hp = document.getElementById('no_hp').value.trim();
        const email = document.getElementById('email').value.trim();

        if (nama === '' || no_hp === '' || email === '') {
            alert('⚠️ Semua field harus diisi!');
            e.preventDefault();
            return;
        }

        if (!confirm('Apakah Anda yakin ingin menyimpan data ini?')) {
            e.preventDefault();
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('menuForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const nama_menu = document.getElementById('nama_menu').value.trim();
        const harga = document.getElementById('harga').value.trim();

        if (nama_menu === '' || harga === '') {
            alert('⚠️ Semua field harus diisi!');
            e.preventDefault();
            return;
        }

        if (!confirm('Apakah Anda yakin ingin menyimpan menu ini?')) {
            e.preventDefault();
        }
    });
});