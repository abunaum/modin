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
                            <button type="submit" class="btn app-btn-secondary">Cari Data</button>
                        </div>
                    </form>

                </div>
                <!--//col-->
                <div class="col-auto">
                    <button class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        <span class="iconify" data-icon="ant-design:user-add-outlined"></span>
                        Tambah Data
                    </button>
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
                        <th class="cell">Nama</th>
                        <th class="cell">Nik</th>
                        <th class="cell">TTL</th>
                        <th class="cell">Alamat</th>
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
<!--//app-card-->
<?= $pager->links('person', 'halaman'); ?>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Person</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('proses/person'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nik" name="nik" value="<?= old('nik'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jk" class="col-sm-2 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="jk" name="jk" id="jk">
                                <option value="lk">Laki - laki</option>
                                <option value="pr">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempatlahir" class="col-sm-2 col-form-label">TTL</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?= old('tempatlahir'); ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tgllahirpr" name="tgllahir" value="<?= old('tgllahir'); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kerja" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kerja" name="kerja" value="Wiraswasta">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="agama" name="agama" value="ISLAM">
                        </div>
                        <label for="wni" class="col-sm-2 col-form-label">Warga Negara</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="wn" name="wn" value="WNI">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="Provinsi" name="provinsi" id="provinsi" onchange="cekkab()">
                                <option value="">Provinsi</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="kabkot" name="kabkot" id="kabkot" onchange="cekkec()">
                                <option value="">Kabupaten / Kota</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="kec" name="kec" id="kec" onchange="cekdes()">
                                <option value="">Kecamatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="des" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="des" name="des" id="des">
                                <option value="">Kelurahan / Desa</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="rt" name="rt" id="rt">
                                <?php
                                for ($i = 1; $i < 100; $i++) {
                                    echo "<option value='$i'>RT $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="rw" name="rw" id="rw">
                                <?php
                                for ($i = 1; $i < 100; $i++) {
                                    echo "<option value='$i'>RW $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dusun / Jalan" value="<?= old('alamat'); ?>">
                        </div>
                    </div>
                    <hr>
                    <center>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('error')) : ?>
    <?php
    $error = session()->getFlashdata('error');
    $pesan = $error['pesan'];
    $value = $error['value'];
    $keterangan = implode("<br>[x] ", $value);
    ?>
    <script type="text/javascript">
        var pesan = '<?= $pesan ?>';
        var error = '<?= $keterangan ?>';
        Swal.fire({
            title: pesan,
            html: '[x]' + error,
            icon: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Coba lagi ?'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#tambahModal').modal('show');
            }
        })
    </script>
<?php endif; ?>
<script>
    function fieldSorter(fields) {
        return function(a, b) {
            return fields
                .map(function(o) {
                    var dir = 1;
                    if (o[0] === '-') {
                        dir = -1;
                        o = o.substring(1);
                    }
                    if (!parseInt(a[o]) && !parseInt(b[o])) {
                        if (a[o] > b[o]) return dir;
                        if (a[o] < b[o]) return -(dir);
                        return 0;
                    } else {
                        return dir > 0 ? a[o] - b[o] : b[o] - a[o];
                    }
                })
                .reduce(function firstNonZeroValue(p, n) {
                    return p ? p : n;
                }, 0);
        };
    }
    $(document).ready(function() {
        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function() {
            if (this.readyState === 4) {
                response = this.responseText;
                data = JSON.parse(response);
                provinsi = data.provinsi.sort(fieldSorter(['nama']));
                var cprov = document.getElementById('provinsi');
                provinsi.forEach(prov => {
                    nama = prov.nama;
                    id = prov.id;
                    create = "<option value='" + id + "'>" + nama + "</option>"
                    cprov.innerHTML += create;
                });
            }
        });

        xhr.open("GET", "https://dev.farizdotid.com/api/daerahindonesia/provinsi", true);
        xhr.send();
    })

    function cekkab() {
        var id = $('#provinsi').val();
        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function() {
            if (this.readyState === 4) {
                response = this.responseText;
                data = JSON.parse(response);
                kabkot = data.kota_kabupaten.sort(fieldSorter(['nama']));
                var ckabkot = document.getElementById('kabkot');
                var ckec = document.getElementById('kec');
                var cdes = document.getElementById('des');
                $("#kabkot option").remove();
                ckabkot.innerHTML = "<option value=''>Kabupaten / Kota</option>";
                $("#kec option").remove();
                ckec.innerHTML = "<option value=''>Kecamatan</option>";
                $("#des option").remove();
                cdes.innerHTML = "<option value=''>Kelurahan / Desa</option>";
                kabkot.forEach(kk => {
                    nama = kk.nama;
                    id = kk.id;
                    create = "<option value='" + id + "'>" + nama + "</option>"
                    ckabkot.innerHTML += create;
                });
            }
        });

        xhr.open("GET", "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" + id, true);
        xhr.send();
    }

    function cekkec() {
        var id = $('#kabkot').val();
        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function() {
            if (this.readyState === 4) {
                response = this.responseText;
                data = JSON.parse(response);
                kec = data.kecamatan.sort(fieldSorter(['nama']));
                var ckec = document.getElementById('kec');
                var cdes = document.getElementById('des');
                $("#kec option").remove();
                ckec.innerHTML = "<option value=''>Kecamatan</option>";
                $("#des option").remove();
                cdes.innerHTML = "<option value=''>Kelurahan / Desa</option>";
                kec.forEach(kecamatan => {
                    nama = kecamatan.nama;
                    id = kecamatan.id;
                    create = "<option value='" + id + "'>" + nama + "</option>"
                    ckec.innerHTML += create;
                });
            }
        });

        xhr.open("GET", "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" + id, true);
        xhr.send();
    }

    function cekdes(jn) {
        var id = $('#kec').val();
        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function() {
            if (this.readyState === 4) {
                response = this.responseText;
                data = JSON.parse(response);
                des = data.kelurahan.sort(fieldSorter(['nama']));
                var cdes = document.getElementById('des');
                $("#des option").remove();
                cdes.innerHTML = "<option value=''>Kelurahan / Desa</option>";
                des.forEach(d => {
                    nama = d.nama;
                    id = d.id;
                    create = "<option value='" + id + "'>" + nama + "</option>"
                    cdes.innerHTML += create;
                });
            }
        });
        xhr.open("GET", "https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=" + id, true);
        xhr.send();
    }

    function ubahstatus() {
        var status = $('#status').val();
        if (status == 'janda' || status == 'duda') {
            document.getElementById("noaclb").style.display = 'block';
            document.getElementById("noacinput").style.display = 'block';
        } else {
            document.getElementById("noaclb").style.display = 'none';
            document.getElementById("noacinput").style.display = 'none';
        }
    }
</script>

<?= $this->endSection(); ?>