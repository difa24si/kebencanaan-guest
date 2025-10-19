<div class="container mt-4">
    <h3>Tambah Data Pelanggan</h3>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

    <form method="post" action="<?= site_url('pelanggan/store') ?>">
        <div class="form-group mb-2">
            <label>Nama Depan</label>
            <input type="text" name="first_name" class="form-control" value="<?= set_value('first_name'); ?>">
        </div>

        <div class="form-group mb-2">
            <label>Nama Belakang</label>
            <input type="text" name="last_name" class="form-control" value="<?= set_value('last_name'); ?>">
        </div>

        <div class="form-group mb-2">
            <label>Tanggal Lahir</label>
            <input type="date" name="birthday" class="form-control" value="<?= set_value('birthday'); ?>">
        </div>

        <div class="form-group mb-2">
            <label>Jenis Kelamin</label>
            <select name="gender" class="form-control">
                <option value="Male">Laki-laki</option>
                <option value="Female">Perempuan</option>
                <option value="Other">Lainnya</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
        </div>

        <div class="form-group mb-3">
            <label>No. Telepon</label>
            <input type="text" name="phone" class="form-control" value="<?= set_value('phone'); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('pelanggan') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

