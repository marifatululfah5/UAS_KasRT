<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center">Transaksi Kas</h1>
<?php if (session()->logged_in) : ?>
    <a href="<?= base_url() ?>/kas/tambah-transaksi" class="btn btn-success mt-3">Tambah Transaksi</a>
<?php endif ?>

<div class="table-responsive mt-4">
    <table class="table table-bordered nowrap" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <?php if (session()->logged_in) : ?>
                    <th>Aksi</th>
                <?php endif ?>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($dataKas as $kas) :
            ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++ ?></td>
                    <td class="align-middle"><?= $kas->nik ?></td>
                    <td class="align-middle"><?= $kas->nama ?></td>
                    <td class="align-middle">Rp. <?= $kas->jumlah ?></td>
                    <td class="align-middle"><?= $kas->tanggal ?></td>
                    <td class="align-middle <?= $kas->keterangan == NULL ? 'text-center' : '' ?>"><?= $kas->keterangan != NULL ? $kas->keterangan : '-' ?></td>
                    <?php if (session()->logged_in) : ?>
                        <td class="text-center">
                            <a href="<?= base_url() ?>/kas/edit/<?= $kas->id_iuran ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url() ?>/kas/delete/<?= $kas->id_iuran ?>" class="btn btn-danger btn-sm" onclick='return confirm("Apakah anda yakin ingin menghapus data kas <?= $kas->nama ?> ?")'>Delete</a>
                        </td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>