<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0"><strong>Edit Data Rincian Biaya</strong></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="idrincian">ID Rincian Biaya</label>
                            <input type="text" class="form-control" id="idrincian" name="idrincian"
                            placeholder=" Masukkan idrincian" value="<?= $edit['idrincian']?>"
                            readonly>
                        </div>

                        <div class="form-group">
                            <label for="nmrincian">Nama Rincian Biaya</label>
                            <input type="text" class="form-control" id="nmrincian" name="nmrincian"
                            placeholder=" Masukkan Nama Rincian Biaya" value="<?= $edit['nmrincian']?>">
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= base_url('rincian_biaya');?>"><button type="button" class="btn btn-danger">Batal</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->