<div class="container">
    <div class="card col-9 offset-1 mt-3 p-0">
        <div class="card-header bg-warning">
            <h4 class="card-title text-center mb-0 text-light">Halaman Admin</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr>
                    <th>
                        No.
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Password
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
                <?php $i = 1; ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $user ?></td>
                    <td><?= $email ?></td>
                    <td><?= $pass ?></td>
                    <td>
                        <a href="?p=edit&id=<?= $hadeh["id"] ?>" class="btn btn-sm btn-success">ubah</a>
                        <a href="?p=hapus&id=<?= $hadeh["id"] ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            </table>
        </div>
    </div>
</div>