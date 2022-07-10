<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center">Data Warga</h1>

<?php if (session()->logged_in) : ?>
    <a href="<?= base_url() ?>/warga/tambah" class="btn btn-success mt-3">Tambah Warga</a>
<?php endif ?>

<div class="table-responsive mt-4">
    <table class="table table-bordered nowrap" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <?php if (session()->logged_in) : ?>
                    <th>Aksi</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($dataWarga as $warga) :
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++ ?></td>
                    <td class="align-middle"><?= $warga->nik ?></td>
                    <td class="align-middle"><?= $warga->nama ?></td>
                    <td class="align-middle"><?= $warga->jenis_kelamin ?></td>
                    <td class="align-middle"><?= $warga->alamat ?></td>
                    <?php if (session()->logged_in) : ?>
                        <td class="text-center">
                            <a href="<?= base_url() ?>/warga/edit/<?= $warga->id_warga ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url() ?>/warga/delete/<?= $warga->id_warga ?>" class="btn btn-danger btn-sm" onclick='return confirm("Apakah anda yakin ingin menghapus data warga <?= $warga->nama ?> ?")'>Delete</a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>