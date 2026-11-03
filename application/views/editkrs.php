<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Edit Data KRS</strong></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="kd_krs">Kode KRS</label>
                            <input type="text" class="form-control" id="kd_krs" name="kd_krs"
                            placeholder="" value="<?= $edit['kd_krs']?>"
                            readonly>
                        </div>

                        <div class="form-group">
                            <label for="thn_ajaran">Tahun Ajaran</label>
                            <input type="text" class="form-control" id="thn_ajaran" name="thn_ajaran"
                            placeholder=" Masukkan Tahun Ajaran" value="<?= $edit['thn_ajaran']?>">
                        </div>

                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" class="form-control" id="semester" name="semester"
                            placeholder=" Masukkan Semester" value="<?= $edit['semester']?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                            placeholder=" Masukkan Keterangan" value="<?= $edit['keterangan']?>">
                        </div>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= base_url('krs');?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->