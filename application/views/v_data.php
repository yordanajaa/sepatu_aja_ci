<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <nav class="bg-dark text-white p-3 vh-100" style="width: 250px;">
            <h4 class="text-center mb-4">Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?php echo base_url('index.php/crud/awal'); ?>" class="nav-link text-white">
                        <i class="fas fa-home"></i> Daftar Barang
                    </a>
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

        <div class="flex-grow-1 p-4">
            <h1 class="text-center mb-4">Daftar Pengguna</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($users as $user): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->role; ?></td>
                            <td>
                                <a href="<?php echo site_url('crud/delete_user/' . $user->id); ?>" class="btn btn-danger btn-sm">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
