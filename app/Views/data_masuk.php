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
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders">
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
                        <th class="cell">No Register</th>
                        <th class="cell">NIK Perempuan</th>
                        <th class="cell">NIK Laki - laki</th>
                        <th class="cell">Tanggal Nikah</th>
                        <th class="cell">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <?php $id = $d['id']; ?>
                            <td class="cell"><?= $no++; ?></td>
                            <td class="cell"><?= $d['register']; ?></td>
                            <td class="cell"><?= $d['nikpr']; ?></td>
                            <td class="cell"><?= $d['niklk']; ?></td>
                            <td class="cell"><?= $d['acara']; ?></td>
                            <td class="cell">
                                <a class="btn-sm app-btn-secondary" href="<?= base_url('nikah/masuk/detail') . '/' . $id; ?>">View</a>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--//table-responsive-->

    </div>
    <!--//app-card-body-->
</div>
<!--//app-card-->
<nav class="app-pagination">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
<!--//app-pagination-->

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Data Masuk</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('proses/data_masuk'); ?>" method="post">
                    <div class="mb-3 row">
                        <label for="noregister" class="col-sm-2 col-form-label">No Register</label>
                        <div class="col-sm-10" id="noregister">
                            <input type="text" class="form-control" id="noregister" name="noregister">
                        </div>
                    </div>
                    <b>
                        <h3>Data Catin Wanita</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="nikpr" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nikpr" name="nikpr" list="niklistpr">
                            <datalist id="niklistpr">
                                <?php foreach ($perempuan as $pr) : ?>
                                    <option value="<?= $pr['nik']; ?>"><?= $pr['nama']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="statuspr" name="statuspr" id="statuspr" onchange="ubahstatuspr()">
                                <option value="perawan">Perawan</option>
                                <option value="janda">Janda</option>
                                <?php
                                for ($i = 2; $i < 5; $i++) {
                                    echo "<option value='istri ke-$i'>Istri ke - $i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label for="noac" id="noaclb" class="col-sm-1 col-form-label" style="display: none;">NO AC</label>
                        <div class="col-sm-5" id="noacinput" style="display: none;">
                            <input type="text" class="form-control" id="noac" name="noac">
                        </div>
                    </div>
                    <hr>
                    <b>
                        <h3>Data Ayah Catin Wanita</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="statusaypr" class="col-sm-2 col-form-label">Status Ayah Catin Wanita</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="statusaypr" name="statusaypr" id="statusaypr" onchange="cekortu('aypr')">
                                <option value="ada">Hidup</option>
                                <option value="meninggal">Meninggal</option>
                            </select>
                        </div>
                    </div>
                    <div id="hidupaypr">
                        <div class="mb-3 row">
                            <label for="nikay" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nikay" name="nikay" list="niklistaypr">
                                <datalist id="niklistaypr">
                                    <?php foreach ($laki as $lk) : ?>
                                        <option value="<?= $lk['nik']; ?>"><?= $lk['nama']; ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="binay" class="col-sm-2 col-form-label">Bin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="binay" name="binay">
                            </div>
                        </div>
                    </div>
                    <div id="matiaypr" style="display: none;">
                        <div class="mb-3 row">
                            <label for="namaaypr" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaaypr" name="namaaypr">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <b>
                        <h3>Data Ibu Catin Wanita</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="statusibpr" class="col-sm-2 col-form-label">Status Ibu Catin Wanita</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="statusibpr" name="statusibpr" id="statusibpr" onchange="cekortu('ibpr')">
                                <option value="ada">Hidup</option>
                                <option value="meninggal">Meninggal</option>
                            </select>
                        </div>
                    </div>
                    <div id="hidupibpr">
                        <div class="mb-3 row">
                            <label for="nikib" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nikib" name="nikib" list="niklistibpr">
                                <datalist id="niklistibpr">
                                    <?php foreach ($perempuan as $pr) : ?>
                                        <option value="<?= $pr['nik']; ?>"><?= $pr['nama']; ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="binib" class="col-sm-2 col-form-label">Binti</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="binib" name="binib">
                            </div>
                        </div>
                    </div>
                    <div id="matiibpr" style="display: none;">
                        <div class="mb-3 row">
                            <label for="namaibpr" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namaibpr" name="namaibpr">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <b>
                        <h3>Data Catin Pria</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="niklk" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="niklk" name="niklk" list="niklistlk">
                            <datalist id="niklistlk">
                                <?php foreach ($laki as $lk) : ?>
                                    <option value="<?= $lk['nik']; ?>"><?= $lk['nama']; ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="statuslk" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-4">
                            <select class="form-select" aria-label="statuslk" name="statuslk" id="statuslk" onchange="ubahstatuslk()">
                                <option value="jejaka">Jejaka</option>
                                <option value="duda">Duda</option>
                            </select>
                        </div>
                        <label for="noac" id="noaclblk" class="col-sm-1 col-form-label" style="display: none;">NO AC</label>
                        <div class="col-sm-5" id="noacinputlk" style="display: none;">
                            <input type="text" class="form-control" id="noaclk" name="noaclk">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="binlk" class="col-sm-2 col-form-label">Bin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="binlk" name="binlk">
                        </div>
                    </div>
                    <hr>
                    <b>
                        <h3>Validasi Desa / Kelurahan</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="niklk" class="col-sm-2 col-form-label">Status Catin</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="statuscatin" name="statuscatin" id="statuscatin" onchange="cekcatin()">
                                <option value="beda">Beda Desa / Kelurahan</option>
                                <option value="sama">Satu Desa / Kelurahan</option>
                            </select>
                        </div>
                    </div>
                    <div id="tambahan" style="display: none;">
                        <b>
                            <h3>Data Ayah Catin Pria</h3>
                        </b>
                        <div class="mb-3 row">
                            <label for="statusaylk" class="col-sm-2 col-form-label">Status Ayah Catin Pria</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="statusaylk" name="statusaylk" id="statusaylk" onchange="cekortu('aylk')">
                                    <option value="ada">Hidup</option>
                                    <option value="meninggal">Meninggal</option>
                                </select>
                            </div>
                        </div>
                        <div id="hidupaylk">
                            <div class="mb-3 row">
                                <label for="nikay" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="nikaylk" name="nikaylk" list="niklistaylk">
                                    <datalist id="niklistaylk">
                                        <?php foreach ($laki as $lk) : ?>
                                            <option value="<?= $lk['nik']; ?>"><?= $lk['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="binay" class="col-sm-2 col-form-label">Bin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="binaylk" name="binaylk">
                                </div>
                            </div>
                        </div>
                        <div id="matiaylk" style="display: none;">
                            <div class="mb-3 row">
                                <label for="namaaypr" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namaaylk" name="namaaylk">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <b>
                            <h3>Data Ibu Catin Pria</h3>
                        </b>
                        <div class="mb-3 row">
                            <label for="statusiblk" class="col-sm-2 col-form-label">Status Ibu Catin Pria</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="statusiblk" name="statusiblk" id="statusiblk" onchange="cekortu('iblk')">
                                    <option value="ada">Hidup</option>
                                    <option value="meninggal">Meninggal</option>
                                </select>
                            </div>
                        </div>
                        <div id="hidupiblk">
                            <div class="mb-3 row">
                                <label for="nikiblk" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="nikiblk" name="nikiblk" list="niklistiblk">
                                    <datalist id="niklistiblk">
                                        <?php foreach ($perempuan as $pr) : ?>
                                            <option value="<?= $pr['nik']; ?>"><?= $pr['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="biniblk" class="col-sm-2 col-form-label">Binti</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="biniblk" name="biniblk">
                                </div>
                            </div>
                        </div>
                        <div id="matiiblk" style="display: none;">
                            <div class="mb-3 row">
                                <label for="namaiblk" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="namaiblk" name="namaiblk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <b>
                        <h3>Jadwal</h3>
                    </b>
                    <div class="mb-3 row">
                        <label for="maskawin" class="col-sm-2 col-form-label">Mas Kawin</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="maskawin" name="maskawin">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="lokasi" class="col-sm-2 col-form-label">Lokasi & Waktu</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="KUA">
                        </div>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" id="tglnikah" name="tglnikah">
                        </div>
                        <div class="col-sm-3">
                            <input type="time" class="form-control" id="jam" name="jam">
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

<?php if (session()->getFlashdata('sukses')) : ?>
    <?php
    $flash = session()->getFlashdata('sukses');
    $pesan = $flash['pesan'];
    $value = $flash['value'];
    ?>
    <script type="text/javascript">
        var pesan = '<?= $pesan ?>';
        var value = '<?= $value ?>';
        let timerInterval
        Swal.fire({
            icon: 'success',
            title: pesan,
            html: value,
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {}
        })
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <?php
    $flash = session()->getFlashdata('error');
    $pesan = $flash['pesan'];
    $value = $flash['value'];
    ?>
    <script type="text/javascript">
        var pesan = '<?= $pesan ?>';
        var value = '<?= $value ?>';
        let timerInterval
        Swal.fire({
            icon: 'error',
            title: pesan,
            html: value,
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {}
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

    function ubahstatuspr() {
        var status = $('#statuspr').val();
        if (status == 'janda') {
            document.getElementById("noaclb").style.display = 'block';
            document.getElementById("noacinput").style.display = 'block';
        } else {
            document.getElementById("noaclb").style.display = 'none';
            document.getElementById("noacinput").style.display = 'none';
        }
    }

    function ubahstatuslk() {
        var status = $('#statuslk').val();
        if (status == 'duda') {
            document.getElementById("noaclblk").style.display = 'block';
            document.getElementById("noacinputlk").style.display = 'block';
        } else {
            document.getElementById("noaclblk").style.display = 'none';
            document.getElementById("noacinputlk").style.display = 'none';
        }
    }

    function ubahstatuslk() {
        var status = $('#statuslk').val();
        if (status == 'duda') {
            document.getElementById("noaclblk").style.display = 'block';
            document.getElementById("noacinputlk").style.display = 'block';
        } else {
            document.getElementById("noaclblk").style.display = 'none';
            document.getElementById("noacinputlk").style.display = 'none';
        }
    }

    function cekcatin() {
        var status = $('#statuscatin').val();
        if (status == 'beda') {
            document.getElementById("tambahan").style.display = 'none';
        } else {
            document.getElementById("tambahan").style.display = 'block';
        }
    }

    function cekortu(jn) {
        var status = $('#status' + jn).val();
        if (status == 'ada') {
            document.getElementById("hidup" + jn).style.display = 'block';
            document.getElementById("mati" + jn).style.display = 'none';
        } else {
            document.getElementById("hidup" + jn).style.display = 'none';
            document.getElementById("mati" + jn).style.display = 'block';
        }
    }
</script>

<?= $this->endSection(); ?>