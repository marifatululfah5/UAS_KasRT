<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center">Tambah Transaksi</h1>

<form action="<?= base_url() ?>/kas/proses_edit_transaksi/<?= $kas->id_iuran ?>" method="post">
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Jumlah</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="number" placeholder="Masukan nominal" class="form-control" name="jumlah" value="<?= $kas->jumlah ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="<?= $kas->tanggal ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Warga</label>
                        <select name="warga_id" id="" class="form-select">
                            <option value="">- Pilih Warga -</option>
                            <?php foreach ($dataWarga as $warga) : ?>
                                <option value="<?= $warga->id_warga ?>" <?= $warga->id_warga == $kas->warga_id ? 'selected' : '' ?>><?= $warga->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="" rows="5" class="form-control" placeholder="Masukan keterangan (optional)"><?= $kas->keterangan ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Edit Transaksi</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>