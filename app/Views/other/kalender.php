<?= $this->extend('template/admin/full'); ?>
<?= $this->section('content'); ?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0"><?= $judul; ?></h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center" action="" method="get">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="cari" class="form-control search-orders" value="<?= $keyword; ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Cari Tanggal</button>
                        </div>
                    </form>

                </div>
            </div>
            <!--//row-->
        </div>
        <!--//table-utilities-->
    </div>
    <!--//col-auto-->
</div>
<!--//row-->

<div class="app-card app-card-orders-table shadow-sm mb-5">
    <div class="app-card-body">
        <div class="table-responsive">
            <table class="table app-table-hover mb-0 text-left">
                <thead>
                    <tr>
                        <th class="cell">No</th>
                        <th class="cell">Tanggal</th>
                        <th class="cell">Mempelai</th>
                        <th class="cell">Jam</th>
                        <th class="cell">Lokasi</th>
                        <th class="cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 + $startno; ?>
                    <?php foreach ($person as $p) : ?>
                        <?php
                        $id = $p['id'];
                        $nik = $p['nik'];
                        ?>
                        <tr>
                            <td class="cell"><?= $no++; ?></td>
                            <td class="cell"><?= $p['nama']; ?></td>
                            <td class="cell"><span class="truncate"><?= $nik; ?></span></td>
                            <td class="cell"><span><?= $p['tempatlahir']; ?></span><span class="note"><?= tgl_indo($p['tanggallahir']); ?></span></td>
                            <td class="cell"><span class="truncate"><?= $p['jalan'] . ' RT ' . $p['rt'] . ' RW ' . $p['rw'] . ' ,' . $p['keldes'] . ' ,' . $p['kecamatan'] . ' ,' . $p['kabkot'] . ' ,' . $p['provinsi']; ?></span></td>
                            <td class="cell">
                                <a class="btn-sm app-btn-secondary" href="<?= base_url('person/detail' . '/' . $nik); ?>" role="button">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--//table-responsive-->

    </div>
    <!--//app-card-body-->
</div>


<?= $this->endSection(); ?>