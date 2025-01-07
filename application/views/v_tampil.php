<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4 class="text-center mb-4">Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/users'); ?>" class="nav-link text-white">
                        <i class="fas fa-home"></i> daftar pengguna
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/tambah'); ?>" class="nav-link text-white">
                        <i class="fas fa-plus"></i> Tambah Barang
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/tambah_t'); ?>" class="nav-link text-white">
                        <i class="fas fa-plus"></i> Tambah Transaksi
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/transaksi'); ?>" class="nav-link text-white">
                        <i class="fas fa-shopping-cart"></i> Transaksi
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

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <h3 class="text-center mb-4">Daftar Barang Toko Sepatu</h3>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($barang_sepatu)): ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data barang</td>
                        </tr>
                        <?php else: ?>
                        <?php $no = 1; foreach ($barang_sepatu as $item): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <img src="<?php echo !empty($item->gambar) ? base_url('uploads/' . $item->gambar) : base_url('uploads/default.png'); ?>" 
                                     alt="Gambar Barang" 
                                     class="img-thumbnail" 
                                     style="width: 100px; height: auto;">
                            </td>
                            <td><?php echo $item->nama_barang; ?></td>
                            <td><?php echo $item->jenis_barang; ?></td>
                            <td>Rp<?php echo number_format($item->harga, 0, ',', '.'); ?></td>
                            <td><?php echo $item->stok; ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('index.php/crud/edit/' . $item->id); ?>" class="btn btn-warning btn-sm" aria-label="Edit <?php echo $item->nama_barang; ?>">Edit</a>
                                <a href="<?php echo base_url('index.php/crud/delete/' . $item->id); ?>" class="btn btn-danger btn-sm" aria-label="Hapus <?php echo $item->nama_barang; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
