<div class="page-header">
    <h1><i class="fas fa-user-circle me-3"></i>Detail Pesan Tamu</h1>
    <p class="lead">Informasi lengkap pesan dari pengunjung</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="mb-3">
            <a href="<?php echo base_url('admin'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
            </a>
        </div>

        <div class="card">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>
                    <div>
                        <h4 class="mb-0"><?php echo htmlspecialchars($tamu->nama); ?></h4>
                        <p class="mb-0 opacity-75">
                            <i class="fas fa-envelope me-2"></i>
                            <?php echo htmlspecialchars($tamu->email); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-calendar-alt text-primary me-2"></i>
                            <strong>Tanggal:</strong>
                            <span class="ms-2"><?php echo date('d F Y', strtotime($tamu->tanggal_dibuat)); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <i class="fas fa-clock text-primary me-2"></i>
                            <strong>Waktu:</strong>
                            <span class="ms-2"><?php echo date('H:i:s', strtotime($tamu->tanggal_dibuat)); ?> WIB</span>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="text-primary">
                        <i class="fas fa-comment-dots me-2"></i>Pesan:
                    </h5>
                    <div class="pesan-content p-4 bg-light rounded-3">
                        <?php echo nl2br(htmlspecialchars($tamu->pesan)); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="stat-box text-center p-3 bg-primary bg-opacity-10 rounded-3">
                            <i class="fas fa-keyboard fa-2x text-primary mb-2"></i>
                            <h6 class="text-primary mb-1">Jumlah Karakter</h6>
                            <p class="mb-0 fw-bold"><?php echo strlen($tamu->pesan); ?> karakter</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box text-center p-3 bg-success bg-opacity-10 rounded-3">
                            <i class="fas fa-font fa-2x text-success mb-2"></i>
                            <h6 class="text-success mb-1">Jumlah Kata</h6>
                            <p class="mb-0 fw-bold"><?php echo str_word_count($tamu->pesan); ?> kata</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat-box text-center p-3 bg-info bg-opacity-10 rounded-3">
                            <i class="fas fa-list-ol fa-2x text-info mb-2"></i>
                            <h6 class="text-info mb-1">Jumlah Baris</h6>
                            <p class="mb-0 fw-bold"><?php echo substr_count($tamu->pesan, "\n") + 1; ?> baris</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted small">
                        <i class="fas fa-info-circle me-1"></i>
                        ID: #<?php echo $tamu->id; ?>
                    </div>
                    <div>
                        <a href="mailto:<?php echo $tamu->email; ?>?subject=Re: Pesan Anda di Buku Tamu&body=Halo <?php echo $tamu->nama; ?>,%0A%0ATerima kasih atas pesan Anda." 
                           class="btn btn-success btn-sm me-2">
                            <i class="fas fa-reply me-1"></i>Balas Email
                        </a>
                        <button type="button" 
                                class="btn btn-danger btn-sm" 
                                onclick="confirmDelete('<?php echo base_url('admin/hapus/' . $tamu->id); ?>', '<?php echo htmlspecialchars($tamu->nama); ?>')">
                            <i class="fas fa-trash me-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body text-center">
                <h6 class="card-title">Navigasi Cepat</h6>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="<?php echo base_url('admin'); ?>" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-list me-1"></i>Semua Pesan
                    </a>
                    <a href="<?php echo base_url('admin/export_csv'); ?>" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-download me-1"></i>Export CSV
                    </a>
                    <a href="<?php echo base_url(); ?>" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-plus me-1"></i>Tambah Pesan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-lg {
    width: 60px;
    height: 60px;
}

.info-item {
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

.info-item:last-child {
    border-bottom: none;
}

.pesan-content {
    border-left: 4px solid #667eea;
    font-size: 1.1rem;
    line-height: 1.6;
    word-wrap: break-word;
    white-space: pre-wrap;
}

.stat-box {
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.stat-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .card-header .d-flex {
        flex-direction: column;
        text-align: center;
    }
    
    .card-header .avatar-lg {
        margin-bottom: 15px;
    }
    
    .row.mb-4 {
        margin-bottom: 20px;
    }
    
    .card-footer .d-flex {
        flex-direction: column;
        gap: 15px;
    }
    
    .card-footer .text-muted {
        text-align: center;
    }
}
</style>