<div class="page-header">
    <h1><i class="fas fa-book-open me-3"></i>Buku Tamu Digital</h1>
    <p class="lead">Silakan tinggalkan pesan dan kesan Anda di sini</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header bg-gradient text-white text-center" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Form Buku Tamu</h4>
            </div>
            <div class="card-body p-4">
                <?php echo form_open('BukuTamu/simpan', array('class' => 'needs-validation', 'novalidate' => '')); ?>
                
                <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">
                        <i class="fas fa-user me-2"></i>Nama Lengkap <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                           class="form-control <?php echo (form_error('nama')) ? 'is-invalid' : ''; ?>" 
                           id="nama" 
                           name="nama" 
                           value="<?php echo set_value('nama'); ?>"
                           placeholder="Masukkan nama lengkap Anda"
                           required>
                    <?php if(form_error('nama')): ?>
                        <div class="invalid-feedback">
                            <?php echo form_error('nama'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">
                        <i class="fas fa-envelope me-2"></i>Email <span class="text-danger">*</span>
                    </label>
                    <input type="email" 
                           class="form-control <?php echo (form_error('email')) ? 'is-invalid' : ''; ?>" 
                           id="email" 
                           name="email" 
                           value="<?php echo set_value('email'); ?>"
                           placeholder="Masukkan alamat email Anda"
                           required>
                    <?php if(form_error('email')): ?>
                        <div class="invalid-feedback">
                            <?php echo form_error('email'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="pesan" class="form-label fw-bold">
                        <i class="fas fa-comment me-2"></i>Pesan <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control <?php echo (form_error('pesan')) ? 'is-invalid' : ''; ?>" 
                              id="pesan" 
                              name="pesan" 
                              rows="5" 
                              placeholder="Tulis pesan, kesan, atau saran Anda di sini..."
                              required><?php echo set_value('pesan'); ?></textarea>
                    <?php if(form_error('pesan')): ?>
                        <div class="invalid-feedback">
                            <?php echo form_error('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-text">
                        <i class="fas fa-info-circle me-1"></i>
                        Minimal 10 karakter, maksimal 500 karakter
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                    </button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body text-center">
                <h5 class="card-title">
                    <i class="fas fa-info-circle me-2 text-info"></i>Informasi
                </h5>
                <p class="card-text text-muted">
                    Pesan Anda akan disimpan dan dapat dilihat oleh administrator. 
                    Terima kasih atas partisipasi Anda!
                </p>
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-outline-secondary">
                    <i class="fas fa-eye me-2"></i>Lihat Daftar Pesan
                </a>
            </div>
        </div>
    </div>
</div>

<script>

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Character counter for textarea
document.getElementById('pesan').addEventListener('input', function() {
    var maxLength = 500;
    var currentLength = this.value.length;
    var remaining = maxLength - currentLength;
    
    var counterElement = document.getElementById('char-counter');
    if (!counterElement) {
        counterElement = document.createElement('small');
        counterElement.id = 'char-counter';
        counterElement.className = 'form-text';
        this.parentNode.appendChild(counterElement);
    }
    
    counterElement.innerHTML = '<i class="fas fa-keyboard me-1"></i>Karakter: ' + currentLength + '/' + maxLength;
    
    if (remaining < 50) {
        counterElement.className = 'form-text text-warning';
    } else {
        counterElement.className = 'form-text text-muted';
    }
});
</script>