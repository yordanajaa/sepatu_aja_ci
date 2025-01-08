<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4 class="text-center mb-4">Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/awal'); ?>" class="nav-link text-white">
                        <i class="fas fa-home"></i> Daftar Barang                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/tambah'); ?>" class="nav-link text-white">
                        <i class="fas fa-plus"></i> Tambah Barang
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/transaksi'); ?>" class="nav-link text-white">
                        <i class="fas fa-shopping-cart"></i> Daftar Transaksi
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/tambah_t'); ?>" class="nav-link text-white">
                        <i class="fas fa-plus"></i> Tambah Transaksi
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/users'); ?>" class="nav-link text-white">
                        <i class="fas fa-user"></i> Daftar Pengguna
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/tambah_user'); ?>" class="nav-link text-white">
                        <i class="fas fa-user-plus"></i> Tambah User
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/logout'); ?>" class="nav-link text-white">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <div class="container p-4">
            <h3 class="text-center mb-4">Daftar Transaksi</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($transaksi as $t): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <img src="<?= !empty($t->gambar) ? base_url('uploads/' . $t->gambar) : base_url('uploads/default.png'); ?>" 
                                         alt="<?= $t->nama_barang ? 'Gambar ' . $t->nama_barang : 'Gambar tidak tersedia'; ?>" 
                                         class="img-thumbnail" 
                                         style="width: 100px; height: auto;">
                                </td>
                                <td><?= $t->nama_barang; ?></td>
                                <td><?= $t->jumlah; ?></td>
                                <td>Rp <?= number_format($t->total_harga, 0, ',', '.'); ?></td>
                                <td>
                                    <a href="<?= site_url('crud/delete_transaksi/' . $t->id); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Yakin ingin menghapus transaksi ini?');">
                                       Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>