<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Tambah Kwitansi</strong></h5>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('pesan'); ?>

                    <form method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nokwitansi">Nomor Kwitansi</label>
                                    <input type="text" class="form-control" id="nokwitansi" name="nokwitansi" placeholder="Masukkan nokwitansi" value="<?php echo $nokwitansi; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tglkwitansi">Tanggal Kwitansi</label>
                                    <input type="date" class="form-control" id="tglkwitansi" name="tglkwitansi" value="<?= date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <select class="form-control" id="keterangan" name="keterangan">
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="totalbayar">Total Bayar</label>
                                    <input type="number" class="form-control" id="totalbayar" name="totalbayar" placeholder="Masukkan Total Bayar" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Pendaftaran</label>
                                    <select name="nopendaftaran" class="form-control" required>
                                        <option value="">--Pilih Pendaftaran--</option>
                                        <?php foreach ($get_pendaftaran as $pendaftaran) {
                                            echo '<option value="' . $pendaftaran['nopendaftaran'] . '">' . $pendaftaran['nopendaftaran'] . ' -- ' . $pendaftaran['nmpeserta'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Dinamis Rincian Biaya -->
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="tabel_rincian">
                                        <thead>
                                            <tr style="background-color: #ffffff;">
                                                <th style="width: 50px;" class="text-center">No</th>
                                                <th style="width: 250px;">ID Rincian</th>
                                                <th>Nama Rincian</th>
                                                <th style="width: 250px;">Jumlah Biaya</th>
                                                <th style="width: 150px;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_rincian">
                                            <!-- Baris dinamis akan ditambahkan ke sini oleh JavaScript -->
                                        </tbody>
                                        <tfoot>
                                            <tr id="footer_kwitansi" style="background-color: #f8f9fc;">
                                                <td colspan="4"></td>
                                                <td class="text-center" style="width: 150px;">
                                                    <a href="javascript:void(0);" id="tambah_rincian" class="btn btn-success">
                                                        Tambah
                                                    </a>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('kwitansi') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>

<!-- Load jQuery vendor SB Admin 2 -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

<?php
// Siapkan array data nama rincian dari PHP untuk JavaScript
$jsArray = "var namarincian = new Array();\n";
foreach ($get_rincianbiaya as $rincian) {
    $jsArray .= "namarincian['" . $rincian['idrincian'] . "'] = { nmrincian: '" . addslashes($rincian['nmrincian']) . "', nmrinciann: '" . addslashes($rincian['nmrincian']) . "' };\n";
}
?>

<script>
    <?php echo $jsArray; ?>

    var index_table = 0;

    // String opsi rincian biaya dari PHP
    var rincian_select = '<option value="">--Pilih Rincian--</option>';
    <?php foreach ($get_rincianbiaya as $rincian) { ?>
        rincian_select += '<option value="<?= $rincian['idrincian'] ?>" data-nama="<?= addslashes($rincian['nmrincian']) ?>"><?= $rincian['idrincian'] ?></option>';
    <?php } ?>

    // Fungsi menambah baris baru ke tabel
    function tambahBaris() {
        var tbody = document.getElementById('tbody_rincian');
        if (!tbody) return;

        var currentRows = tbody.getElementsByTagName('tr').length;
        var noUrut = currentRows + 1;

        var tr = document.createElement('tr');
        tr.id = 'row_kwitansi_' + index_table;
        tr.innerHTML = '\
            <td class="text-center align-middle nomor_baris">' + noUrut + '</td>\
            <td>\
                <select name="idrincian[' + index_table + ']" onchange="changeValue(this.value, ' + index_table + ', this)" id="rincian_biaya' + index_table + '" class="form-control" required>\
                    ' + rincian_select + '\
                </select>\
            </td>\
            <td>\
                <input name="nmrincian[' + index_table + ']" type="text" class="form-control" id="nmrincian' + index_table + '" readonly="readonly" placeholder="Nama Rincian">\
            </td>\
            <td>\
                <input name="jml_biaya[' + index_table + ']" type="number" class="form-control jml_biaya_input" id="jml_biaya' + index_table + '" onkeyup="hitungTotal()" onchange="hitungTotal()" placeholder="0" required>\
            </td>\
            <td class="text-center align-middle">\
                <a href="javascript:void(0);" onclick="remove_div_id(\'row_kwitansi_' + index_table + '\');" class="btn btn-danger btn-sm">\
                    <i class="fa fa-minus"></i> Hapus\
                </a>\
            </td>\
        ';

        tbody.appendChild(tr);
        index_table++;
        updateNomor();
    }

    // Fungsi menghapus baris
    function remove_div_id(id) {
        var elem = document.getElementById(id);
        if (elem) {
            elem.parentNode.removeChild(elem);
            updateNomor();
            hitungTotal();
        }
    }

    // Fungsi re-index nomor urut pada kolom 'No'
    function updateNomor() {
        var rows = document.querySelectorAll('#tbody_rincian tr');
        rows.forEach(function(row, index) {
            var cell = row.querySelector('.nomor_baris');
            if (cell) {
                cell.textContent = index + 1;
            }
        });
    }

    // Fungsi auto-fill Nama Rincian ketika ID Rincian dipilih
    function changeValue(idrincian, current_index, selectElem) {
        var nama = "";
        if (selectElem && selectElem.options) {
            var opt = selectElem.options[selectElem.selectedIndex];
            if (opt && opt.getAttribute('data-nama')) {
                nama = opt.getAttribute('data-nama');
            }
        }
        if (!nama && typeof namarincian !== 'undefined' && namarincian[idrincian]) {
            nama = namarincian[idrincian].nmrincian || namarincian[idrincian].nmrinciann || "";
        }

        var inputNama = document.getElementById('nmrincian' + current_index);
        if (inputNama) {
            inputNama.value = nama;
        }
    }

    // Fungsi hitung total bayar otomatis
    function hitungTotal() {
        var inputs = document.querySelectorAll('.jml_biaya_input');
        var total = 0;
        inputs.forEach(function(inp) {
            var val = parseFloat(inp.value) || 0;
            total += val;
        });
        var totalField = document.getElementById('totalbayar');
        if (totalField && total > 0) {
            totalField.value = total;
        }
    }

    // Event listener tombol Tambah (Native JS + Delegasi untuk memastikan selalu bisa diklik)
    document.addEventListener('click', function(e) {
        var target = e.target;
        if (target && (target.id === 'tambah_rincian' || target.closest('#tambah_rincian'))) {
            e.preventDefault();
            tambahBaris();
        }
    });

    // Support jQuery jika sudah aktif
    $(document).ready(function() {
        $('#tambah_rincian').off('click').on('click', function(e) {
            e.preventDefault();
            // tambahBaris sudah dipanggil oleh event delegation
        });
    });
</script>