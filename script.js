document.querySelectorAll('.deleteForm').forEach(form => {
    form.addEventListener('submit', function(e) {
        if (!confirm('Yakin ingin menghapus item ini?')) {
            e.preventDefault();
        }
    });
});