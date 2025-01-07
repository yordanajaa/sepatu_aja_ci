<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengguna</title>
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo site_url('crud/tambah_user_aksi'); ?>">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Role:</label>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
