<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->role; ?></td>
            <td>
                <a href="<?php echo site_url('crud/delete_user/' . $user->id); ?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
