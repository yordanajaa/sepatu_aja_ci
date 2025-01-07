<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Edit Barang</h3>
        <form action="<?php echo base_url('index.php/crud/update/' . $barang_sepatu->id); ?>" method="post" enctype="multipart/form-data" class="p-4 border rounded">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" value="<?php echo $barang_sepatu->nama_barang; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <input type="text" name="jenis_barang" id="jenis_barang" value="<?php echo $barang_sepatu->jenis_barang; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" value="<?php echo $barang_sepatu->harga; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" value="<?php echo $barang_sepatu->stok; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
                <small class="text-muted d-block mt-1">Gambar saat ini:</small>
                <img src="<?php echo base_url('uploads/' . $barang_sepatu->gambar); ?>" alt="Gambar Barang" class="img-thumbnail mt-2" style="width: 150px;">
            </div>
            <div class="d-flex justify-content-end">
                <a href="<?php echo base_url('index.php/crud/awal'); ?>" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
