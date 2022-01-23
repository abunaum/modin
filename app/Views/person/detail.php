<?= $this->extend('template/admin/full'); ?>
<?= $this->section('content'); ?>
<?php
$id = $person['id'];
$nama = $person['nama'];
$nik = $person['nik'];
if ($person['jeniskelamin'] == 'pr') {
    $jk = 'Perempuan';
} elseif ($person['jeniskelamin'] == 'lk') {
    $jk = 'Laki - laki';
} else {
    $jk = 'Undefined';
}
$ttl = $person['tempatlahir'] . ', ' . tgl_indo($person['tanggallahir']);
$pekerjaan = $person['pekerjaan'];
$agama = $person['agama'];
$wn = $person['wn'];
$provinsi = $person['provinsi'];
$kabkot = $person['kabkot'];
$kecamatan = $person['kecamatan'];
$keldes = $person['keldes'];
$rt = $person['rt'];
$rw = $person['rw'];
$jalan = $person['jalan'];
$alamat = "$jalan RT $rt RW $rw, $keldes - $kecamatan - $kabkot - $provinsi";
?>

<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto mb-e">
        <h1 class="app-page-title mb-0"><?= $judul; ?></h1>
    </div>
    <hr>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>:</td>
                <td><?= $nama; ?></td>
            </tr>
            <tr>
                <th scope="row">Jenis kelamin</th>
                <td>:</td>
                <td><?= $jk; ?></td>
            </tr>
            <tr>
                <th scope="row">TTL</th>
                <td>:</td>
                <td><?= $ttl; ?></td>
            </tr>
            <tr>
                <th scope="row">Pekerjaan</th>
                <td>:</td>
                <td><?= $pekerjaan; ?></td>
            </tr>
            <tr>
                <th scope="row">Agama</th>
                <td>:</td>
                <td><?= $agama; ?></td>
            </tr>
            <tr>
                <th scope="row">Kewarganegaraan</th>
                <td>:</td>
                <td><?= $wn; ?></td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $alamat; ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <center>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
    </center>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Person</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('proses/edit_person' . '/' . $id); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nik" name="nik" value="<?= $nik; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jk" class="col-sm-2 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="jk" name="jk" id="jk">
                                <?php
                                if ($person['jeniskelamin'] == 'pr') :
                                ?>
                                    <option value="pr">Perempuan</option>
                                    <option value="lk">Laki - laki</option>
                                <?php elseif ($person['jeniskelamin'] == 'lk') : ?>
                                    <option value="lk">Laki - laki</option>
                                    <option value="pr">Perempuan</option>
                                <?php else : ?>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="lk">Laki - laki</option>
                                    <option value="pr">Perempuan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempatlahir" class="col-sm-2 col-form-label">TTL</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?= $person['tempatlahir']; ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tgllahirpr" name="tgllahir" value="<?= $person['tanggallahir']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kerja" class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kerja" name="kerja" value="<?= $person['pekerjaan']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="agama" name="agama" value="<?= $person['agama']; ?>">
                        </div>
                        <label for="wni" class="col-sm-2 col-form-label">Warga Negara</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="wn" name="wn" value="<?= $person['wn']; ?>">
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
                                <option value='<?= $person['rt']; ?>'>RT <?= $person['rt']; ?></option>
                                <?php
                                for ($i = 1; $i < 100; $i++) {
                                    echo "<option value='$i'>RT $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-select" aria-label="rw" name="rw" id="rw">
                                <option value='<?= $person['rw']; ?>'>RW <?= $person['rw']; ?></option>
                                <?php
                                for ($i = 1; $i < 100; $i++) {
                                    echo "<option value='$i'>RW $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Dusun / Jalan" value="<?= $person['jalan']; ?>">
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
                $('#editModal').modal('show');
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
</script>

<?= $this->endSection(); ?>