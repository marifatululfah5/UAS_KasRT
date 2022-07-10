<?= $this->extend('master'); ?>

<?= $this->section('content'); ?>

<h1 class="text-center">Edit Warga</h1>

<form action="<?= base_url() ?>/warga/proses_edit_warga/<?= $warga->id_warga ?>" method="post">
    <div class="row mt-4">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">NIK</label>
                            <input type="number" class="form-control" name="nik" placeholder="Masukan NIK" value="<?= $warga->nik ?>" maxlength="16" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?= $warga->nama ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin_id" id="" class="form-select" required>
                            <option value="">- Pilih Jenis Kelamin -</option>
                            <?php foreach ($dataJenisKelamin as $jenis_kelamin) : ?>
                                <option value="<?= $jenis_kelamin->id_jenis_kelamin ?>" <?= $warga->jenis_kelamin_id == $jenis_kelamin->id_jenis_kelamin ? 'selected' : '' ?>><?= $jenis_kelamin->jenis_kelamin ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" rows="5" class="form-control" placeholder="Masukan alamat warga" required><?= $warga->alamat ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">Edit Warga</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>