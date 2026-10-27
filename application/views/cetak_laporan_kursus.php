<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Data Laporan Kursus</strong></h5>
                </div>
                <div class="card-body">
                    <h3 class="mb-5"><center>Laporan Kursus<center></h3>
                    <form method="post" action="<?php echo base_url('laporan/cetak_laporan_kursus'); ?>">
                        <div class="form-group row">
                            <div class="col-2">
                                <h4>Periode :</h4>
                            </div>
                            <div class="col-5">
                                <input type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            <!-- <span>s/d</span> -->
                            <div class="col-5">
                                <input type="date" value="<?= date('Y-m-d') ?>" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                            </div>
                        </div>
                        <center><button type="submit" class="btn btn-primary">CETAK LAPORAN</button></center>
                    </form>
                </div>
            </div>
        </div>
</div>
</div>
