</div> <!-- End Container -->

    <!-- Footer -->
    <footer class="text-center text-white mt-5 py-4">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Buku Tamu Digital. Dibuat dengan <i class="fas fa-heart text-danger"></i> menggunakan CodeIgniter 3</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Auto hide alerts
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                if (alert.classList.contains('alert-success')) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            });
        }, 5000);

        // Konfirmasi hapus
        function confirmDelete(url, nama) {
            if (confirm('Apakah Anda yakin ingin menghapus pesan dari ' + nama + '?')) {
                window.location.href = url;
            }
        }

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>