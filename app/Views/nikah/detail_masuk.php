<?= $this->extend('template/admin/full'); ?>
<?= $this->section('content'); ?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto mb-e">
        <h1 class="app-page-title mb-0"><?= $judul; ?></h1>
    </div>
    <hr>
    <center>
        <b>Data Pernikahan</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">No Register</th>
                <td>:</td>
                <td><?= $data['register']; ?></td>
            </tr>
            <tr>
                <th scope="row">Mas Kawin</th>
                <td>:</td>
                <td><?= $data['acara']['maskawin']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tempat Nikah</th>
                <td>:</td>
                <td><?= $data['acara']['tempat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Waktu</th>
                <td>:</td>
                <td><?= tgl_indo($data['acara']['tanggalnikah']) . ' : ' . $data['acara']['jam'] . ' WIB'; ?></td>
            </tr>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Catin Wanita</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>:</td>
                <td><?= $data['pr']['nama']; ?></td>
            </tr>
            <tr>
                <th scope="row">NIK</th>
                <td>:</td>
                <td><?= $data['pr']['nik']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tempat Tanggal Lahir</th>
                <td>:</td>
                <td><?= $data['pr']['tempatlahir'] . ', ' . tgl_indo($data['pr']['tanggallahir']); ?></td>
            </tr>
            <tr>
                <th scope="row">Status</th>
                <td>:</td>
                <td><?= $data['pr']['status']; ?></td>
            </tr>
            <?php if (isset($data['pr']['noac'])) : ?>
                <tr>
                    <th scope="row">No AC</th>
                    <td>:</td>
                    <td><?= $data['pr']['noac']; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row">Pekerjaan</th>
                <td>:</td>
                <td><?= $data['pr']['pekerjaan']; ?></td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td>:</td>
                <td><?= $data['pr']['agama']; ?></td>
            </tr>
            <tr>
                <th scope="row">Kewarganegaraan</th>
                <td>:</td>
                <td><?= $data['pr']['wn']; ?></td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $data['pr']['jalan'] . ' RT ' . $data['pr']['rt'] . ' RW ' . $data['pr']['rw'] . ' , ' . $data['pr']['keldes'] . ' - ' . $data['pr']['kecamatan'] . ' - ' . $data['pr']['kabkot'] . ' - ' . $data['pr']['provinsi']; ?></td>
            </tr>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Ayah Catin Wanita</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <?php if ($data['aypr']['status'] == 'hidup') : ?>
                <?php
                $aypr = $data['aypr']['detail'];
                ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $aypr['nama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Bin</th>
                    <td>:</td>
                    <td><?= $aypr['bin']; ?></td>
                </tr>
                <tr>
                    <th scope="row">NIK</th>
                    <td>:</td>
                    <td><?= $aypr['nik']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tempat Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $aypr['tempatlahir'] . ', ' . tgl_indo($aypr['tanggallahir']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>:</td>
                    <td><?= $aypr['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <td>:</td>
                    <td><?= $aypr['agama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Kewarganegaraan</th>
                    <td>:</td>
                    <td><?= $aypr['wn']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $aypr['jalan'] . ' RT ' . $aypr['rt'] . ' RW ' . $aypr['rw'] . ' , ' . $aypr['keldes'] . ' - ' . $aypr['kecamatan'] . ' - ' . $aypr['kabkot'] . ' - ' . $aypr['provinsi']; ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $data['aypr']['nama'] . ' (Alm)'; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Ibu Catin Wanita</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <?php if ($data['ibpr']['status'] == 'hidup') : ?>
                <?php
                $ibpr = $data['ibpr']['detail'];
                ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $ibpr['nama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Binti</th>
                    <td>:</td>
                    <td><?= $ibpr['bin']; ?></td>
                </tr>
                <tr>
                    <th scope="row">NIK</th>
                    <td>:</td>
                    <td><?= $ibpr['nik']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tempat Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $ibpr['tempatlahir'] . ', ' . tgl_indo($ibpr['tanggallahir']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>:</td>
                    <td><?= $ibpr['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <td>:</td>
                    <td><?= $ibpr['agama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Kewarganegaraan</th>
                    <td>:</td>
                    <td><?= $ibpr['wn']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $ibpr['jalan'] . ' RT ' . $ibpr['rt'] . ' RW ' . $ibpr['rw'] . ' , ' . $ibpr['keldes'] . ' - ' . $ibpr['kecamatan'] . ' - ' . $ibpr['kabkot'] . ' - ' . $ibpr['provinsi']; ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $data['ibpr']['nama'] . ' (Alm)'; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Catin Pria</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>:</td>
                <td><?= $data['lk']['nama']; ?></td>
            </tr>
            <tr>
                <th scope="row">NIK</th>
                <td>:</td>
                <td><?= $data['lk']['nik']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tempat Tanggal Lahir</th>
                <td>:</td>
                <td><?= $data['lk']['tempatlahir'] . ', ' . tgl_indo($data['lk']['tanggallahir']); ?></td>
            </tr>
            <tr>
                <th scope="row">Status</th>
                <td>:</td>
                <td><?= $data['lk']['status']; ?></td>
            </tr>
            <?php if (isset($data['lk']['noac'])) : ?>
                <tr>
                    <th scope="row">No AC</th>
                    <td>:</td>
                    <td><?= $data['lk']['noac']; ?></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row">Pekerjaan</th>
                <td>:</td>
                <td><?= $data['lk']['pekerjaan']; ?></td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td>:</td>
                <td><?= $data['lk']['agama']; ?></td>
            </tr>
            <tr>
                <th scope="row">Kewarganegaraan</th>
                <td>:</td>
                <td><?= $data['lk']['wn']; ?></td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $data['lk']['jalan'] . ' RT ' . $data['lk']['rt'] . ' RW ' . $data['lk']['rw'] . ' , ' . $data['lk']['keldes'] . ' - ' . $data['lk']['kecamatan'] . ' - ' . $data['lk']['kabkot'] . ' - ' . $data['lk']['provinsi']; ?></td>
            </tr>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Ayah Catin Pria</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <?php if ($data['aylk']['status'] == 'hidup') : ?>
                <?php
                $aylk = $data['aylk']['detail'];
                ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $aylk['nama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Bin</th>
                    <td>:</td>
                    <td><?= $aylk['bin']; ?></td>
                </tr>
                <tr>
                    <th scope="row">NIK</th>
                    <td>:</td>
                    <td><?= $aylk['nik']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tempat Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $aylk['tempatlahir'] . ', ' . tgl_indo($aylk['tanggallahir']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>:</td>
                    <td><?= $aylk['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <td>:</td>
                    <td><?= $aylk['agama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Kewarganegaraan</th>
                    <td>:</td>
                    <td><?= $aylk['wn']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $aylk['jalan'] . ' RT ' . $aylk['rt'] . ' RW ' . $aylk['rw'] . ' , ' . $aylk['keldes'] . ' - ' . $aylk['kecamatan'] . ' - ' . $aylk['kabkot'] . ' - ' . $aylk['provinsi']; ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $data['aylk']['nama'] . ' (Alm)'; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <hr>
    <center>
        <b>Data Ibu Catin Pria</b>
    </center>
    <hr>
    <table class="table">
        <tbody>
            <?php if ($data['iblk']['status'] == 'hidup') : ?>
                <?php
                $iblk = $data['iblk']['detail'];
                ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $iblk['nama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Binti</th>
                    <td>:</td>
                    <td><?= $iblk['bin']; ?></td>
                </tr>
                <tr>
                    <th scope="row">NIK</th>
                    <td>:</td>
                    <td><?= $iblk['nik']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Tempat Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $iblk['tempatlahir'] . ', ' . tgl_indo($iblk['tanggallahir']); ?></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>:</td>
                    <td><?= $iblk['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <td>:</td>
                    <td><?= $iblk['agama']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Kewarganegaraan</th>
                    <td>:</td>
                    <td><?= $iblk['wn']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $iblk['jalan'] . ' RT ' . $iblk['rt'] . ' RW ' . $iblk['rw'] . ' , ' . $iblk['keldes'] . ' - ' . $iblk['kecamatan'] . ' - ' . $iblk['kabkot'] . ' - ' . $iblk['provinsi']; ?></td>
                </tr>
            <?php else : ?>
                <tr>
                    <th scope="row">Nama</th>
                    <td>:</td>
                    <td><?= $data['iblk']['nama'] . ' (Alm)'; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<hr>
<center>
    <div class="row mb-3">
        <center>
            <h2>Print data catin pria</h2>
            <a href="<?= base_url('print/masuk/n1/lk') . '/' . $data['id']; ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-success">N1</button>
            </a>
        </center>
    </div>
    <hr>
    <div class="row">
        <center>
            <h2>Print data catin wanita</h2>
            <a href="<?= base_url('print/n1/pr') . '/' . $data['id']; ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-success">N1</button>
            </a>
            <a href="<?= base_url('print/n2') . '/' . $data['id']; ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-success">N2</button>
            </a>
            <a href="<?= base_url('print/n4') . '/' . $data['id']; ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-success">N4</button>
            </a>
            <a href="<?= base_url('print/n5') . '/' . $data['id']; ?>" target="_blank" rel="noopener noreferrer">
                <button class="btn btn-success">N5</button>
            </a>
        </center>
    </div>
</center>

<?= $this->endSection(); ?>