<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>
<h1 class="text-center">Laporan Kas</h1>

<div class="table-responsive mt-4">
    <table class="table table-bordered nowrap">
        <thead>
            <tr class="text-center text-uppercase">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
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
                    <td class="align-middle"><?= $kas->tanggal ?></td>
                    <td class="align-middle <?= $kas->keterangan == NULL ? 'text-center' : '' ?>"><?= $kas->keterangan != NULL ? $kas->keterangan : '-' ?></td>
                    <td class="align-middle">Rp. <?= $kas->jumlah ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

        <tfoot>
            <tr>
                <th colspan="5" class="text-center text-uppercase">Total</th>
                <th>Rp. <?= $total->total ?></th>
            </tr>
        </tfoot>
    </table>
</div>
<?= $this->endSection(); ?>