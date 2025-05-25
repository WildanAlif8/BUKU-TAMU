<div class="page-header">
    <h1><i class="fas fa-users-cog me-3"></i>Panel Admin</h1>
    <p class="lead">Kelola dan lihat semua pesan dari pengunjung</p>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-users fa-3x opacity-75"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="mb-0"><?php echo $total_tamu; ?></h3>
                    <p class="mb-0">Total Pengunjung</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-tools me-2"></i>Aksi Cepat
                </h5>
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?php echo base_url(); ?>" class="btn btn-success w-100 mb-2">
                            <i class="fas fa-plus me-2"></i>Tambah Pesan Baru
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url('admin/export_csv'); ?><?php echo $filter_tanggal ? '?tanggal=' . $filter_tanggal : ''; ?>" class="btn btn-info w-100 mb-2">
                            <i class="fas fa-download me-2"></i>Export CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Filter Data</h5>
    </div>
    <div class="card-body">
        <?php echo form_open('admin', array('method' => 'get', 'class' => 'row g-3')); ?>
            <div class="col-md-6">
                <label for="tanggal" class="form-label">Filter berdasarkan Tanggal:</label>
                <input type="date" 
                       class="form-control" 
                       id="tanggal" 
                       name="tanggal" 
                       value="<?php echo $filter_tanggal; ?>">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-search me-2"></i>Filter
                </button>
                <a href="<?php echo base_url('admin'); ?>" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Reset
                </a>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Daftar Pesan Tamu
            <?php if($filter_tanggal): ?>
                <small class="text-muted">- Tanggal: <?php echo date('d/m/Y', strtotime($filter_tanggal)); ?></small>
            <?php endif; ?>
        </h5>
        <span class="badge bg-primary rounded-pill"><?php echo count($tamu_list); ?> pesan</span>
    </div>
    <div class="card-body p-0">
        <?php if(empty($tamu_list)): ?>
            <div class="text-center py-5">
                <i class="fas fa-inbox fa-4x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada pesan</h5>
                <p class="text-muted">
                    <?php if($filter_tanggal): ?>
                        Tidak ada pesan pada tanggal yang dipilih.
                    <?php else: ?>
                        Belum ada pengunjung yang meninggalkan pesan.
                    <?php endif; ?>
                </p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Nama</th>
                            <th width="20%">Email</th>
                            <th width="35%">Pesan</th>
                            <th width="15%">Tanggal</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($tamu_list as $tamu): ?>
                        <tr>
                            <td class="fw-bold"><?php echo $no++; ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <span class="fw-semibold"><?php echo htmlspecialchars($tamu->nama); ?></span>
                                </div>
                            </td>
                            <td>
                                <a href="mailto:<?php echo $tamu->email; ?>" class="text-decoration-none">
                                    <i class="fas fa-envelope me-1"></i>
                                    <?php echo htmlspecialchars($tamu->email); ?>
                                </a>
                            </td>
                            <td>
                                <div class="pesan-preview">
                                    <?php 
                                    $pesan = htmlspecialchars($tamu->pesan);
                                    echo (strlen($pesan) > 100) ? substr($pesan, 0, 100) . '...' : $pesan; 
                                    ?>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    <?php echo date('d/m/Y', strtotime($tamu->tanggal_dibuat)); ?>
                                    <br>
                                    <i class="fas fa-clock me-1"></i>
                                    <?php echo date('H:i', strtotime($tamu->tanggal_dibuat)); ?>
                                </small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="<?php echo base_url('admin/detail/' . $tamu->id); ?>" 
                                       class="btn btn-sm btn-outline-info" 
                                       title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-danger" 
                                            onclick="confirmDelete('<?php echo base_url('admin/hapus/' . $tamu->id); ?>', '<?php echo htmlspecialchars($tamu->nama); ?>')"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<style>
.avatar-sm {
    width: 32px;
    height: 32px;
}

.pesan-preview {
    line-height: 1.4;
    word-wrap: break-word;
}

.table td {
    vertical-align: middle;
    padding: 15px 12px;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.btn-group .btn {
    margin: 0 1px;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .d-md-flex {
        flex-direction: column;
    }
    
    .d-md-flex .btn {
        width: 100%;
        margin-bottom: 5px;
    }
}
</style>