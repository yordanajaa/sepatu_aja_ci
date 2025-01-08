<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Tambah Transaksi</h1>
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message; ?></div>
                <?php endif; ?>
                <form method="post" action="<?= site_url('crud/tambah_transaksi'); ?>" class="mt-4">
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Pilih Barang:</label>
                        <select name="barang_id" id="barang_id" class="form-select" required>
                            <?php foreach ($barang_sepatu as $barang): ?>
                                <option value="<?= $barang->id; ?>"><?= $barang->nama_barang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah:</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo base_url('index.php/crud/transaksi'); ?>" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
